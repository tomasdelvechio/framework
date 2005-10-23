<?php

class asignador_objetos
{
	protected $destino;
	protected $origen;
	
	function __construct($origen, $destino)
	{
		$this->origen = $origen;
		$this->destino = $destino;
	}
	
	function asignar()
	{
		switch ($this->destino['tipo']) {
			case 'item':
				$this->asignar_a_item();
				break;
			case 'ci':
				$this->asignar_a_ci();
				break;
			case 'ci_pantalla':
				$this->asignar_a_pantalla_ci();
				break;
			case 'datos_relacion':
				$this->asignar_a_datos_relacion();
				break;
			default:
				throw new excepcion_toba("El destinatario del objeto ('{$this->destino['tipo']}') no es ninguno de los predefinidos");
		}
	}
	
	protected function asignar_a_item()
	{
		$sql = "SELECT COALESCE(MAX(orden),0) as maximo
					FROM apex_item_objeto 
					WHERE item='{$this->destino['objeto']}' AND proyecto='{$this->destino['proyecto']}'
			";
		$res = consultar_fuente($sql,'instancia');
		$orden = $res[0]['maximo'];
		$sql = "INSERT INTO apex_item_objeto 
					(proyecto, item, objeto, orden) VALUES (
						'{$this->destino['proyecto']}', 
						'{$this->destino['objeto']}', 
						'{$this->origen['objeto']}', 
						$orden
					)
			";
		ejecutar_sql($sql,'instancia');
	}
	
	protected function asignar_a_ci()
	{
		$sql = "INSERT INTO apex_objeto_dependencias
		  			(proyecto, objeto_consumidor, objeto_proveedor,  identificador)	VALUES (
		  				'{$this->destino['proyecto']}',
		  				'{$this->destino['objeto']}', 
			  			'{$this->origen['objeto']}', 
			  			'{$this->destino['id_dependencia']}'
		  			) 
		  		";
		ejecutar_sql($sql,'instancia');
	}
	
	protected function asignar_a_pantalla_ci()
	{
		$this->asignar_a_ci();
		$sql = "UPDATE apex_objeto_ci_pantalla
				SET 
					objetos =   
						CASE 
							WHEN objetos is null THEN ''
            				WHEN objetos='' THEN ''
            				ELSE objetos || ','
       					END || '{$this->destino['id_dependencia']}'
				WHERE
					objeto_ci_proyecto = '{$this->destino['proyecto']}' AND
					objeto_ci = '{$this->destino['objeto']}' AND
					pantalla = {$this->destino['pantalla']}
			";
		ejecutar_sql($sql,'instancia');
	}
	
	protected function asignar_a_datos_relacion()
	{
		$sql = "INSERT INTO apex_objeto_dependencias
		  			(proyecto, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b)
		  		VALUES (
		  			'{$this->destino['proyecto']}',
		  			'{$this->destino['objeto']}', 
		  			'{$this->origen['objeto']}', 
		  			'{$this->destino['id_dependencia']}',
		  			'{$this->destino['min_filas']}',
		  			'{$this->destino['max_filas']}'
	  			) 
	  		";
		ejecutar_sql($sql,'instancia');		
	}
}



?>