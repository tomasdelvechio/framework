------------------------------------------------------------
--[779]--  Correo - Elementos 
------------------------------------------------------------

------------------------------------------------------------
-- apex_objeto
------------------------------------------------------------

--- INICIO Grupo de desarrollo 0
INSERT INTO apex_objeto (proyecto, objeto, anterior, reflexivo, clase_proyecto, clase, subclase, subclase_archivo, objeto_categoria_proyecto, objeto_categoria, nombre, titulo, colapsable, descripcion, fuente_datos_proyecto, fuente_datos, solicitud_registrar, solicitud_obj_obs_tipo, solicitud_obj_observacion, parametro_a, parametro_b, parametro_c, parametro_d, parametro_e, parametro_f, usuario, creacion) VALUES (
	'toba_editor', --proyecto
	'779', --objeto
	NULL, --anterior
	NULL, --reflexivo
	'toba', --clase_proyecto
	'toba_ei_formulario', --clase
	NULL, --subclase
	NULL, --subclase_archivo
	NULL, --objeto_categoria_proyecto
	NULL, --objeto_categoria
	'Correo - Elementos', --nombre
	'Mail', --titulo
	NULL, --colapsable
	NULL, --descripcion
	'toba_editor', --fuente_datos_proyecto
	'instancia', --fuente_datos
	NULL, --solicitud_registrar
	NULL, --solicitud_obj_obs_tipo
	NULL, --solicitud_obj_observacion
	NULL, --parametro_a
	NULL, --parametro_b
	NULL, --parametro_c
	NULL, --parametro_d
	NULL, --parametro_e
	NULL, --parametro_f
	NULL, --usuario
	'2004-12-16 15:58:35'  --creacion
);
--- FIN Grupo de desarrollo 0

------------------------------------------------------------
-- apex_objeto_eventos
------------------------------------------------------------

--- INICIO Grupo de desarrollo 0
INSERT INTO apex_objeto_eventos (proyecto, evento_id, objeto, identificador, etiqueta, maneja_datos, sobre_fila, confirmacion, estilo, imagen_recurso_origen, imagen, en_botonera, ayuda, orden, ci_predep, implicito, defecto, display_datos_cargados, grupo, accion, accion_imphtml_debug, accion_vinculo_carpeta, accion_vinculo_item, accion_vinculo_objeto, accion_vinculo_popup, accion_vinculo_popup_param, accion_vinculo_target, accion_vinculo_celda) VALUES (
	'toba_editor', --proyecto
	'26', --evento_id
	'779', --objeto
	'modificacion', --identificador
	'Modificacion', --etiqueta
	'1', --maneja_datos
	NULL, --sobre_fila
	NULL, --confirmacion
	NULL, --estilo
	NULL, --imagen_recurso_origen
	NULL, --imagen
	'0', --en_botonera
	NULL, --ayuda
	NULL, --orden
	NULL, --ci_predep
	'1', --implicito
	NULL, --defecto
	NULL, --display_datos_cargados
	NULL, --grupo
	NULL, --accion
	NULL, --accion_imphtml_debug
	NULL, --accion_vinculo_carpeta
	NULL, --accion_vinculo_item
	NULL, --accion_vinculo_objeto
	NULL, --accion_vinculo_popup
	NULL, --accion_vinculo_popup_param
	NULL, --accion_vinculo_target
	NULL  --accion_vinculo_celda
);
--- FIN Grupo de desarrollo 0

