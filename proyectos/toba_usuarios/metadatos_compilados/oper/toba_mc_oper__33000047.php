<?php

class toba_mc_item__33000047
{
	static function get_metadatos()
	{
		return array (
  'basica' => 
  array (
    'item_proyecto' => 'toba_usuarios',
    'item' => '33000047',
    'item_nombre' => 'Servicios Ofrecidos',
    'item_descripcion' => NULL,
    'item_act_buffer_proyecto' => NULL,
    'item_act_buffer' => NULL,
    'item_act_patron_proyecto' => NULL,
    'item_act_patron' => NULL,
    'item_act_accion_script' => NULL,
    'item_solic_tipo' => 'web',
    'item_solic_registrar' => 0,
    'item_solic_obs_tipo_proyecto' => NULL,
    'item_solic_obs_tipo' => NULL,
    'item_solic_observacion' => NULL,
    'item_solic_cronometrar' => NULL,
    'item_parametro_a' => NULL,
    'item_parametro_b' => NULL,
    'item_parametro_c' => NULL,
    'item_imagen_recurso_origen' => 'apex',
    'item_imagen' => NULL,
    'punto_montaje' => 12000004,
    'tipo_pagina_punto_montaje' => 12000004,
    'tipo_pagina_clase' => 'toba_usuarios_normal',
    'tipo_pagina_archivo' => 'extension_toba/toba_usuarios_normal.php',
    'item_include_arriba' => NULL,
    'item_include_abajo' => NULL,
    'item_zona_proyecto' => NULL,
    'item_zona' => NULL,
    'zona_punto_montaje' => NULL,
    'item_zona_archivo' => NULL,
    'zona_cons_archivo' => NULL,
    'zona_cons_clase' => NULL,
    'zona_cons_metodo' => NULL,
    'item_publico' => 0,
    'item_existe_ayuda' => NULL,
    'carpeta' => 0,
    'menu' => 1,
    'orden' => NULL,
    'publico' => 0,
    'redirecciona' => NULL,
    'crono' => NULL,
    'solicitud_tipo' => 'web',
    'item_padre' => '33000045',
    'cant_dependencias' => 1,
    'cant_items_hijos' => 0,
    'molde' => NULL,
    'retrasar_headers' => 0,
  ),
  'objetos' => 
  array (
    0 => 
    array (
      'objeto_proyecto' => 'toba_usuarios',
      'objeto' => 33000211,
      'objeto_nombre' => 'Keystore Clientes REST',
      'objeto_subclase' => 'ci_servicios_ofrecidos',
      'objeto_subclase_archivo' => 'servicios_web/rest/servicios_ofrecidos/ci_servicios_ofrecidos.php',
      'orden' => 0,
      'clase_proyecto' => 'toba',
      'clase' => 'toba_ci',
      'clase_archivo' => 'nucleo/componentes/interface/toba_ci.php',
      'fuente_proyecto' => NULL,
      'fuente' => NULL,
      'fuente_motor' => NULL,
      'fuente_host' => NULL,
      'fuente_usuario' => NULL,
      'fuente_clave' => NULL,
      'fuente_base' => NULL,
    ),
  ),
);
	}

}

