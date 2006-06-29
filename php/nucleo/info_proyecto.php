<?php

class info_proyecto
{
	static private $instancia;
	const prefijo_punto_acceso = 'pa_';

	static function get_id()
	{
		if(! defined('apex_pa_proyecto') ){
			throw new excepcion_toba("Es necesario definir la constante 'apex_pa_proyecto'");
		}
		return apex_pa_proyecto;
	}
	
	/**
	 * @return info_proyecto
	 */
	static function instancia()
	{
		if (!isset(self::$instancia)) {
			self::$instancia = new info_proyecto();	
		}
		return self::$instancia;	
	}

	private function __construct()
	{
		if ( !isset($_SESSION['toba']['proyectos'][self::get_id()])) {
			$_SESSION['toba']['proyectos'][self::get_id()] = self::cargar_info_basica();
		}
	}

	function get_parametro($id)
	{
		if( defined( self::prefijo_punto_acceso . $id ) ){
			return constant(self::prefijo_punto_acceso . $id);
		} elseif (isset($_SESSION['toba']['proyectos'][self::get_id()][$id])) {
			return $_SESSION['toba']['proyectos'][self::get_id()][$id];
		} else {
			if( array_key_exists($id,$_SESSION['toba']['proyectos'][self::get_id()])) {
				return null;
			}else{
				throw new excepcion_toba("INFO_PROYECTO: El parametro '$id' no se encuentra definido.");
			}
		}	
	}

	function set_parametro($id, $valor)
	{
		$_SESSION['toba']['proyectos'][self::get_id()][$id] = $valor;
	}

	//----------------------------------------------------------------
	// DATOS
	//----------------------------------------------------------------	

	static function get_db()
	{
		return toba::get_db('instancia');
	}
		
	function cargar_info_basica()
	{
		$sql = "SELECT	proyecto as				nombre,
						p.descripcion as		descripcion,
						descripcion_corta				,
						estilo							,
						con_frames						,
						frames_clase					,
						frames_archivo					,
						salida_impr_html_c				,
						salida_impr_html_a				,
						m.menu as				menu,
						m.archivo as			menu_archivo,
						path_includes					,
						path_browser					,
						administrador					,
						listar_multiproyecto			,
						orden							,
						palabra_vinculo_std				,
						version_toba					,
						requiere_validacion				,
						usuario_anonimo					,
						validacion_intentos				,
						validacion_intentos_min			,
						validacion_debug				,
						sesion_tiempo_no_interac_min	,
						sesion_tiempo_maximo_min		,
						sesion_subclase					,
						sesion_subclase_archivo			,
						usuario_subclase				,
						usuario_subclase_archivo		,
						encriptar_qs					,
						combo_cambiar_proyecto			,
						registrar_solicitud				,
						registrar_cronometro			,
						item_inicio_sesion      		,
						item_pre_sesion   		       	,
						log_archivo						,
						log_archivo_nivel				
				FROM 	apex_proyecto p LEFT OUTER JOIN apex_menu m
						ON (p.menu = m.menu)
				WHERE	proyecto = '".info_proyecto::get_id()."';";
		$rs = self::get_db()->consultar($sql);
		return $rs[0];
	}
	
	//------------------------  Permisos  -------------------------
	
	static function get_lista_permisos()
	{
		$sql = " 
			SELECT 
				per.nombre as nombre
			FROM
				apex_permiso_grupo_acc per_grupo,
				apex_permiso per
			WHERE
				per_grupo.proyecto = '".info_proyecto::get_id()."'
			AND	per_grupo.usuario_grupo_acc = '".toba::get_usuario()->get_id()."'
			AND	per_grupo.permiso = per.permiso
			AND	per_grupo.proyecto = per.proyecto
		";
		return self::get_db()->consultar($sql);
	}
	
	static function get_descripcion_permiso($permiso)
	{
		$sql = " 
			SELECT
				per.descripcion,
				per.mensaje_particular
			FROM
				apex_permiso per
			WHERE
				per.proyecto = '".info_proyecto::get_id()."'
			AND	per.nombre = '$permiso'
		";
		return self::get_db()->consultar($sql);
	}

	//------------------------  Menu consola  -------------------------

	static function get_menu_consola($proyecto, $item)
	{
		$sql = "SELECT descripcion_breve, descripcion_larga
				FROM apex_item_info
				WHERE item_proyecto = '$proyecto'
				AND item = '$item';";
		return self::get_db()->consultar($sql);
	}
}
?>