<?php
require_once('comando_toba.php');

/**
*	Publica los servicios de la clase PROYECTO a la consola toba
*
*	@todo	La asociacion de usuarios al proyecto nuevo tiene que ofrecer una seleccion
*	
*/
class comando_proyecto extends comando_toba
{
	static function get_info()
	{
		return 'Administracion de PROYECTOS';
	}

	function mostrar_observaciones()
	{
		$this->consola->mensaje("INVOCACION: toba proyecto OPCION [-p id_proyecto] [-i id_instancia]");
		$this->consola->enter();
		$this->get_info_parametro_proyecto();
		$this->get_info_parametro_instancia();
		$this->consola->enter();
	}

	function get_info_extra()
	{
		try {
			$proyecto = $this->get_proyecto();
			$salida = "Path: ".$proyecto->get_dir();
			$version = $proyecto->get_version_proyecto();
			if (isset($version)) {
				$salida .= "\nVersi�n: ".$version->__toString();
			}
			$url = $proyecto->get_url();
			if (isset($url)) {
				$salida .= "\nURL: ".$url;
			}			
			return $salida;
		} catch (toba_error $e) {
			//El proyecto puede no existir
		}
	}	

	function inspeccionar_opciones($clase = null)
	{
		$opciones = array();
		$basicas = parent::inspeccionar_opciones($clase);
		$id_proyecto = $this->get_id_proyecto_actual(false);
		$id_instancia = $this->get_id_instancia_actual(false);
		if (isset($id_proyecto) && isset($id_instancia)) {
			try {
				$proyecto = $this->get_proyecto();
				$clase = $proyecto->get_aplicacion_comando();
				if (isset($clase)) {
					$opciones = parent::inspeccionar_opciones($clase);
				}
			} catch (toba_error $e) {
				
			}
		}
		return $basicas + $opciones;	
	}	
	
	protected function ejecutar_opcion($opcion, $argumentos)
	{
		$id_proyecto = $this->get_id_proyecto_actual(false);
		$id_instancia = $this->get_id_instancia_actual(false);
		$clase = null;
		if (isset($id_proyecto) && isset($id_instancia)) {
			try {
				$proyecto = $this->get_proyecto();
				$clase = $proyecto->get_aplicacion_comando();
			} catch (toba_error $e) {
				
			}
		}
		if(isset($clase) && method_exists( $clase, $opcion ) ) {
			$clase->$opcion($argumentos);
		} elseif (method_exists( $this, $opcion)) {
			$this->$opcion($argumentos);
		} else {
			$this->consola->mensaje("La opcion '".$this->argumentos[0]."' no existe");
			$this->mostrar_ayuda();
		}
	}
	
	//-------------------------------------------------------------
	// Opciones
	//-------------------------------------------------------------


	/**
	* Crea un proyecto NUEVO.
	* @gtk_icono nucleo/agregar.gif 
	* @gtk_no_mostrar 1
	*/
	function opcion__crear()
	{
		$id_instancia = $this->get_id_instancia_actual();
		$id_proyecto = $this->get_id_proyecto_actual();
		$instancia = $this->get_instancia($id_instancia);
		
		// --  Creo el proyecto
		$this->consola->mensaje( "Creando el proyecto '$id_proyecto' en la instancia '$id_instancia'...", false );
		$usuarios = $this->seleccionar_usuarios( $instancia );
		toba_modelo_proyecto::crear( $instancia, $id_proyecto, $usuarios );
		$this->consola->progreso_fin();
		
		// -- Asigno un nuevo item de login
		$proyecto = $this->get_proyecto($id_proyecto);		
		$proyecto->actualizar_login();
		
		// -- Exporto el proyecto creado
		$proyecto->exportar();
		$instancia->exportar_local();
		if (! $proyecto->esta_publicado()) {
			$this->consola->separador();
			$agregar = $this->consola->dialogo_simple("El proyecto ha sido creado. �Desea agregar el alias de apache al archivo toba.conf?", true);
			if ($agregar) {
				$proyecto->publicar();
				$this->consola->mensaje('OK. Debe reiniciar el servidor web para que los cambios tengan efecto');
			}
		}
	}	
	