class toba_mc_comp__33000211
{
	static function get_metadatos()
	{
		return array (
  '_info' => 
  array (
    'proyecto' => 'toba_usuarios',
    'objeto' => 33000211,
    'anterior' => NULL,
    'identificador' => NULL,
    'reflexivo' => NULL,
    'clase_proyecto' => 'toba',
    'clase' => 'toba_ci',
    'subclase' => 'ci_servicios_ofrecidos',
    'subclase_archivo' => 'servicios_web/rest/servicios_ofrecidos/ci_servicios_ofrecidos.php',
    'objeto_categoria_proyecto' => NULL,
    'objeto_categoria' => NULL,
    'nombre' => 'Keystore Clientes REST',
    'titulo' => NULL,
    'colapsable' => 0,
    'descripcion' => NULL,
    'fuente_proyecto' => NULL,
    'fuente' => NULL,
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
    'creacion' => '2012-07-31 15:22:56',
    'punto_montaje' => 12000004,
    'clase_editor_proyecto' => 'toba_editor',
    'clase_editor_item' => '1000249',
    'clase_archivo' => 'nucleo/componentes/interface/toba_ci.php',
    'clase_vinculos' => NULL,
    'clase_editor' => '1000249',
    'clase_icono' => 'objetos/multi_etapa.gif',
    'clase_descripcion_corta' => 'ci',
    'clase_instanciador_proyecto' => 'toba_editor',
    'clase_instanciador_item' => '1642',
    'objeto_existe_ayuda' => NULL,
    'ap_clase' => NULL,
    'ap_archivo' => NULL,
    'ap_punto_montaje' => NULL,
    'cant_dependencias' => 3,
    'posicion_botonera' => 'abajo',
  ),
  '_info_eventos' => 
  array (
    0 => 
    array (
      'evento_id' => 33000242,
      'identificador' => 'procesar',
      'etiqueta' => '&Guardar',
      'maneja_datos' => 1,
      'sobre_fila' => NULL,
      'confirmacion' => NULL,
      'estilo' => NULL,
      'imagen_recurso_origen' => 'apex',
      'imagen' => NULL,
      'en_botonera' => 1,
      'ayuda' => NULL,
      'ci_predep' => NULL,
      'implicito' => 0,
      'defecto' => 1,
      'grupo' => NULL,
      'accion' => NULL,
      'accion_imphtml_debug' => 0,
      'accion_vinculo_carpeta' => NULL,
      'accion_vinculo_item' => NULL,
      'accion_vinculo_objeto' => NULL,
      'accion_vinculo_popup' => 0,
      'accion_vinculo_popup_param' => NULL,
      'accion_vinculo_celda' => NULL,
      'accion_vinculo_target' => NULL,
      'accion_vinculo_servicio' => NULL,
      'es_seleccion_multiple' => 0,
      'es_autovinculo' => 0,
    ),
    1 => 
    array (
      'evento_id' => 33000240,
      'identificador' => 'cancelar',
      'etiqueta' => '&Volver',
      'maneja_datos' => 0,
      'sobre_fila' => NULL,
      'confirmacion' => NULL,
      'estilo' => 'ei-boton-izq',
      'imagen_recurso_origen' => 'apex',
      'imagen' => 'volver.png',
      'en_botonera' => 1,
      'ayuda' => NULL,
      'ci_predep' => NULL,
      'implicito' => 0,
      'defecto' => 0,
      'grupo' => NULL,
      'accion' => NULL,
      'accion_imphtml_debug' => 0,
      'accion_vinculo_carpeta' => NULL,
      'accion_vinculo_item' => NULL,
      'accion_vinculo_objeto' => NULL,
      'accion_vinculo_popup' => 0,
      'accion_vinculo_popup_param' => NULL,
      'accion_vinculo_celda' => NULL,
      'accion_vinculo_target' => NULL,
      'accion_vinculo_servicio' => NULL,
      'es_seleccion_multiple' => 0,
      'es_autovinculo' => 0,
    ),
  ),
  '_info_puntos_control' => 
  array (
  ),
  '_info_ci' => 
  array (
    'ev_procesar_etiq' => NULL,
    'ev_cancelar_etiq' => NULL,
    'objetos' => NULL,
    'ancho' => NULL,
    'alto' => NULL,
    'posicion_botonera' => NULL,
    'tipo_navegacion' => NULL,
    'con_toc' => 0,
    'botonera_barra_item' => 0,
  ),
  '_info_ci_me_pantalla' => 
  array (
    0 => 
    array (
      'pantalla' => 33000081,
      'identificador' => 'pant_inicial',
      'etiqueta' => 'Pantalla Inicial',
      'descripcion' => NULL,
      'tip' => NULL,
      'imagen_recurso_origen' => 'apex',
      'imagen' => NULL,
      'objetos' => NULL,
      'eventos' => NULL,
      'orden' => 1,
      'punto_montaje' => 12000004,
      'subclase' => NULL,
      'subclase_archivo' => NULL,
      'template' => NULL,
      'template_impresion' => NULL,
    ),
    1 => 
    array (
      'pantalla' => 33000080,
      'identificador' => 'pant_edicion',
      'etiqueta' => 'Pantalla Edicion',
      'descripcion' => NULL,
      'tip' => NULL,
      'imagen_recurso_origen' => 'apex',
      'imagen' => NULL,
      'objetos' => NULL,
      'eventos' => NULL,
      'orden' => 2,
      'punto_montaje' => 12000004,
      'subclase' => NULL,
      'subclase_archivo' => NULL,
      'template' => NULL,
      'template_impresion' => NULL,
    ),
  ),
  '_info_obj_pantalla' => 
  array (
    0 => 
    array (
      'pantalla' => 33000080,
      'proyecto' => 'toba_usuarios',
      'objeto_ci' => 33000211,
      'dep_id' => 33000158,
      'orden' => 0,
      'identificador_pantalla' => 'pant_edicion',
      'identificador_dep' => 'form_basico',
    ),
    1 => 
    array (
      'pantalla' => 33000081,
      'proyecto' => 'toba_usuarios',
      'objeto_ci' => 33000211,
      'dep_id' => 33000157,
      'orden' => 0,
      'identificador_pantalla' => 'pant_inicial',
      'identificador_dep' => 'filtro',
    ),
    2 => 
    array (
      'pantalla' => 33000081,
      'proyecto' => 'toba_usuarios',
      'objeto_ci' => 33000211,
      'dep_id' => 33000156,
      'orden' => 1,
      'identificador_pantalla' => 'pant_inicial',
      'identificador_dep' => 'cuadro_sel_conf',
    ),
  ),
  '_info_evt_pantalla' => 
  array (
    0 => 
    array (
      'pantalla' => 33000080,
      'proyecto' => 'toba_usuarios',
      'objeto_ci' => 33000211,
      'evento_id' => 33000240,
      'identificador_pantalla' => 'pant_edicion',
      'identificador_evento' => 'cancelar',
    ),
    1 => 
    array (
      'pantalla' => 33000080,
      'proyecto' => 'toba_usuarios',
      'objeto_ci' => 33000211,
      'evento_id' => 33000242,
      'identificador_pantalla' => 'pant_edicion',
      'identificador_evento' => 'procesar',
    ),
  ),
  '_info_dependencias' => 
  array (
    0 => 
    array (
      'identificador' => 'cuadro_sel_conf',
      'proyecto' => 'toba_usuarios',
      'objeto' => 33000206,
      'clase' => 'toba_ei_cuadro',
      'clase_archivo' => 'nucleo/componentes/interface/toba_ei_cuadro.php',
      'subclase' => NULL,
      'subclase_archivo' => NULL,
      'fuente' => NULL,
      'parametros_a' => NULL,
      'parametros_b' => NULL,
    ),
    1 => 
    array (
      'identificador' => 'filtro',
      'proyecto' => 'toba_usuarios',
      'objeto' => 33000207,
      'clase' => 'toba_ei_formulario',
      'clase_archivo' => 'nucleo/componentes/interface/toba_ei_formulario.php',
      'subclase' => 'form_proyecto',
      'subclase_archivo' => 'servicios_web/rest/servicios_ofrecidos/form_proyecto.php',
      'fuente' => 'toba_usuarios',
      'parametros_a' => NULL,
      'parametros_b' => NULL,
    ),
    2 => 
    array (
      'identificador' => 'form_basico',
      'proyecto' => 'toba_usuarios',
      'objeto' => 33000208,
      'clase' => 'toba_ei_formulario',
      'clase_archivo' => 'nucleo/componentes/interface/toba_ei_formulario.php',
      'subclase' => NULL,
      'subclase_archivo' => NULL,
      'fuente' => 'toba_usuarios',
      'parametros_a' => NULL,
      'parametros_b' => NULL,
    ),
  ),
);
	}

}

