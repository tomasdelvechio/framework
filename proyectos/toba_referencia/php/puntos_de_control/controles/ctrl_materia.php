<?
  class ctrl_materia extends toba_control
  {
    function ejecutar(&$parametros)
    {
      toba::logger()->info('SOY ' . get_class($this) . ' !!!' . print_r($parametros,true));    
      return true;
    }  
  }

?>