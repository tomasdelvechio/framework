<?php
require_once('api/elemento_objeto_ei.php');

class elemento_objeto_ei_filtro extends elemento_objeto_ei
{
	//---------------------------------------------------------------------	
	//-- EVENTOS
	//---------------------------------------------------------------------

	//-- Generacion de metadatos

	static function get_modelos_evento()
	{
		$modelo[0]['id'] = 'basico';
		$modelo[0]['nombre'] = 'Basico';
		return $modelo;
	}

	static function get_lista_eventos_estandar($modelo)
	{
		$evento = array();
		switch($modelo){
			case 'basico':
				$evento[0]['identificador'] = "filtrar";
				$evento[0]['etiqueta'] = "&Filtrar";
				$evento[0]['estilo'] = "abm-input-eliminar";
				$evento[0]['orden'] = 1;
				$evento[0]['en_botonera'] = 1;		
				$evento[0]['maneja_datos'] = 1;
				$evento[0]['grupo'] = 'cargado,no_cargado';
		
				$evento[1]['identificador'] = "cancelar";
				$evento[1]['etiqueta'] = "Ca&ncelar";
				$evento[1]['estilo'] = "abm-input";
				$evento[1]['orden'] = 2;
				$evento[1]['en_botonera'] = 1;		
				$evento[1]['grupo'] = 'cargado';
				break;
		}
		return $evento;
	}
}
?>