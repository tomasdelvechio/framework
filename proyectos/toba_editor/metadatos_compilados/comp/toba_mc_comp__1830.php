<?php

class toba_mc_comp__1830
{
	static function get_metadatos()
	{
		return array (
  '_info' => 
  array (
    'proyecto' => 'toba_editor',
    'objeto' => 1830,
    'anterior' => NULL,
    'identificador' => NULL,
    'reflexivo' => NULL,
    'clase_proyecto' => 'toba',
    'clase' => 'toba_datos_relacion',
    'subclase' => NULL,
    'subclase_archivo' => NULL,
    'objeto_categoria_proyecto' => NULL,
    'objeto_categoria' => NULL,
    'nombre' => 'Comp. cn',
    'titulo' => NULL,
    'colapsable' => NULL,
    'descripcion' => NULL,
    'fuente_proyecto' => 'toba_editor',
    'fuente' => 'instancia',
    'solicitud_registrar' => NULL,
    'solicitud_obj_obs_tipo' => NULL,
    'solicitud_obj_observacion' => NULL,
    'parametro_a' => NULL,
    'parametro_b' => NULL,
    'parametro_c' => NULL,
    'parametro_d' => NULL,
    'parametro_e' => NULL,
    'parametro_f' => NULL,
    'usuario' => NULL,
    'creacion' => '2006-06-30 18:16:16',
    'punto_montaje' => 12,
    'clase_editor_proyecto' => 'toba_editor',
    'clase_editor_item' => '1000251',
    'clase_archivo' => 'nucleo/componentes/persistencia/toba_datos_relacion.php',
    'clase_vinculos' => NULL,
    'clase_editor' => '1000251',
    'clase_icono' => 'objetos/datos_relacion.gif',
    'clase_descripcion_corta' => 'datos_relacion',
    'clase_instanciador_proyecto' => NULL,
    'clase_instanciador_item' => NULL,
    'objeto_existe_ayuda' => NULL,
    'ap_clase' => 'ap_relacion_objeto',
    'ap_archivo' => 'db/ap_relacion_objeto.php',
    'ap_punto_montaje' => 12,
    'cant_dependencias' => 3,
    'posicion_botonera' => NULL,
  ),
  '_info_estructura' => 
  array (
    'proyecto' => 'toba_editor',
    'objeto' => 1830,
    'debug' => 0,
    'ap' => 3,
    'punto_montaje' => 12,
    'ap_clase' => 'ap_relacion_objeto',
    'ap_archivo' => 'db/ap_relacion_objeto.php',
    'sinc_susp_constraints' => 0,
    'sinc_orden_automatico' => 1,
    'sinc_lock_optimista' => 1,
  ),
  '_info_relaciones' => 
  array (
    0 => 
    array (
      'proyecto' => 'toba_editor',
      'objeto' => 1830,
      'asoc_id' => 23,
      'padre_proyecto' => 'toba_editor',
      'padre_objeto' => 1501,
      'padre_id' => 'base',
      'hijo_proyecto' => 'toba_editor',
      'hijo_objeto' => 1502,
      'hijo_id' => 'dependencias',
      'cascada' => NULL,
      'orden' => '1',
    ),
    1 => 
    array (
      'proyecto' => 'toba_editor',
      'objeto' => 1830,
      'asoc_id' => 43,
      'padre_proyecto' => 'toba_editor',
      'padre_objeto' => 1501,
      'padre_id' => 'base',
      'hijo_proyecto' => 'toba_editor',
      'hijo_objeto' => 2298,
      'hijo_id' => 'consumo',
      'cascada' => NULL,
      'orden' => '2',
    ),
  ),
  '_info_dependencias' => 
  array (
    0 => 
    array (
      'identificador' => 'base',
      'proyecto' => 'toba_editor',
      'objeto' => 1501,
      'clase' => 'toba_datos_tabla',
      'clase_archivo' => 'nucleo/componentes/persistencia/toba_datos_tabla.php',
      'subclase' => NULL,
      'subclase_archivo' => NULL,
      'fuente' => 'instancia',
      'parametros_a' => '1',
      'parametros_b' => '1',
    ),
    1 => 
    array (
      'identificador' => 'dependencias',
      'proyecto' => 'toba_editor',
      'objeto' => 1502,
      'clase' => 'toba_datos_tabla',
      'clase_archivo' => 'nucleo/componentes/persistencia/toba_datos_tabla.php',
      'subclase' => NULL,
      'subclase_archivo' => NULL,
      'fuente' => 'instancia',
      'parametros_a' => '0',
      'parametros_b' => '0',
    ),
    2 => 
    array (
      'identificador' => 'consumo',
      'proyecto' => 'toba_editor',
      'objeto' => 2298,
      'clase' => 'toba_datos_tabla',
      'clase_archivo' => 'nucleo/componentes/persistencia/toba_datos_tabla.php',
      'subclase' => NULL,
      'subclase_archivo' => NULL,
      'fuente' => 'instancia',
      'parametros_a' => '0',
      'parametros_b' => '0',
    ),
  ),
  '_info_columnas_asoc_rel' => 
  array (
    0 => 
    array (
      'asoc_id' => 23,
      'proyecto' => 'toba_editor',
      'objeto' => 1830,
      'hijo_clave' => 48,
      'hijo_objeto' => 1502,
      'col_hija' => 'proyecto',
      'padre_objeto' => 1501,
      'padre_clave' => 21,
      'col_padre' => 'proyecto',
    ),
    1 => 
    array (
      'asoc_id' => 23,
      'proyecto' => 'toba_editor',
      'objeto' => 1830,
      'hijo_clave' => 49,
      'hijo_objeto' => 1502,
      'col_hija' => 'objeto_consumidor',
      'padre_objeto' => 1501,
      'padre_clave' => 22,
      'col_padre' => 'objeto',
    ),
    2 => 
    array (
      'asoc_id' => 43,
      'proyecto' => 'toba_editor',
      'objeto' => 1830,
      'hijo_clave' => 799,
      'hijo_objeto' => 2298,
      'col_hija' => 'proyecto',
      'padre_objeto' => 1501,
      'padre_clave' => 21,
      'col_padre' => 'proyecto',
    ),
    3 => 
    array (
      'asoc_id' => 43,
      'proyecto' => 'toba_editor',
      'objeto' => 1830,
      'hijo_clave' => 801,
      'hijo_objeto' => 2298,
      'col_hija' => 'objeto_consumidor',
      'padre_objeto' => 1501,
      'padre_clave' => 22,
      'col_padre' => 'objeto',
    ),
  ),
);
	}

}

?>