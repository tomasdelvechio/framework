<?php
require_once("db_registros.php");
/*
	PROBLEMAS NO RESUELTOS
	----------------------

	1) Colision de columnas
	
		Que pasa si dos tablas tienen una columna con el mismo nombre (ej: descripcion)
		En el caso de las claves, esto pasa siempre, e impacta directamente en la generacion del WHERE

	2) Cardinalidad variable entre tablas
	
		No siempre la relacion entre las tablas de un MT tienen una cardinalidad de 1->1
		Existen casos en que la misma es 1->0
			
			PRIMITIVAS necesarias
			
				A: Clasificacion de tablas esclavas en comprometidas y no comprometidas:
					- Escaneo:
						a) Si alguna tabla tiene un no_nulo, puedo usarlo para ver si se agregaron cosas en ella
						b) recorro todos los campos de la tabla, si ninguno esta seteado, no esta comprometida
					- Genero una estructura global que lean los procesos subsiguientes
		
			PROCESOS

			- CREAR registros:  Que tablas hay que llenar?
				Dos opciones validas segun la necesidad
					a) Uso a [A] y ejecuto INSERTS en las tablas comprometidas
					b) Inserto en todas las tablas siempre
				
			- MODIFICAR registros:
				- Cuando me cargo ejecuto [A], (Necesito una carga diferenciada!!!)
					- UPDATE: decido entre update o insert
					- DELETE: decido entre un delete o nada
					
			- Carga: 
				el query que carga al MT tiene que construirse con OUTER JOINS

			- La actualizacion del estado del buffer posterior a la sincronizacion es diferencial!

	3) Acceso separado a cada tabla
	
		Tiene que existir un conjunto de metodos que permitan acceder a la porcion de una tabla, dentro del buffer
		Esto sirve para el caso de las interfaces que necesitan manejar a las dos cosas por separado

	4) Como se implementa un MT con baja logica?
*/
class db_registros_mt extends db_registros
{
	protected $control_tablas;			//Informacion agregada sobre la distribucion de registros por tablas
	protected $tipo_relacion = "estricta";
	
	function __construct($id, $definicion, $fuente, $tope_registros=null, $utilizar_transaccion=null, $memoria_autonoma=null)
	{
		foreach($definicion['tabla'] as $tabla)
		{
			if(! isset($definicion[$tabla]['columna'] )){
				$definicion[$tabla]['columna'] = array();
			}			
		}
		parent::__construct($id, $definicion, $fuente, $tope_registros, $utilizar_transaccion, $memoria_autonoma);
	}

	function establecer_relacion_estricta()
	{
		$this->tipo_relacion = "estricta";
	}
	
	function establecer_relacion_debil()
	{
		$this->tipo_relacion = "debil";
	}
	//-------------------------------------------------------------------------------

	function inicializar_definicion_campos()
	{
		$this->campos = array();
		$this->campos_secuencia = array();

		for($t=0;$t<count($this->definicion['tabla']);$t++)
		{
			//Es necesario escribir un ALIAS para cada tabla utilizada
			if(!isset($this->definicion['tabla_alias'][$t])){
				throw new excepcion_toba("Atencion, es necesario definir un alias para la tabla " . $this->definicion['tabla'][$t] );	
			}
			$tabla = $this->definicion['tabla'][$t];
			//---- CAMPOS: (columnas + claves) ----
			$this->campos = array_merge(	$this->campos, 
											$this->definicion[$tabla]['clave'],
											$this->definicion[$tabla]['columna'] );
			//---- CAMPOS_SECUENCIA ----
			if(isset($this->definicion[$tabla]['secuencia'])){
				for($a=0;$a<count($this->definicion[$tabla]['secuencia']);$a++){
					$this->campos_secuencia[] = $this->definicion[$tabla]['secuencia'][$a]['col'];
					$this->campos_secuencia_tabla[$tabla][] = $this->definicion[$tabla]['secuencia'][$a]['col'];
				}
			}
		}
		array_unique($this->campos);
		//---- CAMPOS_MANIPULABLES ----
		$this->campos_manipulables = array_diff($this->campos, $this->campos_secuencia);
		//$this->campos_manipulables = $this->campos;
		//----- CAMPOS no DUPLICADOS ----
		if(isset($this->definicion['no_duplicado'])){
			//Solo hay que trabajar sobre los manipulables
			$this->campos_no_duplicados = array_diff($this->definicion['no_duplicado'], $this->campos_secuencia);
		}else{
			$this->campos_no_duplicados = array();
		}
		//---- CAMPOS no NULOS ----
		if(isset($this->definicion['no_nulo'])){
			//Solo hay que trabajar sobre los manipulables
			$this->campos_no_nulo = array_diff($this->definicion['no_nulo'], $this->campos_secuencia);
		}else{
			$this->campos_no_nulo = array();
		}
		//---- Columnas EXTERNAS ----
		if(!isset($this->definicion['externa'])){
			//Solo hay que trabajar sobre los manipulables
			$this->definicion['externa'] = array();
		}
	}