	/**
	* Carga el PROYECTO en la INSTANCIA (Carga metadatos y crea un vinculo entre ambos elementos).
	* @consola_parametros Opcional: [-d 'directorio'] Especifica el path en donde se encuentra el proyecto (por ej. ../mi_proyecto ) 
	* @gtk_icono importar.png
	* @gtk_no_mostrar 1
	*/
	function opcion__cargar()
	{
		$path = null;
		$id_proyecto = $this->get_id_proyecto_actual(false);
		if (!isset($id_proyecto)) {
			list($id_proyecto, $path) = $this->seleccionar_proyectos(false, false);
			if ($id_proyecto == $path) {
				$path=null;
			}
		}
		$param = $this->get_parametros();
		if (isset($param['-d'])) {
			$path = $param['-d'];
		}
		$i = $this->get_instancia();
		if ( ! $i->existen_metadatos_proyecto( $id_proyecto ) ) {

			//-- 1 -- Cargar proyecto
			$this->consola->enter();
			$this->consola->subtitulo("Carga del Proyecto ".$id_proyecto);
			$i->vincular_proyecto( $id_proyecto, $path );
			$p = $this->get_proyecto($id_proyecto);
			$p->cargar_autonomo();
			$this->consola->mensaje("Vinculando usuarios", false);
			$usuarios = $this->seleccionar_usuarios( $p->get_instancia() );
			$grupo_acceso = $this->seleccionar_grupo_acceso($p);
			foreach ( $usuarios as $usuario ) {
				$p->vincular_usuario( $usuario, $grupo_acceso );
				toba_logger::instancia()->debug("Vinculando USUARIO: $usuario, GRUPO ACCESO: $grupo_acceso");
				$this->consola->progreso_avanzar();
			}
			$this->consola->progreso_fin();
			
			//-- 2 -- Exportar proyecto
			$this->consola->enter();
			// Exporto la instancia con la nueva configuracion (por fuera del request)
			$i->exportar_local();
		} else {
			$p = $this->get_proyecto($id_proyecto);
			$this->consola->mensaje("El proyecto '" . $p->get_id() . "' ya EXISTE en la instancia '".$i->get_id()."'");
		}

		if (! $p->esta_publicado()) {
			//--- Generaci�n del alias
			$this->consola->separador();
			$agregar = $this->consola->dialogo_simple("�Desea agregar el alias de apache al archivo toba.conf?", true);
			if ($agregar) {
				$p->publicar();
				$this->consola->mensaje('OK. Debe reiniciar el servidor web para que los cambios tengan efecto');
			}		
		}
	}
	

	/**
	* Brinda informacion sobre los METADATOS del proyecto.
	* @gtk_icono info_chico.gif
	* @gtk_no_mostrar 1
	*/
	function opcion__info()
	{
		$p = $this->get_proyecto();
		$param = $this->get_parametros();
		$this->consola->titulo( "Informacion sobre el PROYECTO '" . $p->get_id() . "' en la INSTANCIA '" .  $p->get_instancia()->get_id() . "'");
		$this->consola->mensaje("Version de la aplicaci�n: ".$p->get_version_proyecto()."\n");
		if ( isset( $param['-c'] ) ) {
			// COMPONENTES
			$this->consola->subtitulo('Listado de COMPONENTES');
			$this->consola->tabla( $p->get_resumen_componentes_utilizados() , array( 'Tipo', 'Cantidad') );
		} elseif ( isset( $param['-g'] ) ) {
			// GRUPOS de ACCESO
			$this->consola->subtitulo('Listado de GRUPOS de ACCESO');
			$this->consola->tabla( $p->get_lista_grupos_acceso() , array( 'ID', 'Nombre') );
		} else {										
			$this->consola->subtitulo('Reportes');
			$subopciones = array( 	'-c' => 'Listado de COMPONENTES',
									'-g' => 'Listado de GRUPOS de ACCESO' ) ;
			$this->consola->coleccion( $subopciones );	
		}		
	}
	
	/**
	* Exporta los METADATOS del proyecto.
	* @gtk_icono exportar.png 
	*/
	function opcion__exportar()
	{
		$p = $this->get_proyecto();
		$p->exportar();
		$p->get_instancia()->exportar_local();
	}

	

	/**
	* Importa y migra un proyecto desde otra instalacion/instancia de toba
	* @consola_parametros -d 'directorio'. Especifica el path de toba a migrar
	* @gtk_icono importar.png 
	*/	
	function opcion__importar_migrar()
	{
		$param = $this->get_parametros();
		if (isset($param['-d'])) {
			$dir_toba_viejo = $param['-d'];
		} else {
			throw new toba_error("Debe indicar el path del toba desde donde se quiere importar un proyecto con el par�metro -d");
		}
		$this->get_instalacion()->importar_migrar_proyecto($this->get_id_instancia_actual(true), $this->get_id_proyecto_actual(true), $dir_toba_viejo);
	}
		
	
	/**
	* Elimina los METADATOS del proyecto y los vuelve a cargar.
	* @gtk_icono importar.png 
	*/
	function opcion__regenerar()
	{
		$this->get_proyecto()->regenerar();
	}