------------------------------------------------------------
-- apex_objeto_ut_formulario
------------------------------------------------------------
INSERT INTO apex_objeto_ut_formulario (objeto_ut_formulario_proyecto, objeto_ut_formulario, tabla, titulo, ev_agregar, ev_agregar_etiq, ev_mod_modificar, ev_mod_modificar_etiq, ev_mod_eliminar, ev_mod_eliminar_etiq, ev_mod_limpiar, ev_mod_limpiar_etiq, ev_mod_clave, clase_proyecto, clase, auto_reset, ancho, ancho_etiqueta, expandir_descripcion, campo_bl, scroll, filas, filas_agregar, filas_agregar_online, filas_undo, filas_ordenar, columna_orden, filas_numerar, ev_seleccion, alto, analisis_cambios) VALUES (
	'toba_editor', --objeto_ut_formulario_proyecto
	'779', --objeto_ut_formulario
	NULL, --tabla
	NULL, --titulo
	NULL, --ev_agregar
	NULL, --ev_agregar_etiq
	NULL, --ev_mod_modificar
	NULL, --ev_mod_modificar_etiq
	NULL, --ev_mod_eliminar
	NULL, --ev_mod_eliminar_etiq
	NULL, --ev_mod_limpiar
	NULL, --ev_mod_limpiar_etiq
	NULL, --ev_mod_clave
	NULL, --clase_proyecto
	NULL, --clase
	NULL, --auto_reset
	NULL, --ancho
	NULL, --ancho_etiqueta
	NULL, --expandir_descripcion
	NULL, --campo_bl
	NULL, --scroll
	NULL, --filas
	NULL, --filas_agregar
	'1', --filas_agregar_online
	NULL, --filas_undo
	NULL, --filas_ordenar
	NULL, --columna_orden
	NULL, --filas_numerar
	NULL, --ev_seleccion
	NULL, --alto
	NULL  --analisis_cambios
);

------------------------------------------------------------
-- apex_objeto_ei_formulario_ef
------------------------------------------------------------