class toba_mc_comp__33000206
{
	static function get_metadatos()
	{
		return array (
  '_info' => 
  array (
    'proyecto' => 'toba_usuarios',
    'objeto' => 33000206,
    'anterior' => NULL,
    'identificador' => NULL,
    'reflexivo' => NULL,
    'clase_proyecto' => 'toba',
    'clase' => 'toba_ei_cuadro',
    'subclase' => NULL,
    'subclase_archivo' => NULL,
    'objeto_categoria_proyecto' => NULL,
    'objeto_categoria' => NULL,
    'nombre' => 'Keystore Clientes REST -  cuadro',
    'titulo' => NULL,
    'colapsable' => 0,
    'descripcion' => NULL,
    'fuente_proyecto' => NULL,
    'fuente' => NULL,
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
    'creacion' => '2012-08-01 15:16:01',
    'punto_montaje' => 12000004,
    'clase_editor_proyecto' => 'toba_editor',
    'clase_editor_item' => '1000253',
    'clase_archivo' => 'nucleo/componentes/interface/toba_ei_cuadro.php',
    'clase_vinculos' => NULL,
    'clase_editor' => '1000253',
    'clase_icono' => 'objetos/cuadro_array.gif',
    'clase_descripcion_corta' => 'ei_cuadro',
    'clase_instanciador_proyecto' => 'toba_editor',
    'clase_instanciador_item' => '1843',
    'objeto_existe_ayuda' => NULL,
    'ap_clase' => NULL,
    'ap_archivo' => NULL,
    'ap_punto_montaje' => NULL,
    'cant_dependencias' => 0,
    'posicion_botonera' => 'abajo',
  ),
  '_info_eventos' => 
  array (
    0 => 
    array (
      'evento_id' => 33000233,
      'identificador' => 'agregar',
      'etiqueta' => 'Config. Cliente',
      'maneja_datos' => 1,
      'sobre_fila' => 0,
      'confirmacion' => NULL,
      'estilo' => NULL,
      'imagen_recurso_origen' => 'apex',
      'imagen' => 'nucleo/agregar.gif',
      'en_botonera' => 1,
      'ayuda' => NULL,
      'ci_predep' => NULL,
      'implicito' => NULL,
      'defecto' => NULL,
      'grupo' => NULL,
      'accion' => NULL,
      'accion_imphtml_debug' => NULL,
      'accion_vinculo_carpeta' => NULL,
      'accion_vinculo_item' => NULL,
      'accion_vinculo_objeto' => NULL,
      'accion_vinculo_popup' => NULL,
      'accion_vinculo_popup_param' => NULL,
      'accion_vinculo_celda' => NULL,
      'accion_vinculo_target' => NULL,
      'accion_vinculo_servicio' => NULL,
      'es_seleccion_multiple' => 0,
      'es_autovinculo' => 0,
    ),
    1 => 
    array (
      'evento_id' => 33000234,
      'identificador' => 'eliminar',
      'etiqueta' => NULL,
      'maneja_datos' => 1,
      'sobre_fila' => 1,
      'confirmacion' => 'Confirme la eliminación de esta configuración',
      'estilo' => NULL,
      'imagen_recurso_origen' => 'apex',
      'imagen' => 'borrar.gif',
      'en_botonera' => 0,
      'ayuda' => NULL,
      'ci_predep' => NULL,
      'implicito' => NULL,
      'defecto' => NULL,
      'grupo' => NULL,
      'accion' => NULL,
      'accion_imphtml_debug' => NULL,
      'accion_vinculo_carpeta' => NULL,
      'accion_vinculo_item' => NULL,
      'accion_vinculo_objeto' => NULL,
      'accion_vinculo_popup' => 0,
      'accion_vinculo_popup_param' => NULL,
      'accion_vinculo_celda' => NULL,
      'accion_vinculo_target' => NULL,
      'accion_vinculo_servicio' => NULL,
      'es_seleccion_multiple' => 0,
      'es_autovinculo' => 0,
    ),
  ),
  '_info_puntos_control' => 
  array (
  ),
  '_info_cuadro' => 
  array (
    'titulo' => NULL,
    'subtitulo' => NULL,
    'sql' => NULL,
    'columnas_clave' => 'usuario',
    'clave_datos_tabla' => 0,
    'archivos_callbacks' => NULL,
    'ancho' => '100%',
    'ordenar' => 0,
    'exportar_paginado' => 0,
    'exportar_xls' => 0,
    'exportar_pdf' => 0,
    'paginar' => 0,
    'tamano_pagina' => NULL,
    'tipo_paginado' => 'P',
    'scroll' => 0,
    'alto' => NULL,
    'eof_invisible' => 0,
    'eof_customizado' => 'No hay configuraciones de clientes para el servicio web',
    'pdf_respetar_paginacion' => NULL,
    'pdf_propiedades' => NULL,
    'asociacion_columnas' => NULL,
    'dao_nucleo_proyecto' => NULL,
    'dao_clase' => NULL,
    'dao_metodo' => NULL,
    'dao_parametros' => NULL,
    'dao_archivo' => '',
    'cc_modo' => NULL,
    'cc_modo_anidado_colap' => NULL,
    'cc_modo_anidado_totcol' => NULL,
    'cc_modo_anidado_totcua' => NULL,
    'columna_descripcion' => NULL,
    'mostrar_total_registros' => 0,
    'siempre_con_titulo' => 0,
  ),
  '_info_cuadro_columna' => 
  array (
    0 => 
    array (
      'orden' => '1',
      'objeto_cuadro_col' => 33000091,
      'titulo' => 'Usuario',
      'estilo_titulo' => 'ei-cuadro-col-tit',
      'estilo' => '4',
      'ancho' => NULL,
      'clave' => 'usuario',
      'formateo' => 'NULO',
      'no_ordenar' => NULL,
      'mostrar_xls' => NULL,
      'mostrar_pdf' => NULL,
      'pdf_propiedades' => NULL,
      'total' => NULL,
      'vinculo_indice' => NULL,
      'usar_vinculo' => NULL,
      'total_cc' => NULL,
      'permitir_html' => 0,
      'grupo' => NULL,
      'evento_asociado' => NULL,
    ),
  ),
  '_info_cuadro_cortes' => 
  array (
  ),
  '_info_sum_cuadro_cortes' => 
  array (
  ),
);
	}

}