	/**
	* Elimina el PROYECTO de la INSTANCIA (Elimina los metadatos y el vinculo entre ambos elementos).
	* @gtk_icono borrar.png
	*/
	function opcion__eliminar()
	{
		$id_proyecto = $this->get_id_proyecto_actual();
		if ( $id_proyecto == 'toba' ) {
			throw new toba_error("No es posible eliminar el proyecto 'toba'");
		}	
		try {
			$p = $this->get_proyecto();
			if ( $this->consola->dialogo_simple("Desea ELIMINAR los metadatos y DESVINCULAR el proyecto '"
					.$id_proyecto."' de la instancia '"
					.$this->get_id_instancia_actual()."'") ) {
				$p->eliminar_autonomo();
			}
		} catch (toba_error $e) {
			$this->consola->error($e->__toString());
		}
		$this->get_instancia()->desvincular_proyecto( $id_proyecto );
	}
	
	/**
	 * Exporta los METADATOS y luego actualiza el proyecto (usando svn)
	 * @gtk_icono refrescar.png
	 */
	function opcion__actualizar()
	{
		$this->consola->titulo("1.- Exportando METADATOS");		
		$this->opcion__exportar();

		$this->consola->titulo("2.- Actualizando el proyecto utilizando SVN");
		$p = $this->get_proyecto();		
		$p->actualizar();		
	}	
	
	/**
	* Compila los METADATOS del proyecto.
	* @gtk_icono compilar.png 
	*/
	function opcion__compilar()
	{
		$this->get_proyecto()->compilar();
	}
	

	/**
	* Incluye al proyecto dentro del archivo de configuraci�n de apache (toba.conf)
	* @consola_parametros Opcional: [-u 'url'] Lo publica en una url espec�fica (por ej. /mi_proyecto )
	*/
	function opcion__publicar()
	{
		$param = $this->get_parametros();
		$url = '';
		if (isset($param['-u'])) {
			$url = $param['-u'];
		}

		if (! $this->get_proyecto()->esta_publicado()) {
			$this->get_proyecto()->publicar($url);
			$this->consola->mensaje('OK. Debe reiniciar el servidor web para que los cambios tengan efecto');
		} else {
			throw new toba_error("El proyecto ya se encuentra publicado. Debe despublicarlo primero");
		}
	}	
	
	/**
	* Quita al proyecto del archivo de configuraci�n de apache (toba.conf)
	*/
	function opcion__despublicar()
	{
		if ($this->get_proyecto()->esta_publicado()) {
			$this->get_proyecto()->despublicar();
			$this->consola->mensaje('OK. Debe reiniciar el servidor web para que los cambios tengan efecto');
		} else {
			throw new toba_error("El proyecto no se encuentra actualmente publicado.");
		}
	}		
	
	
	/**
	 * Actualiza o crea la operaci�n de login asociada al proyecto
	 * @gtk_icono usuarios/usuario.gif
	 */
	function opcion__actualizar_login()
	{
		$proyecto = $this->get_proyecto();
	
		//--- Existe un item de login??
		$pisar = false;
		if ($proyecto->get_item_login()) {
			$clonar = $this->consola->dialogo_simple("El proyecto ya posee un item de login propio, �desea continuar?", true);
			if (!$clonar) {
				return;
			}
			$pisar = $this->consola->dialogo_simple("�Desea borrar del proyecto el item de login anterior?", false);
		}
		$proyecto->actualizar_login($pisar);
	}
	
	/**
	 * Migra un proyecto entre dos versiones toba.
	 * @consola_parametros Opcionales: [-d 'desde']  [-h 'hasta'] [-R 0|1] [-m metodo puntual de migracion]
	 * @gtk_icono convertir.png 
	 * @consola_separador 1
	 * @gtk_separador 1
	 */
	function opcion__migrar_toba()
	{
		$proyecto = $this->get_proyecto();
		//--- Parametros
		$param = $this->get_parametros();
		$desde = isset($param['-d']) ? new toba_version($param['-d']) : $proyecto->get_version_actual();
		$hasta = isset($param['-h']) ? new toba_version($param['-h']) : toba_modelo_instalacion::get_version_actual();

		$desde_texto = $desde->__toString();
		$hasta_texto = $hasta->__toString();
		$this->consola->titulo("Migraci�n el proyecto '{$proyecto->get_id()}'"." desde la versi�n $desde_texto hacia la $hasta_texto.");

		if (! isset($param['-m'])) {
			$versiones = $desde->get_secuencia_migraciones($hasta);
			if (empty($versiones)) {
				$this->consola->mensaje("No es necesario ejecutar una migraci�n entre estas versiones para el proyecto '{$proyecto->get_id()}'");
				return ;
			}
			$proyecto->migrar_rango_versiones($desde, $hasta, false);
		} else {
			//Se pidio un m�todo puntual
			$proyecto->ejecutar_migracion_particular($hasta, trim($param['-m']));
		}
	}

}
?>