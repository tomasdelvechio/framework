<?
/*
	Cola de mensajes a mostrar al usuario

	Falta implementar algo asociado a los GRAGOS
	(que implique el color que se le da al mensaje)

*/
class cola_mensajes
{
	private $mensajes = array();
	static private $instancia;
	
	static function instancia()
	{
		if (!isset(self::$instancia)) {
			self::$instancia = new cola_mensajes();
		}
		return self::$instancia;		
	}
	
	private function __construct()
	{	
	}
	
	
	//--------------------------------------------------------------

	public function agregar($mensaje, $nivel='error')
	{
		$this->mensajes[] = array($mensaje, $nivel);
		//Agrego el mensaje mostrado al usuario al logger como DEBUG
		toba::get_logger()->debug("Mensaje a usuario: ".$mensaje, 'toba');
	}

	public function agregar_id($indice, $parametros=null, $nivel='error')
	{
		$this->agregar(mensaje::get($indice, $parametros), $nivel);
	}

	public function verificar_mensajes()
	//Reporta la existencia de mensajes
	{
		if(count($this->mensajes)>0) return true;
	}

	//--------------------------------------------------------------
	
	public function mostrar()
	{
		toba_js::cargar_consumos_basicos(); //Por si no se cargaron antes
		toba_js::cargar_consumos_globales(array("basicos/cola_mensajes"));
		echo toba_js::abrir();
		foreach($this->mensajes as $mensaje){
			$texto = str_replace("'", "\\'", $mensaje[0]);
			$texto = toba_js::string($texto);
			echo "cola_mensajes.agregar('$texto' + '\\n', '{$mensaje[1]}');\n";
		}
		echo "cola_mensajes.mostrar()\n";
		echo toba_js::cerrar();
	}
	
	public function vaciar()
	{
		$this->mensajes = array();
	}
	//--------------------------------------------------------------
}
?>