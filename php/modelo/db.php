<?
require_once("3ros/adodb464/adodb.inc.php");
define('apex_db_asociativo', ADODB_FETCH_ASSOC);
define('apex_db_numerico', ADODB_FETCH_NUM);

/**
*	Representa una conexi�n a la base de datos utilizando ADODb
*/
class db
{
	protected $conexion;			//Conexion ADOdb
	protected $motor;
	protected $profile;
	protected $usuario;
	protected $clave;
	protected $base;
	
	function __construct($profile, $usuario, $clave, $base)
	{
		$this->profile  = $profile;
		$this->usuario  = $usuario;
		$this->clave    = $clave;
		$this->base     = $base;
	}

	function destruir()
	{
		$this->conexion->close();	
	}	
	
	
	function __call($nombre, $argumentos)
	{
		//-------------- MIGRACION a 0.8.3-----------------
		toba::get_logger()->obsoleto('adodb',$nombre, "0.8.3");

		return call_user_func_array(array($this->conexion, $nombre), $argumentos);
		//-------------- MIGRACION -----------------		
	}	
	
	function __get($propiedad)
	{
		toba::get_logger()->notice("El atributo de ADOdb $propiedad no se debe utilizar. Ver cambios en v0.8.3");
		return $this->conexion->$propiedad;
	}
	
	/**
	*	Realiza la conexi�n a la BD utilizando ADOdb
	*	La creaci�n de la conexi�n se encierra entre las llamas pre_conectar y post_conectar
	*/
	function conectar()
	{
		$this->pre_conectar();
		$this->conexion = ADONewConnection($this->motor);
		$status = @$this->conexion->NConnect($this->profile, $this->usuario, $this->clave, $this->base);
		if(!$status){
			throw new excepcion_toba("No es posible realizar la conexion");
		}
		$this->post_conectar();
		return $this->conexion;
	}
	
	/**
	*	Lugar para personalizar las acciones previas a la conexi�n
	*/
	function pre_conectar() {}
	
	/**
	*	Lugar para personalizar las acciones posteriores a la conexi�n
	*/
	function post_conectar() {}

	
	//-------------------------------------------------------------------------------------	

	/**
	*	Ejecuta un comando sql o un conjunto de ellos
	*	@param mixed $sql Comando o arreglo de comandos
	*	@throws excepcion_toba en caso de que algun comando falle	
	*/
	function ejecutar($sql)
	{
		$afectados = 0;
		if (is_array($sql)) {
			for($a = 0; $a < count($sql);$a++){
				if ( $this->conexion->execute($sql[$a]) === false ){
					throw new excepcion_toba("ERROR ejecutando SQL. ".
											"-- Mensaje MOTOR: (" . $this->conexion->ErrorMsg() . ")".
											"-- SQL ejecutado: (" . $sql[$a] . ").");
				}
				$afectados += $this->conexion->Affected_Rows();
			}
		} else {
			if ( $this->conexion->execute($sql) === false ){
				throw new excepcion_toba("ERROR ejecutando SQL. ".
										"-- Mensaje MOTOR: (" . $this->conexion->ErrorMsg() . ")".
										"-- SQL ejecutado: (" . $sql . ").");
			}
			$afectados += $this->conexion->Affected_Rows();			
		}
		return $afectados;		
	}
	
	/**
	*	@deprecated Desde 0.8.3
	*	@see ejecutar
	*/
	function ejecutar_sql($sql)
	{
		toba::get_logger()->obsoleto(__CLASS__, __METHOD__, "0.8.3", "Usar m�todo ejecutar");
		$this->ejecutar($sql);
	}

	//-------------------------------------------------------------------------------------

	/**
	*	Ejecuta una consulta sql
	*	@param string $sql Consulta
	*	@param string $ado Modo Fecth de ADO, por defecto asociativo
	*	@param boolean $obligatorio Si la consulta no retorna datos lanza una excepcion
	*	@return array Resultado de la consulta en formato fila-columna
	*	@throws excepcion_toba en caso de error
	*/	
	function consultar($sql, $ado=null, $obligatorio=false)
	{
		global $ADODB_FETCH_MODE;	
		if(isset($ado)){
			$ADODB_FETCH_MODE = $ado;
		}else{
			$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
		}
		$rs = $this->conexion->Execute($sql);
		if(!$rs){
			throw new excepcion_toba("No se genero el Recordset. " . $this->conexion->ErrorMsg() );
		}elseif($rs->EOF){
			if($obligatorio){
				throw new excepcion_toba("La consulta no devolvio datos.");
			}else{
				return array();
			}
		}else{
			return $rs->getArray();
		}
	}
//-------------------------------------------------------------------------------------

	/**
	*	Recupera el valor actual de una secuencia
	*	@param string $secuencia Nombre de la secuencia
	*	@return string Siguiente numero de la secuencia
	*/	
	function recuperar_secuencia($secuencia)
	{
		$sql = "SELECT currval('$secuencia') as seq;";
		$datos = $this->consultar($sql);
		return $datos[0]['seq'];
	}
//-------------------------------------------------------------------------------------

