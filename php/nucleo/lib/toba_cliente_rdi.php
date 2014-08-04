<?php
require_once('contrib/lib/RDILib/RDIAutoload.php');
class toba_cliente_rdi 
{
    const nombre_archivo = '/rdi.ini';

    protected $proyecto;
    protected $clienteRdi;
	protected $instalacion;
	
	function __construct()
	{
		RDIAutoload::registrar();
	}
	
	/**
	 * Permite cambiar el proyecto del cliente RDI
	 * @param toba_proyecto $obj_proyecto
	 */
    function set_proyecto(toba_proyecto $obj_proyecto)
    {
		//Si hay cambio de proyecto, elimino la instancia de RDICliente
		if (isset($this->proyecto) && ($this->proyecto->get_id() != $obj_proyecto->get_id())) {
			unset($this->clienteRdi);
		}
		$this->proyecto = $obj_proyecto;
    }

	function set_instalacion($obj_instalacion)
	{
		$this->instalacion = $obj_instalacion;
	}
	
	/**
	 * Devuelve una instancia de RDICliente para poder trabajar contra el ECM
	 * @throws toba_error
	 * @return \RDICliente
	 */
    function get_cliente()
    {
		if (! isset($this->clienteRdi)) {
			$this->clienteRdi = $this->instanciar_cliente();			
		}
		return $this->clienteRdi;
    }

    //------------------------------------------------------------------------//
    //						METODOS INTERNOS
    //------------------------------------------------------------------------//
	/**
	 * Instancia el cliente RDI
	 * @return \RDICliente
	 * @throws toba_error
	 * @ignore
	 */
    protected function instanciar_cliente()
    {
		$id_proyecto = $this->proyecto->get_id();		
		$ini = new toba_ini($this->instalacion->get_path_carpeta_instalacion(). self::nombre_archivo);

		if (! $ini->existe_entrada($id_proyecto)) {
			throw new toba_error('Falta el archivo de configuraci�n rdi.ini');
		}

		$parametros = $ini->get($id_proyecto);		
		$rdi = new RDICliente($parametros['conector'], 
							$parametros['repositorio'],
							$parametros['usuario'],
							$parametros['clave'],
							$id_proyecto, 
							$parametros['instalacion']);

		//Agrego un log para desarrollo
		if (! $this->instalacion->es_produccion()) {
			$log = new toba_logger_rdi($id_proyecto);
			$rdi->asociar_log($log);
		}

		//Reviso si existen servicios redefinidos y los asigno
		$serv_personalizados = toba::proyecto()->get_parametro('servicios_rdi');
		if (! is_null($serv_personalizados)) {
			foreach($serv_personalizados as $servicio => $clase) {
				$rdi->mapeoServicios()->redefinir($servicio, $clase);				
			}
		}		

		return $rdi;
    }
}
?>