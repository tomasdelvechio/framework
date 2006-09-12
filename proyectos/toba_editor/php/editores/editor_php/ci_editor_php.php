<?php
require_once('nucleo/componentes/interface/toba_ci.php');
require_once('lib/reflexion/archivo_php.php');
require_once('lib/reflexion/clase_php.php');

class ci_editor_php extends toba_ci
{
	protected $datos;
	protected $archivo_php;
	protected $clase_php;
	protected $meta_clase;	//Al CI le sirve para contextualizar el FORM de opciones
	protected $s__subcomponente;

	function ini()
	{
		$this->set_datos(toba::zona()->get_info());		
	}
	
	function conf()
	{
		if (isset($this->archivo_php) && $this->archivo_php->existe()) {
			if (! $this->archivo_php->contiene_clase($this->datos['subclase'])) {
				$this->pantalla()->agregar_dep('subclase');
			}
			$this->pantalla()->eliminar_evento('crear_archivo');			
		} else {
			$this->pantalla()->eliminar_evento('abrir');	
		}
	}
	
	/**
	 * Desde la accion se deben suministrar los datos de la extension sobre la que se esta trabajando
	 */
	function set_datos($datos)
	{
		$this->datos = $datos;
		//- 1 - Obtengo la clase INFO del compomente que se selecciono.
		$clave = array( 'componente'=>$this->datos['objeto'], 'proyecto'=>$this->datos['proyecto'] );		
		$clase_info = toba_constructor::get_info( $clave, $this->datos['clase']);
		
		//- 2 - Controlo si tengo que mostrar el componente o un SUBCOMPONENTE.
		if(isset($this->s__subcomponente)){ //Cargue un subcomponente en un request anterior.
			$subcomponente = $this->s__subcomponente;
		}else{
			$subcomponente = toba::memoria()->get_parametro('subcomponente');
		}
		if (isset($subcomponente)) {
			$mts = $clase_info->get_metadatos_subcomponente($subcomponente);
			if($mts){
				$this->s__subcomponente = $subcomponente;
				$this->datos['subclase'] = $mts['clase'];
				$this->datos['archivo'] = $mts['archivo'];
				$this->datos['clase'] = $mts['padre_clase'];
				$this->datos['clase_archivo'] = $mts['padre_archivo'];
				$this->meta_clase = $mts['meta_clase'];
			}else{
				throw new toba_error('ERROR cargando el SUBCOMPONENTE: El subcomponente esta declarado pero su metaclase no existe.');
			}
		}else{
			//La metaclase del componente es su CLASE INFO
			$this->meta_clase = $clase_info;
		}
		//- 3 - Creo el archivo_php y la clase_php que quiero mostrar
		$path = toba_instancia::get_path_proyecto(toba_editor::get_proyecto_cargado()) . "/php/" . $this->datos['archivo'];
		$this->archivo_php = new archivo_php($path);
		$this->clase_php = new clase_php($this->datos['subclase'], $this->archivo_php, $this->datos['clase'], $this->datos['clase_archivo']);
		$this->clase_php->set_meta_clase($this->meta_clase);
	}
	

	function evt__abrir()
	{
		$arch = toba::memoria()->get_parametro('archivo');
		if (isset($arch)) {
			$path_proyecto = toba_instancia::get_path_proyecto(toba_editor::get_proyecto_cargado()) . "/php/";
			$arch =  $path_proyecto . $arch;
			$this->archivo_php = new archivo_php($arch);	
		}
		//if ( $this->archivo_php->existe() ) {
			$this->archivo_php->abrir();
		//} else {
		//	toba::logger()->notice('Se solicito abrir un archivo que no existe: ' . $this->archivo_php->nombre() );	
		//}
	}
	
	function evt__crear_archivo()
	{
		$this->archivo_php->crear_basico();
	}
	
	function evt__subclase__alta($opciones)
	{
		$this->clase_php->generar($opciones);
	}

	/**
	 * Servicio de ejecución externo
	 */
	function servicio__ejecutar()
	{ 
		$this->evt__abrir();
	}
	
	function archivo_php()
	{
		return $this->archivo_php;
	}	
	
	function clase_php()
	{
		return $this->clase_php;	
	}
}
?>