	/**
	*	Ejecuta un conjunto de comandos dentro de una transacci�n
	*	En caso de error en alg�n comando la aborta
	*	@param array $sentencias Conjunto de comandos sql
	*/
	function ejecutar_transaccion($sentencias_sql)
	{
		global $db;
		$sentencia_actual = 1;
		$this->abrir_transaccion();
		try {
			$this->ejecutar($sql);
		} catch (exception_toba $e) {
			$this->abortar_transaccion();
			throw $e;
		}
		$this->cerrar_transaccion();
	}
//-------------------------------------------------------------------------------------
	
	function abrir_transaccion()
	{
		$sql = 'BEGIN TRANSACTION';
		$this->ejecutar($sql);
		toba::get_logger()->debug("************ ABRIR transaccion ($this->base@$this->profile) ****************");
	}
	
	function abortar_transaccion()
	{
		$sql = 'ROLLBACK TRANSACTION';
		$this->ejecutar($sql);		
		toba::get_logger()->debug("************ ABORTAR transaccion ($this->base@$this->profile) ****************"); 
	}
	
	function cerrar_transaccion()
	{
		$sql = "COMMIT TRANSACTION";
		$this->ejecutar($sql);		
		toba::get_logger()->debug("************ CERRAR transaccion ($this->base@$this->profile) ****************"); 
	}

//-------------------------------------------------------------------------------------

	/**
	*	Ejecuta los comandos disponibles en un archivo
	*	@param string $archivo Path absoluto del archivo
	*/
	function ejecutar_archivo($archivo)
	//Esta funci�n ejecuta una serie de comandos sql dados en un archivo, contra la BD dada.
	{
		if (!file_exists($archivo)) {
			throw new excepcion_toba("Error al ejecutar comandos. El archivo $archivo no existe");
		}	
		$str = file_get_contents($archivo);
		$this->ejecutar($str);
	}
	//---------------------------------------------------------------------------------------
	
	/**
	*	Mapea el error de la base al modulo de mensajes del toba
	*/
	function obtener_error_toba($codigo, $descripcion)
	{
		return array();		
	}

	/**
	*	Mapea un tipo de datos especifico de un motor a uno generico de toba
	*	Adaptado de ADOdb
	*/
	function get_tipo_datos_generico($tipo)
	{
		$tipo=strtoupper($tipo);
	static $typeMap = array(
		'VARCHAR' => 'C',
		'VARCHAR2' => 'C',
		'CHAR' => 'C',
		'C' => 'C',
		'STRING' => 'C',
		'NCHAR' => 'C',
		'NVARCHAR' => 'C',
		'VARYING' => 'C',
		'BPCHAR' => 'C',
		'CHARACTER' => 'C',
		'INTERVAL' => 'C',  # Postgres
		##
		'LONGCHAR' => 'X',
		'TEXT' => 'X',
		'NTEXT' => 'X',
		'M' => 'X',
		'X' => 'X',
		'CLOB' => 'X',
		'NCLOB' => 'X',
		'LVARCHAR' => 'X',
		##
		'BLOB' => 'B',
		'IMAGE' => 'B',
		'BINARY' => 'B',
		'VARBINARY' => 'B',
		'LONGBINARY' => 'B',
		'B' => 'B',
		##
		'YEAR' => 'D', // mysql
		'DATE' => 'D',
		'D' => 'D',
		##
		'TIME' => 'T',
		'TIMESTAMP' => 'T',
		'DATETIME' => 'T',
		'TIMESTAMPTZ' => 'T',
		'T' => 'T',
		##
		'BOOL' => 'L',
		'BOOLEAN' => 'L', 
		'BIT' => 'L',
		'L' => 'L',
		# SERIAL... se tratan como enteros#
		'COUNTER' => 'E',
		'E' => 'E',
		'SERIAL' => 'E', // ifx
		'INT IDENTITY' => 'E',
		##
		'INT' => 'E',
		'INT2' => 'E',
		'INT4' => 'E',
		'INT8' => 'E',
		'INTEGER' => 'E',
		'INTEGER UNSIGNED' => 'E',
		'SHORT' => 'E',
		'TINYINT' => 'E',
		'SMALLINT' => 'E',
		'E' => 'E',
		##
		'LONG' => 'N', // interbase is numeric, oci8 is blob
		'BIGINT' => 'N', // this is bigger than PHP 32-bit integers
		'DECIMAL' => 'N',
		'DEC' => 'N',
		'REAL' => 'N',
		'DOUBLE' => 'N',
		'DOUBLE PRECISION' => 'N',
		'SMALLFLOAT' => 'N',
		'FLOAT' => 'N',
		'NUMBER' => 'N',
		'NUM' => 'N',
		'NUMERIC' => 'N',
		'MONEY' => 'N',
		
		## informix 9.2
		'SQLINT' => 'E', 
		'SQLSERIAL' => 'E', 
		'SQLSMINT' => 'E', 
		'SQLSMFLOAT' => 'N', 
		'SQLFLOAT' => 'N', 
		'SQLMONEY' => 'N', 
		'SQLDECIMAL' => 'N', 
		'SQLDATE' => 'D', 
		'SQLVCHAR' => 'C', 
		'SQLCHAR' => 'C', 
		'SQLDTIME' => 'T', 
		'SQLINTERVAL' => 'N', 
		'SQLBYTES' => 'B', 
		'SQLTEXT' => 'X' 
		);
		if(isset($typeMap[$tipo])) 
			return $typeMap[$tipo];
		return null;
	}
}
//------------------------------------------------------------------------

?>