class toba_mc_comp__33000207
{
	static function get_metadatos()
	{
		return array (
  '_info' => 
  array (
    'proyecto' => 'toba_usuarios',
    'objeto' => 33000207,
    'anterior' => NULL,
    'identificador' => NULL,
    'reflexivo' => NULL,
    'clase_proyecto' => 'toba',
    'clase' => 'toba_ei_formulario',
    'subclase' => 'form_proyecto',
    'subclase_archivo' => 'servicios_web/rest/servicios_ofrecidos/form_proyecto.php',
    'objeto_categoria_proyecto' => NULL,
    'objeto_categoria' => NULL,
    'nombre' => 'Perfil de Acceso REST - filtro_proyectos',
    'titulo' => NULL,
    'colapsable' => 0,
    'descripcion' => NULL,
    'fuente_proyecto' => 'toba_usuarios',
    'fuente' => 'toba_usuarios',
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
    'creacion' => '2008-03-17 16:19:00',
    'punto_montaje' => 12000004,
    'clase_editor_proyecto' => 'toba_editor',
    'clase_editor_item' => '1000255',
    'clase_archivo' => 'nucleo/componentes/interface/toba_ei_formulario.php',
    'clase_vinculos' => NULL,
    'clase_editor' => '1000255',
    'clase_icono' => 'objetos/ut_formulario.gif',
    'clase_descripcion_corta' => 'ei_formulario',
    'clase_instanciador_proyecto' => 'toba_editor',
    'clase_instanciador_item' => '1842',
    'objeto_existe_ayuda' => NULL,
    'ap_clase' => NULL,
    'ap_archivo' => NULL,
    'ap_punto_montaje' => NULL,
    'cant_dependencias' => 0,
    'posicion_botonera' => 'abajo',
  ),
  '_info_eventos' => 
  array (
    0 => 
    array (
      'evento_id' => 33000236,
      'identificador' => 'filtrar',
      'etiqueta' => 'Seleccionar',
      'maneja_datos' => 1,
      'sobre_fila' => NULL,
      'confirmacion' => NULL,
      'estilo' => 'ei-boton-filtrar',
      'imagen_recurso_origen' => 'apex',
      'imagen' => 'filtrar.png',
      'en_botonera' => 1,
      'ayuda' => NULL,
      'ci_predep' => NULL,
      'implicito' => 0,
      'defecto' => 0,
      'grupo' => 'cargado,no_cargado',
      'accion' => NULL,
      'accion_imphtml_debug' => NULL,
      'accion_vinculo_carpeta' => NULL,
      'accion_vinculo_item' => NULL,
      'accion_vinculo_objeto' => NULL,
      'accion_vinculo_popup' => NULL,
      'accion_vinculo_popup_param' => NULL,
      'accion_vinculo_celda' => NULL,
      'accion_vinculo_target' => NULL,
      'accion_vinculo_servicio' => NULL,
      'es_seleccion_multiple' => 0,
      'es_autovinculo' => 0,
    ),
  ),
  '_info_puntos_control' => 
  array (
  ),
  '_info_formulario' => 
  array (
    'auto_reset' => NULL,
    'ancho' => NULL,
    'ancho_etiqueta' => '150px',
    'expandir_descripcion' => 0,
    'no_imprimir_efs_sin_estado' => 1,
    'resaltar_efs_con_estado' => 1,
    'template' => NULL,
    'template_impresion' => NULL,
  ),
  '_info_formulario_ef' => 
  array (
    0 => 
    array (
      'objeto_ei_formulario_fila' => 33000246,
      'objeto_ei_formulario' => 33000207,
      'objeto_ei_formulario_proyecto' => 'toba_usuarios',
      'identificador' => 'proyecto',
      'elemento_formulario' => 'ef_combo',
      'columnas' => 'proyecto',
      'obligatorio' => 1,
      'oculto_relaja_obligatorio' => 0,
      'orden' => '1',
      'etiqueta' => 'Proyecto',
      'etiqueta_estilo' => NULL,
      'descripcion' => NULL,
      'colapsado' => 0,
      'desactivado' => 0,
      'estilo' => NULL,
      'total' => NULL,
      'inicializacion' => NULL,
      'permitir_html' => NULL,
      'deshabilitar_rest_func' => NULL,
      'estado_defecto' => NULL,
      'solo_lectura' => 0,
      'solo_lectura_modificacion' => 0,
      'carga_metodo' => 'get_lista_proyectos',
      'carga_clase' => 'consultas_instancia',
      'carga_include' => 'lib/consultas_instancia.php',
      'carga_dt' => NULL,
      'carga_consulta_php' => NULL,
      'carga_sql' => NULL,
      'carga_fuente' => 'toba_usuarios',
      'carga_lista' => NULL,
      'carga_col_clave' => 'proyecto',
      'carga_col_desc' => 'proyecto',
      'carga_maestros' => NULL,
      'carga_cascada_relaj' => 0,
      'cascada_mantiene_estado' => 0,
      'carga_permite_no_seteado' => 1,
      'carga_no_seteado' => '-- SELECCIONAR --',
      'carga_no_seteado_ocultar' => 0,
      'edit_tamano' => NULL,
      'edit_maximo' => NULL,
      'edit_mascara' => NULL,
      'edit_unidad' => NULL,
      'edit_rango' => NULL,
      'edit_filas' => NULL,
      'edit_columnas' => NULL,
      'edit_wrap' => NULL,
      'edit_resaltar' => NULL,
      'edit_ajustable' => NULL,
      'edit_confirmar_clave' => NULL,
      'edit_expreg' => NULL,
      'popup_item' => NULL,
      'popup_proyecto' => NULL,
      'popup_editable' => NULL,
      'popup_ventana' => NULL,
      'popup_carga_desc_metodo' => NULL,
      'popup_carga_desc_clase' => NULL,
      'popup_carga_desc_include' => NULL,
      'popup_puede_borrar_estado' => NULL,
      'fieldset_fin' => NULL,
      'check_valor_si' => NULL,
      'check_valor_no' => NULL,
      'check_desc_si' => NULL,
      'check_desc_no' => NULL,
      'check_ml_toggle' => NULL,
      'fijo_sin_estado' => NULL,
      'editor_ancho' => NULL,
      'editor_alto' => NULL,
      'editor_botonera' => NULL,
      'selec_cant_minima' => NULL,
      'selec_cant_maxima' => NULL,
      'selec_utilidades' => NULL,
      'selec_tamano' => NULL,
      'selec_ancho' => NULL,
      'selec_serializar' => NULL,
      'selec_cant_columnas' => NULL,
      'upload_extensiones' => NULL,
      'punto_montaje' => 12000004,
      'placeholder' => NULL,
      'carga_consulta_php_clase' => NULL,
      'carga_consulta_php_archivo' => NULL,
    ),
  ),
);
	}

}