	//-------------------------------------------------------------------------------
	//-- Las estructuras de control del db_registros MT son ligeramente distintas
	//-------------------------------------------------------------------------------

	function identificar_tablas_comprometidas($registro)
	{
		/*
			Devuelve un array con las tablas comprometidas en un registro puntual	
			El array debe ser asociativo, con el nombre de la tabla y un 1 o un 0 indicando la utilizacion
			Se busca que al menos una columna o clave que no sea compartida por la tabla principal este seteada
		*/
		for($t=1;$t<count($this->definicion['tabla']);$t++)
		{
			
		}		
	}

	function generar_estructura_control()
	{
		parent::generar_estructura_control();
		//$this->identificar_tablas_comprometidas($registro);
	}
	
	function actualizar_estructura_control($registro, $estado)
	{
		parent::actualizar_estructura_control($registro, $estado);
	}

	function sincronizar_estructura_control()
	{
/*
		foreach(array_keys($this->control) as $registro){
			switch($this->control[$registro]['estado']){
				case "d":	//DELETE
					unset($this->control[$registro]);
					unset($this->datos[$registro]);
					break;
				case "i":	//INSERT
					$this->control[$registro]['estado'] = "db";
					break;
				case "u":	//UPDATE
					$this->control[$registro]['estado'] = "db";
					break;
			}
		}
*/
		parent::sincronizar_estructura_control();
	}

	//-------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------
	//---------------  SINCRONIZACION con la DB   -----------------------------------
	//-------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------

	function insertar($id_registro)
	//Ejecuto los INSERTS en orden ascendente
	//MAL: estoy creando el plan de cada tabla por cada registro...
	{
		for($t=0;$t<count($this->definicion['tabla']);$t++)
		{
			$tabla = $this->definicion['tabla'][$t];
			//Armo la lista de campos
			$campos = array();
			$campos = array_merge(	$this->definicion[$tabla]['clave'],
									$this->definicion[$tabla]['columna'] );
			//Extraigo las secuencias de la tabla y las columnas externas
			if(isset($this->campos_secuencia_tabla[$tabla])){
				$campos = array_diff ( $campos, $this->definicion['externa'], $this->campos_secuencia_tabla[$tabla] );
			}else{
				$campos = array_diff ( $campos, $this->definicion['externa'] );
			}
			//Busco el registro
			$registro = $this->datos[$id_registro];
			//Escapo los caracteres que forman parte de la sintaxis SQL
			$valores = array();
			foreach($campos as $id => $col){
				if( !isset($registro[$col]) || (trim($registro[$col]) == "") ){
					$valores[$id] = "NULL";
				}else{
					$valores[$id] = "'" . addslashes(trim($registro[$col])) . "'";	
				}
			}
			//Armo el INSERT
			$sql = "INSERT INTO " . $tabla .
					" ( " . implode(", ",$campos) . " ) ".
					" VALUES (" . implode(" ,", $valores) . ");";
			$this->log("registro: $id_registro - tabla: $t - " . $sql); 
			ejecutar_sql($sql, $this->fuente);
			//REcupero el valor de las secuencias
			if(isset($this->definicion[$tabla]['secuencia']))
			{
				foreach($this->definicion[$tabla]['secuencia'] as $sec)
				{
					$this->datos[$id_registro][ $sec['col'] ] = recuperar_secuencia( $sec['seq'], $this->fuente );
				}
			}
		}
	}
	//-------------------------------------------------------------------------------

	function modificar($id_registro)
	//Genera sentencia de UPDATE
	{
		for($t=0;$t<count($this->definicion['tabla']);$t++)
		{
			$tabla = $this->definicion['tabla'][$t];
			//Armo la lista de campos
			$campos_update = array();
			$campos_update = array_diff(	$this->definicion[$tabla]['columna'],
											$this->campos_secuencia, 
											$this->definicion['externa'] );
			if(count($campos_update) > 0)
			{
				//Busco el registro
				$registro = $this->datos[$id_registro];
				//Genero el WHERE
				$sql_where = array();
				foreach($this->definicion[$tabla]["clave"] as $clave){
					$sql_where[] =	"( $clave = '{$registro[$clave]}')";
				}
				//Escapo los caracteres que forman parte de la sintaxis SQL, seteo NULL
				$set = array();
				foreach($campos_update as $campo){
					if( ( !isset($registro[$campo])) || (trim($registro[$campo]) == "") ){
						$set[] = " $campo = NULL ";
					}else{
						$set[] = " $campo = '". addslashes(trim($registro[$campo])) . "' ";
					}
				}
				//Armo el QUERY
				$sql = "UPDATE $tabla SET ".
						implode(", ",$set) .
						" WHERE " . implode(" AND ",$sql_where) .";";
				//Ejecuto el SQL
				$this->log("registro: $id_registro - tabla: $t - " . $sql); 
				ejecutar_sql($sql, $this->fuente);
			}
		}
	}
	//-------------------------------------------------------------------------------