--- INICIO Grupo de desarrollo 0
INSERT INTO apex_objeto_ei_formulario_ef (objeto_ei_formulario_proyecto, objeto_ei_formulario, objeto_ei_formulario_fila, identificador, elemento_formulario, columnas, obligatorio, oculto_relaja_obligatorio, orden, etiqueta, etiqueta_estilo, descripcion, colapsado, desactivado, estilo, total, inicializacion, estado_defecto, solo_lectura, carga_metodo, carga_clase, carga_include, carga_col_clave, carga_col_desc, carga_sql, carga_fuente, carga_lista, carga_maestros, carga_cascada_relaj, carga_no_seteado, edit_tamano, edit_maximo, edit_mascara, edit_unidad, edit_rango, edit_filas, edit_columnas, edit_wrap, edit_resaltar, edit_ajustable, edit_confirmar_clave, popup_item, popup_proyecto, popup_editable, popup_ventana, popup_carga_desc_metodo, popup_carga_desc_clase, popup_carga_desc_include, fieldset_fin, check_valor_si, check_valor_no, check_desc_si, check_desc_no, fijo_sin_estado, editor_ancho, editor_alto, editor_botonera, selec_cant_minima, selec_cant_maxima, selec_utilidades, selec_tamano, selec_ancho, selec_serializar, selec_cant_columnas, upload_extensiones) VALUES (
	'toba_editor', --objeto_ei_formulario_proyecto
	'779', --objeto_ei_formulario
	'1162', --objeto_ei_formulario_fila
	'asunto', --identificador
	'ef_editable', --elemento_formulario
	'asunto', --columnas
	NULL, --obligatorio
	NULL, --oculto_relaja_obligatorio
	'0', --orden
	'Asunto', --etiqueta
	NULL, --etiqueta_estilo
	NULL, --descripcion
	NULL, --colapsado
	NULL, --desactivado
	NULL, --estilo
	NULL, --total
	NULL, --inicializacion
	NULL, --estado_defecto
	NULL, --solo_lectura
	NULL, --carga_metodo
	NULL, --carga_clase
	NULL, --carga_include
	NULL, --carga_col_clave
	NULL, --carga_col_desc
	NULL, --carga_sql
	NULL, --carga_fuente
	NULL, --carga_lista
	NULL, --carga_maestros
	NULL, --carga_cascada_relaj
	NULL, --carga_no_seteado
	'60', --edit_tamano
	NULL, --edit_maximo
	NULL, --edit_mascara
	NULL, --edit_unidad
	NULL, --edit_rango
	NULL, --edit_filas
	NULL, --edit_columnas
	NULL, --edit_wrap
	NULL, --edit_resaltar
	NULL, --edit_ajustable
	NULL, --edit_confirmar_clave
	NULL, --popup_item
	NULL, --popup_proyecto
	NULL, --popup_editable
	NULL, --popup_ventana
	NULL, --popup_carga_desc_metodo
	NULL, --popup_carga_desc_clase
	NULL, --popup_carga_desc_include
	NULL, --fieldset_fin
	NULL, --check_valor_si
	NULL, --check_valor_no
	NULL, --check_desc_si
	NULL, --check_desc_no
	NULL, --fijo_sin_estado
	NULL, --editor_ancho
	NULL, --editor_alto
	NULL, --editor_botonera
	NULL, --selec_cant_minima
	NULL, --selec_cant_maxima
	NULL, --selec_utilidades
	NULL, --selec_tamano
	NULL, --selec_ancho
	NULL, --selec_serializar
	NULL, --selec_cant_columnas
	NULL  --upload_extensiones
);
INSERT INTO apex_objeto_ei_formulario_ef (objeto_ei_formulario_proyecto, objeto_ei_formulario, objeto_ei_formulario_fila, identificador, elemento_formulario, columnas, obligatorio, oculto_relaja_obligatorio, orden, etiqueta, etiqueta_estilo, descripcion, colapsado, desactivado, estilo, total, inicializacion, estado_defecto, solo_lectura, carga_metodo, carga_clase, carga_include, carga_col_clave, carga_col_desc, carga_sql, carga_fuente, carga_lista, carga_maestros, carga_cascada_relaj, carga_no_seteado, edit_tamano, edit_maximo, edit_mascara, edit_unidad, edit_rango, edit_filas, edit_columnas, edit_wrap, edit_resaltar, edit_ajustable, edit_confirmar_clave, popup_item, popup_proyecto, popup_editable, popup_ventana, popup_carga_desc_metodo, popup_carga_desc_clase, popup_carga_desc_include, fieldset_fin, check_valor_si, check_valor_no, check_desc_si, check_desc_no, fijo_sin_estado, editor_ancho, editor_alto, editor_botonera, selec_cant_minima, selec_cant_maxima, selec_utilidades, selec_tamano, selec_ancho, selec_serializar, selec_cant_columnas, upload_extensiones) VALUES (
	'toba_editor', --objeto_ei_formulario_proyecto
	'779', --objeto_ei_formulario
	'1163', --objeto_ei_formulario_fila
	'mensaje', --identificador
	'ef_editable_textarea', --elemento_formulario
	'mensaje', --columnas
	NULL, --obligatorio
	NULL, --oculto_relaja_obligatorio
	'1', --orden
	'Mensaje', --etiqueta
	NULL, --etiqueta_estilo
	NULL, --descripcion
	NULL, --colapsado
	NULL, --desactivado
	NULL, --estilo
	NULL, --total
	NULL, --inicializacion
	NULL, --estado_defecto
	NULL, --solo_lectura
	NULL, --carga_metodo
	NULL, --carga_clase
	NULL, --carga_include
	NULL, --carga_col_clave
	NULL, --carga_col_desc
	NULL, --carga_sql
	NULL, --carga_fuente
	NULL, --carga_lista
	NULL, --carga_maestros
	NULL, --carga_cascada_relaj
	NULL, --carga_no_seteado
	NULL, --edit_tamano
	NULL, --edit_maximo
	NULL, --edit_mascara
	NULL, --edit_unidad
	NULL, --edit_rango
	'8', --edit_filas
	'50', --edit_columnas
	NULL, --edit_wrap
	NULL, --edit_resaltar
	NULL, --edit_ajustable
	NULL, --edit_confirmar_clave
	NULL, --popup_item
	NULL, --popup_proyecto
	NULL, --popup_editable
	NULL, --popup_ventana
	NULL, --popup_carga_desc_metodo
	NULL, --popup_carga_desc_clase
	NULL, --popup_carga_desc_include
	NULL, --fieldset_fin
	NULL, --check_valor_si
	NULL, --check_valor_no
	NULL, --check_desc_si
	NULL, --check_desc_no
	NULL, --fijo_sin_estado
	NULL, --editor_ancho
	NULL, --editor_alto
	NULL, --editor_botonera
	NULL, --selec_cant_minima
	NULL, --selec_cant_maxima
	NULL, --selec_utilidades
	NULL, --selec_tamano
	NULL, --selec_ancho
	NULL, --selec_serializar
	NULL, --selec_cant_columnas
	NULL  --upload_extensiones
);
--- FIN Grupo de desarrollo 0
