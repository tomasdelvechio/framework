<?
require_once("dbt_objeto.php");
require_once("db_registros/dbr_apex_objeto.php");
require_once("db_registros/dbr_apex_objeto_eventos.php");
require_once("db_registros/dbr_apex_objeto_ut_formulario.php");
require_once("db_registros/dbr_apex_objeto_ei_formulario_ef.php");

class dbt_objeto_ei_formulario extends dbt_objeto
{
	function __construct($fuente)
	{
		//db_registros
		$this->elemento['base'] = 			new dbr_apex_objeto($fuente, 1,1);
		$this->elemento['prop_basicas'] = 	new dbr_apex_objeto_ut_formulario($fuente, 1,1);
		$this->elemento['efs'] = 			new dbr_apex_objeto_ei_formulario_ef($fuente, 1,0);
		$this->elemento['eventos'] = 		new dbr_apex_objeto_eventos($fuente, 0,0);
		//Relaciones
		$this->cabecera = 'base';
		$this->detalles = array(
								'prop_basicas'=>array('objeto_ut_formulario_proyecto','objeto_ut_formulario'),
								'efs'=>array('objeto_ei_formulario_proyecto','objeto_ei_formulario'),
								'eventos'=>array('proyecto','objeto')
							);
		parent::__construct($fuente);
	}
}
?>