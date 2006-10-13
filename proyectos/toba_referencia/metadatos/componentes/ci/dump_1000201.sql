------------------------------------------------------------
--[1000201]--  Personas - Listado 
------------------------------------------------------------
INSERT INTO apex_objeto (proyecto, objeto, anterior, reflexivo, clase_proyecto, clase, subclase, subclase_archivo, objeto_categoria_proyecto, objeto_categoria, nombre, titulo, colapsable, descripcion, fuente_datos_proyecto, fuente_datos, solicitud_registrar, solicitud_obj_obs_tipo, solicitud_obj_observacion, parametro_a, parametro_b, parametro_c, parametro_d, parametro_e, parametro_f, usuario, creacion) VALUES ('toba_referencia', '1000201', NULL, NULL, 'toba', 'objeto_ci', 'ci_personas', 'zona/ci_personas.php', NULL, NULL, 'Personas - Listado', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-10-12 18:08:01');
INSERT INTO apex_objeto_eventos (proyecto, evento_id, objeto, identificador, etiqueta, maneja_datos, sobre_fila, confirmacion, estilo, imagen_recurso_origen, imagen, en_botonera, ayuda, orden, ci_predep, implicito, defecto, display_datos_cargados, grupo, accion, accion_imphtml_debug, accion_vinculo_carpeta, accion_vinculo_item, accion_vinculo_objeto, accion_vinculo_popup, accion_vinculo_popup_param, accion_vinculo_target, accion_vinculo_celda) VALUES ('toba_referencia', '1000218', '1000201', 'descargar', 'Descargar Zona', '1', NULL, NULL, NULL, NULL, NULL, '1', NULL, '1', NULL, '0', '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL);
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES ('toba_referencia', '1000079', '1000201', '1000202', 'cuadro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO apex_objeto_mt_me (objeto_mt_me_proyecto, objeto_mt_me, ev_procesar_etiq, ev_cancelar_etiq, ancho, alto, posicion_botonera, tipo_navegacion, con_toc, incremental, debug_eventos, activacion_procesar, activacion_cancelar, ev_procesar, ev_cancelar, objetos, post_procesar, metodo_despachador, metodo_opciones) VALUES ('toba_referencia', '1000201', NULL, NULL, NULL, NULL, 'abajo', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO apex_objeto_ci_pantalla (objeto_ci_proyecto, objeto_ci, pantalla, identificador, orden, etiqueta, descripcion, tip, imagen_recurso_origen, imagen, objetos, eventos, subclase, subclase_archivo) VALUES ('toba_referencia', '1000201', '1000051', 'pant_inicial', '1', 'Pantalla Inicial', NULL, NULL, NULL, NULL, 'cuadro', 'descargar', NULL, NULL);