	function eliminar($id_registro)
	//Elimina los registros.
	{
		if($this->baja_logica){
			throw new excepcion_toba("No esta implementada la baja logica en MT");	
		}
		//Primero las secundarias, despues las principales
		for( $t= count($this->definicion['tabla']) - 1; $t >= 0 ;$t--)
		{
			$tabla = $this->definicion['tabla'][$t];
			$registro = $this->datos[$id_registro];
			//Genero el WHERE
			$sql_where = array();
			foreach($this->definicion[$tabla]["clave"] as $clave){
				$sql_where[] =	"( $clave = '{$registro[$clave]}')";
			}
			$sql = "DELETE FROM $tabla WHERE " . implode(" AND ",$sql_where) .";";
			$this->log("registro: $id_registro - tabla: $t - " . $sql); 
			ejecutar_sql($sql, $this->fuente);
		}
	}

	//-------------------------------------------------------------------------------
	//------------  GENERADORES de SQL  ---------------------------------------------
	//-------------------------------------------------------------------------------

	function generar_sql_select()
	{
		$where = array();
		$alias_padre = $this->definicion['tabla_alias'][0];
		for($t=0;$t<count($this->definicion['tabla']);$t++)
		{
			$tabla = $this->definicion['tabla'][$t];
			$alias = $this->definicion['tabla_alias'][$t];
			if($this->tipo_relacion == "estricta")				// Relacion ESTRICTA
			{
				//-- *** FROM ***
				$tablas_from[] = "$tabla $alias";
				//Armo la lista de campos por tabla
				//-- *** WHERE ***
				if($t > 0){	//Relaciones de las tablas hijas con la maestra
					foreach($this->definicion['relacion'][$tabla] as $relacion ){
						$where[] = $alias_padre . "." . $relacion['pk'] . " = " . $alias . "." . $relacion['fk'];
					}
				}
			}
			else												// Relacion DEBIL
			{
				//-- *** FROM ***
				if($t > 0){
					//Tablas asociadas
					if(is_array($this->definicion['relacion'][$tabla]))
					{
						$join = "";
						foreach($this->definicion['relacion'][$tabla] as $relacion ){
							$join .= $alias_padre . "." . $relacion['pk'] . " = " . $alias .".". $relacion['fk'] . "\n";
						}
					}else{
						throw new excepcion_toba("Las relaciones de la tabla '$tabla' no se encuentran definidas");
					}
					$tablas_outer[] = "  LEFT OUTER JOIN $tabla $alias ON $join";
				}else{
					//Tabla principal
					$tablas_from[] = "$tabla $alias";
				}
			}
			//-- *** COLUMNAS ***
			//Armo la lista de campos por tabla
			$campos = array_merge( $this->definicion[$tabla]['columna'], $this->definicion[$tabla]['clave'] );
			//Elimino campos NO SQL
			if(isset($this->definicion['tabla']['externa'])){
				$campos = array_diff( $campos, $this->definicion[$tabla]['externa'] );
			}
			foreach($campos as $campo){
				//Los campos duplicados los comprimo
				$campos_select[$campo] = "$alias.$campo as $campo";
			}
		}
		//Concateno el SQL de la carga de datos
		//FROM
		if(isset($this->from)){
			$tablas_from = array_merge($tablas_from, $this->from);
		}
		//WHERE
		if(isset($this->where)){
			$where = array_merge($where, $this->where);
		}
		//ei_arbol($campos_select,"CAMPOS");
		//ei_arbol($tablas_from,"TABLAS");
		//ei_arbol($where,"WHERE");
		$sql =	" SELECT	" . implode(" ,\n ",$campos_select) . "\n" .
				" FROM "	. implode(" ,\n",$tablas_from) . "\n";
		if($this->tipo_relacion == "debil"){
			$sql .= implode(" ,\n",$tablas_outer) . "\n";
		}
		$sql .= " WHERE " .	implode(" \nAND ",$where) .";";
		//echo "<pre>" . $sql;
		return $sql;
	}
	//-------------------------------------------------------------------------------
}
?>