class toba_mc_comp__33000208
{
	static function get_metadatos()
	{
		return array (
  '_info' => 
  array (
    'proyecto' => 'toba_usuarios',
    'objeto' => 33000208,
    'anterior' => NULL,
    'identificador' => NULL,
    'reflexivo' => NULL,
    'clase_proyecto' => 'toba',
    'clase' => 'toba_ei_formulario',
    'subclase' => NULL,
    'subclase_archivo' => NULL,
    'objeto_categoria_proyecto' => NULL,
    'objeto_categoria' => NULL,
    'nombre' => 'Accesos a Servicios Web REST - form_basicos',
    'titulo' => NULL,
    'colapsable' => 0,
    'descripcion' => NULL,
    'fuente_proyecto' => 'toba_usuarios',
    'fuente' => 'toba_usuarios',
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
    'creacion' => '2009-12-28 14:32:08',
    'punto_montaje' => 12000004,
    'clase_editor_proyecto' => 'toba_editor',
    'clase_editor_item' => '1000255',
    'clase_archivo' => 'nucleo/componentes/interface/toba_ei_formulario.php',
    'clase_vinculos' => NULL,
    'clase_editor' => '1000255',
    'clase_icono' => 'objetos/ut_formulario.gif',
    'clase_descripcion_corta' => 'ei_formulario',
    'clase_instanciador_proyecto' => 'toba_editor',
    'clase_instanciador_item' => '1842',
    'objeto_existe_ayuda' => NULL,
    'ap_clase' => NULL,
    'ap_archivo' => NULL,
    'ap_punto_montaje' => NULL,
    'cant_dependencias' => 0,
    'posicion_botonera' => 'abajo',
  ),
  '_info_eventos' => 
  array (
    0 => 
    array (
      'evento_id' => 33000237,
      'identificador' => 'modificacion',
      'etiqueta' => '&Modificar',
      'maneja_datos' => 1,
      'sobre_fila' => NULL,
      'confirmacion' => NULL,
      'estilo' => NULL,
      'imagen_recurso_origen' => 'apex',
      'imagen' => NULL,
      'en_botonera' => 0,
      'ayuda' => NULL,
      'ci_predep' => NULL,
      'implicito' => 1,
      'defecto' => 0,
      'grupo' => NULL,
      'accion' => NULL,
      'accion_imphtml_debug' => NULL,
      'accion_vinculo_carpeta' => NULL,
      'accion_vinculo_item' => NULL,
      'accion_vinculo_objeto' => NULL,
      'accion_vinculo_popup' => NULL,
      'accion_vinculo_popup_param' => NULL,
      'accion_vinculo_celda' => NULL,
      'accion_vinculo_target' => NULL,
      'accion_vinculo_servicio' => NULL,
      'es_seleccion_multiple' => 0,
      'es_autovinculo' => 0,
    ),
  ),
  '_info_puntos_control' => 
  array (
  ),
  '_info_formulario' => 
  array (
    'auto_reset' => NULL,
    'ancho' => '100%',
    'ancho_etiqueta' => '150px',
    'expandir_descripcion' => 0,
    'no_imprimir_efs_sin_estado' => 0,
    'resaltar_efs_con_estado' => 0,
    'template' => NULL,
    'template_impresion' => NULL,
  ),
  '_info_formulario_ef' => 
  array (
    0 => 
    array (
      'objeto_ei_formulario_fila' => 33000249,
      'objeto_ei_formulario' => 33000208,
      'objeto_ei_formulario_proyecto' => 'toba_usuarios',
      'identificador' => 'cert_file',
      'elemento_formulario' => 'ef_upload',
      'columnas' => 'cert_file',
      'obligatorio' => 1,
      'oculto_relaja_obligatorio' => 1,
      'orden' => '1',
      'etiqueta' => 'Certificado del cliente',
      'etiqueta_estilo' => NULL,
      'descripcion' => 'Adjuntar certificado publico del cliente',
      'colapsado' => 0,
      'desactivado' => 0,
      'estilo' => NULL,
      'total' => NULL,
      'inicializacion' => NULL,
      'permitir_html' => 0,
      'deshabilitar_rest_func' => 0,
      'estado_defecto' => NULL,
      'solo_lectura' => 0,
      'solo_lectura_modificacion' => 0,
      'carga_metodo' => NULL,
      'carga_clase' => NULL,
      'carga_include' => NULL,
      'carga_dt' => NULL,
      'carga_consulta_php' => NULL,
      'carga_sql' => NULL,
      'carga_fuente' => NULL,
      'carga_lista' => NULL,
      'carga_col_clave' => NULL,
      'carga_col_desc' => NULL,
      'carga_maestros' => NULL,
      'carga_cascada_relaj' => NULL,
      'cascada_mantiene_estado' => 0,
      'carga_permite_no_seteado' => 0,
      'carga_no_seteado' => NULL,
      'carga_no_seteado_ocultar' => NULL,
      'edit_tamano' => NULL,
      'edit_maximo' => NULL,
      'edit_mascara' => NULL,
      'edit_unidad' => NULL,
      'edit_rango' => NULL,
      'edit_filas' => NULL,
      'edit_columnas' => NULL,
      'edit_wrap' => NULL,
      'edit_resaltar' => NULL,
      'edit_ajustable' => NULL,
      'edit_confirmar_clave' => NULL,
      'edit_expreg' => NULL,
      'popup_item' => NULL,
      'popup_proyecto' => NULL,
      'popup_editable' => NULL,
      'popup_ventana' => NULL,
      'popup_carga_desc_metodo' => NULL,
      'popup_carga_desc_clase' => NULL,
      'popup_carga_desc_include' => NULL,
      'popup_puede_borrar_estado' => NULL,
      'fieldset_fin' => NULL,
      'check_valor_si' => NULL,
      'check_valor_no' => NULL,
      'check_desc_si' => NULL,
      'check_desc_no' => NULL,
      'check_ml_toggle' => NULL,
      'fijo_sin_estado' => NULL,
      'editor_ancho' => NULL,
      'editor_alto' => NULL,
      'editor_botonera' => NULL,
      'selec_cant_minima' => NULL,
      'selec_cant_maxima' => NULL,
      'selec_utilidades' => NULL,
      'selec_tamano' => NULL,
      'selec_ancho' => NULL,
      'selec_serializar' => NULL,
      'selec_cant_columnas' => NULL,
      'upload_extensiones' => 'crt,pem',
      'punto_montaje' => 12000004,
      'placeholder' => NULL,
      'carga_consulta_php_clase' => NULL,
      'carga_consulta_php_archivo' => NULL,
    ),
    1 => 
    array (
      'objeto_ei_formulario_fila' => 33000259,
      'objeto_ei_formulario' => 33000208,
      'objeto_ei_formulario_proyecto' => 'toba_usuarios',
      'identificador' => 'usuario',
      'elemento_formulario' => 'ef_editable',
      'columnas' => 'usuario',
      'obligatorio' => 1,
      'oculto_relaja_obligatorio' => 1,
      'orden' => '2',
      'etiqueta' => 'Usuario',
      'etiqueta_estilo' => NULL,
      'descripcion' => NULL,
      'colapsado' => 0,
      'desactivado' => 0,
      'estilo' => NULL,
      'total' => NULL,
      'inicializacion' => NULL,
      'permitir_html' => 0,
      'deshabilitar_rest_func' => 0,
      'estado_defecto' => NULL,
      'solo_lectura' => 0,
      'solo_lectura_modificacion' => 0,
      'carga_metodo' => NULL,
      'carga_clase' => NULL,
      'carga_include' => NULL,
      'carga_dt' => NULL,
      'carga_consulta_php' => NULL,
      'carga_sql' => NULL,
      'carga_fuente' => NULL,
      'carga_lista' => NULL,
      'carga_col_clave' => NULL,
      'carga_col_desc' => NULL,
      'carga_maestros' => NULL,
      'carga_cascada_relaj' => NULL,
      'cascada_mantiene_estado' => 0,
      'carga_permite_no_seteado' => 0,
      'carga_no_seteado' => NULL,
      'carga_no_seteado_ocultar' => NULL,
      'edit_tamano' => 50,
      'edit_maximo' => 50,
      'edit_mascara' => NULL,
      'edit_unidad' => NULL,
      'edit_rango' => NULL,
      'edit_filas' => NULL,
      'edit_columnas' => NULL,
      'edit_wrap' => NULL,
      'edit_resaltar' => NULL,
      'edit_ajustable' => NULL,
      'edit_confirmar_clave' => NULL,
      'edit_expreg' => NULL,
      'popup_item' => NULL,
      'popup_proyecto' => NULL,
      'popup_editable' => NULL,
      'popup_ventana' => NULL,
      'popup_carga_desc_metodo' => NULL,
      'popup_carga_desc_clase' => NULL,
      'popup_carga_desc_include' => NULL,
      'popup_puede_borrar_estado' => NULL,
      'fieldset_fin' => NULL,
      'check_valor_si' => NULL,
      'check_valor_no' => NULL,
      'check_desc_si' => NULL,
      'check_desc_no' => NULL,
      'check_ml_toggle' => NULL,
      'fijo_sin_estado' => NULL,
      'editor_ancho' => NULL,
      'editor_alto' => NULL,
      'editor_botonera' => NULL,
      'selec_cant_minima' => NULL,
      'selec_cant_maxima' => NULL,
      'selec_utilidades' => NULL,
      'selec_tamano' => NULL,
      'selec_ancho' => NULL,
      'selec_serializar' => NULL,
      'selec_cant_columnas' => NULL,
      'upload_extensiones' => NULL,
      'punto_montaje' => NULL,
      'placeholder' => NULL,
      'carga_consulta_php_clase' => NULL,
      'carga_consulta_php_archivo' => NULL,
    ),
    2 => 
    array (
      'objeto_ei_formulario_fila' => 33000260,
      'objeto_ei_formulario' => 33000208,
      'objeto_ei_formulario_proyecto' => 'toba_usuarios',
      'identificador' => 'password',
      'elemento_formulario' => 'ef_editable_clave',
      'columnas' => 'password',
      'obligatorio' => 1,
      'oculto_relaja_obligatorio' => 1,
      'orden' => '3',
      'etiqueta' => 'Pasword',
      'etiqueta_estilo' => NULL,
      'descripcion' => NULL,
      'colapsado' => 0,
      'desactivado' => 0,
      'estilo' => NULL,
      'total' => NULL,
      'inicializacion' => NULL,
      'permitir_html' => 0,
      'deshabilitar_rest_func' => 0,
      'estado_defecto' => NULL,
      'solo_lectura' => 0,
      'solo_lectura_modificacion' => 0,
      'carga_metodo' => NULL,
      'carga_clase' => NULL,
      'carga_include' => NULL,
      'carga_dt' => NULL,
      'carga_consulta_php' => NULL,
      'carga_sql' => NULL,
      'carga_fuente' => NULL,
      'carga_lista' => NULL,
      'carga_col_clave' => NULL,
      'carga_col_desc' => NULL,
      'carga_maestros' => NULL,
      'carga_cascada_relaj' => NULL,
      'cascada_mantiene_estado' => 0,
      'carga_permite_no_seteado' => 0,
      'carga_no_seteado' => NULL,
      'carga_no_seteado_ocultar' => NULL,
      'edit_tamano' => NULL,
      'edit_maximo' => NULL,
      'edit_mascara' => NULL,
      'edit_unidad' => NULL,
      'edit_rango' => NULL,
      'edit_filas' => NULL,
      'edit_columnas' => NULL,
      'edit_wrap' => NULL,
      'edit_resaltar' => NULL,
      'edit_ajustable' => NULL,
      'edit_confirmar_clave' => 1,
      'edit_expreg' => NULL,
      'popup_item' => NULL,
      'popup_proyecto' => NULL,
      'popup_editable' => NULL,
      'popup_ventana' => NULL,
      'popup_carga_desc_metodo' => NULL,
      'popup_carga_desc_clase' => NULL,
      'popup_carga_desc_include' => NULL,
      'popup_puede_borrar_estado' => NULL,
      'fieldset_fin' => NULL,
      'check_valor_si' => NULL,
      'check_valor_no' => NULL,
      'check_desc_si' => NULL,
      'check_desc_no' => NULL,
      'check_ml_toggle' => NULL,
      'fijo_sin_estado' => NULL,
      'editor_ancho' => NULL,
      'editor_alto' => NULL,
      'editor_botonera' => NULL,
      'selec_cant_minima' => NULL,
      'selec_cant_maxima' => NULL,
      'selec_utilidades' => NULL,
      'selec_tamano' => NULL,
      'selec_ancho' => NULL,
      'selec_serializar' => NULL,
      'selec_cant_columnas' => NULL,
      'upload_extensiones' => NULL,
      'punto_montaje' => NULL,
      'placeholder' => NULL,
      'carga_consulta_php_clase' => NULL,
      'carga_consulta_php_archivo' => NULL,
    ),
  ),
);
	}

}

?>