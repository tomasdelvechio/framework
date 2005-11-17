<?php
require_once('archivo_php.php');

/**
*	Representa una CLASE del ambiente. 
*	Tiene capacidades de generacion y analisis si se le asocia la metaclase correspondiente
*	a la clase cargada
*/
class clase_php
{		
	protected $nombre;
	protected $archivo;
	protected $padre_nombre;
	protected $archivo_padre_nombre;
	protected $meta_clase;				//la clase que conoce el contenido de la clase que se esta editando
	
	function __construct($nombre, $archivo, $clase_padre_nombre, $archivo_padre_nombre)
	{
		$this->nombre = $nombre;
		$this->archivo = $archivo;
		$this->padre_nombre = $clase_padre_nombre;
		$this->archivo_padre_nombre = $archivo_padre_nombre;
	}
	
	//Asocia la METACLASE
	function set_meta_clase($meta_clase)
	{
		$this->meta_clase = $meta_clase;
	}
	
	//---------------------------------------------------------------
	//-- Generacion de codigo
	//---------------------------------------------------------------

	function generar($opciones)
	{
		if ($this->archivo->esta_vacio())
			$this->archivo->crear_basico();
		$this->archivo->edicion_inicio();
		//�Est� incluido la clase padre en el archivo
		if (strpos($this->archivo->contenido(), $this->archivo_padre_nombre) === false) {
			$this->archivo->insertar_al_inicio("require_once('{$this->archivo_padre_nombre}');");
		}
		$this->archivo->insertar_al_final($this->generar_clase($opciones));
		$this->archivo->edicion_fin();	
		
	}
	
	function generar_clase($opciones)
	{
		//Incluir el c�digo que hace la subclase
		$codigo = $this->separador_clases();
		$cuerpo = $this->generar_clase_cuerpo($opciones);
		$codigo .= "class {$this->nombre} extends {$this->padre_nombre}\n{\n$cuerpo\n}\n";
		return $codigo;
	
	}
	
	function generar_clase_cuerpo($opciones)
	{
		if (!isset($this->meta_clase))
			return '';
		$this->meta_clase->set_nivel_comentarios($opciones['nivel_comentarios']);
		$cuerpo = '';
		if ($opciones['constructor']) {
			$cuerpo .= $this->meta_clase->generar_constructor()."\n";
		}
		if ($opciones['basicos']) {
			foreach ($this->meta_clase->generar_metodos_basicos() as $metodo_basico) {
				$cuerpo .= $metodo_basico."\n";
			}
		}
		if ($opciones['eventos']) {
			$solo_basicos = ($opciones['eventos'] == 1);
			$grupo_eventos = $this->meta_clase->generar_eventos($solo_basicos);
			if (count($grupo_eventos) > 0) {
				$cuerpo .= $this->separador_seccion_grande('Eventos');
				foreach ($grupo_eventos as $seccion =>$eventos) {
					$cuerpo .= $this->separador_seccion_chica($seccion);
					foreach ($eventos as $evento) {
						$cuerpo .= $evento."\n";
					}
				}
			}
		}
		return $cuerpo;
	}
	
	//--Utiler�as de formateo para la generaci�n
	protected function separador_clases()
	{
		return "//----------------------------------------------------------------\n";	
	}

	protected function separador_seccion_chica($nombre='')
	{
		return "\t//----------------------------- $nombre -----------------------------\n";	
	}	
	
	protected function separador_seccion_grande($nombre)
	{
		return  "\t//-------------------------------------------------------------------\n".
				"\t//--- $nombre\n".
				"\t//-------------------------------------------------------------------\n\n";
	}	
		
	//---------------------------------------------------------------
	//-- Analisis de codigo
	//---------------------------------------------------------------
	
	function analizar()
	{
		try {
			$clase = new ReflectionClass($this->nombre);
			$metodos = $clase->getMethods();
			
			echo "<div style='text-align: left;'><h3>Clase ".$clase->getName()."</h3>";
			echo "<ul>";
			//M�todos propios
			$this->analizar_metodos('propios', $clase, $metodos, true);
			$padre = $clase->getParentClass();
			while ($padre != null) {
				$titulo = "heredados de {$padre->getName()}";
				$this->analizar_metodos($titulo, $padre, $metodos, false);
				$padre = $padre->getParentClass();
			}
			echo "</ul></div>";
		} catch (Exception $e) {
			echo ei_mensaje("No se encuentra la clase {$this->nombre} en este archivo.", "error");
		}
	}	
	
	function analizar_metodos($titulo, $clase, $metodos, $mostrar=true)
	{
		$display = ($mostrar) ? "" : "style='display: none'";
		echo "<li><a href='javascript: ' onclick=\"o = this.nextSibling; o.style.display = (o.style.display == 'none') ? '' : 'none';\">";
		echo "M�todos $titulo</a></li>";
		echo "<ul $display >";
		foreach ($metodos as $metodo) {
			if ($metodo->getDeclaringClass() == $clase) {
				$estilo = '';
				if (isset($this->meta_clase)){
					if ($this->meta_clase->es_evento($metodo->getName())) {
						$tipo = recurso::imagen_apl('reflexion/desconocido.gif');
						if (! $this->meta_clase->es_evento_valido($metodo->getName())) {
							$tipo = recurso::imagen_apl('reflexion/problema.gif');
						}
						if ($this->meta_clase->es_evento_sospechoso($metodo->getName())) {
							$tipo = recurso::imagen_apl('warning.gif');
						}
						if ($this->meta_clase->es_evento_predefinido($metodo->getName())) {
							$tipo = recurso::imagen_apl('reflexion/evento.gif');
						}
						$estilo =  "list-style-image: url($tipo)";					
					} 
				}
				echo "<li style='padding-right: 10px; $estilo'>&nbsp;";
				echo $metodo->getName();
				echo "</li>\n";
			}
		}	
		echo "</ul></li>";	
	}
	//--------------------------------------------------------------------------
}		
?>