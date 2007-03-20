<?php
require_once("objetos_toba/ci_eventos.php");
require_once("admin_util.php");

/**
 * Wrapper del ci_eventos destinado a manejar las particularidades de un evento en un ci
 */
class ci_eventos_del_ci extends ci_eventos 
{

	function conf__eventos($componente)
	{
		$datos = parent::conf__eventos($componente);
		//Se determina el identificador del evento que entiende actualmente las pantallas
		$id_ev = $this->get_tabla()->get_fila_columna($this->seleccion_evento_anterior, 'identificador');
		$pantallas = $this->controlador->get_pantallas_evento($id_ev);
		$datos['pantallas'] = $pantallas;
		return $datos;	
	}
	
	/**
	 *	Se redefine la funcion para sacar informacion sobre las pantallas del evento
	 */
	function evt__eventos__modificacion($datos)
	{
		//Se determina el identificador del evento que entiende actualmente las pantallas
		$id_ev = $this->get_tabla()->get_fila_columna($this->seleccion_evento_anterior, 'identificador');
		//Se actualizan las pantallas para que saquen o agreguen a este evento
		$this->controlador->set_pantallas_evento($datos['pantallas'], $id_ev);
		//Comunicacion con el manejo estandar de eventos
		unset($datos['pantallas']);
		return parent::evt__eventos__modificacion($datos);
	}
	
	function get_pantallas_posibles()
	{
		return $this->controlador->get_pantallas_posibles();
	}	
	
	/**
	 * La generacion se extiende para incluir la asociacion con las pantallas definidas
	 */
	function evt__generador__cargar($datos)
	{
		$eventos = $this->controlador->get_eventos_estandar($datos['modelo']);
		foreach($eventos as $evento) {
			try{
				$this->get_tabla()->nueva_fila($evento);
				//--- Se agrega el evento en todas las pantallas existentes
				$this->controlador->set_pantallas_evento(null, $evento['identificador']);
			}catch(toba_error $e){
				toba::notificacion()->agregar("Error agregando el evento '{$evento['identificador']}'. " . $e->getMessage());
			}
		}
	}
	
}

?>