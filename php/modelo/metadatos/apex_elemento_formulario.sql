INSERT INTO apex_elemento_formulario (elemento_formulario, padre, descripcion, parametros, proyecto, exclusivo_toba, obsoleto, es_seleccion, es_seleccion_multiple) VALUES ('ef', 'ef', 'Ancestro de todos los elementos de formulario', 'dependencias: Dependencias del EF, separadas por comas (,): opcional;
javascript: Javascript asociado al EF, la notacion es evento,codigo: opcional;', 'toba', NULL, '1', NULL, NULL);
INSERT INTO apex_elemento_formulario (elemento_formulario, padre, descripcion, parametros, proyecto, exclusivo_toba, obsoleto, es_seleccion, es_seleccion_multiple) VALUES ('ef_barra_divisora', 'ef', 'barra_divisora', NULL, 'toba', NULL, '0', NULL, NULL);
INSERT INTO apex_elemento_formulario (elemento_formulario, padre, descripcion, parametros, proyecto, exclusivo_toba, obsoleto, es_seleccion, es_seleccion_multiple) VALUES ('ef_checkbox', 'ef', 'checkbox', 'valor: Valor de la propiedad cuando esta seteada (DB): obligatorio;
valor_info: Valor de la propiedad seteada legible para el usuario: obligatorio;', 'toba', NULL, '0', NULL, NULL);
INSERT INTO apex_elemento_formulario (elemento_formulario, padre, descripcion, parametros, proyecto, exclusivo_toba, obsoleto, es_seleccion, es_seleccion_multiple) VALUES ('ef_combo', 'ef', 'combo', 'No posee: Nada: obligatorio;', 'toba', NULL, '0', '1', '0');
INSERT INTO apex_elemento_formulario (elemento_formulario, padre, descripcion, parametros, proyecto, exclusivo_toba, obsoleto, es_seleccion, es_seleccion_multiple) VALUES ('ef_cuit', 'ef', 'CUIT/CUIL', NULL, 'toba', '0', '0', NULL, NULL);
INSERT INTO apex_elemento_formulario (elemento_formulario, padre, descripcion, parametros, proyecto, exclusivo_toba, obsoleto, es_seleccion, es_seleccion_multiple) VALUES ('ef_editable', 'ef', 'editable', 'tamano: Cantidad de caracteres que posee la interface: obligatorio;
maximo: Maxima cantidad de caracteres soportada (Si no se especifica es igual al tama�o): opcional;
estado: Cargar el elemento con un estado: opcional;
sql: SQL que devuelve el valor a cargar: opcional;
solo_lectura: Hacer el campo solo lectura (setarlo a 1): opcional;', 'toba', NULL, '0', NULL, NULL);
INSERT INTO apex_elemento_formulario (elemento_formulario, padre, descripcion, parametros, proyecto, exclusivo_toba, obsoleto, es_seleccion, es_seleccion_multiple) VALUES ('ef_editable_captcha', 'ef_editable', 'editable_captcha', NULL, 'toba', NULL, '0', NULL, NULL);
INSERT INTO apex_elemento_formulario (elemento_formulario, padre, descripcion, parametros, proyecto, exclusivo_toba, obsoleto, es_seleccion, es_seleccion_multiple) VALUES ('ef_editable_clave', 'ef_editable', 'clave', NULL, 'toba', NULL, '0', NULL, NULL);
INSERT INTO apex_elemento_formulario (elemento_formulario, padre, descripcion, parametros, proyecto, exclusivo_toba, obsoleto, es_seleccion, es_seleccion_multiple) VALUES ('ef_editable_fecha', 'ef_editable', 'fecha', NULL, 'toba', NULL, '0', NULL, NULL);
INSERT INTO apex_elemento_formulario (elemento_formulario, padre, descripcion, parametros, proyecto, exclusivo_toba, obsoleto, es_seleccion, es_seleccion_multiple) VALUES ('ef_editable_moneda', 'ef_editable_numero', 'moneda', 'mascara: Formateo del valor (por defecto $ ###.###,00): opcional;
rango: Intervalo de n�meros permitidos. Los corchetes incluyen el l�mite, los par�ntesis no, por defecto [0..*]: opcional;', 'toba', NULL, '0', NULL, NULL);
INSERT INTO apex_elemento_formulario (elemento_formulario, padre, descripcion, parametros, proyecto, exclusivo_toba, obsoleto, es_seleccion, es_seleccion_multiple) VALUES ('ef_editable_numero', 'ef_editable', 'numero', 'cifras: Cantidad de cifras del numero:opcional;
mascara: Formateo del valor (por defecto ###.###,##): opcional;
rango: Intervalo de n�meros permitidos los corchetes incluyen el l�mite, los par�ntesis no, formato: [-5..*], mensaje de error: opcional;', 'toba', NULL, '0', NULL, NULL);
INSERT INTO apex_elemento_formulario (elemento_formulario, padre, descripcion, parametros, proyecto, exclusivo_toba, obsoleto, es_seleccion, es_seleccion_multiple) VALUES ('ef_editable_numero_porcentaje', 'ef_editable_numero', 'numero_porcentaje', 'rango: Intervalo de n�meros permitidos. Los corchetes incluyen el l�mite, los par�ntesis no, por defecto [0..100]: opcional;', 'toba', NULL, '0', NULL, NULL);
INSERT INTO apex_elemento_formulario (elemento_formulario, padre, descripcion, parametros, proyecto, exclusivo_toba, obsoleto, es_seleccion, es_seleccion_multiple) VALUES ('ef_editable_textarea', 'ef_editable', 'textarea', NULL, 'toba', NULL, '0', NULL, NULL);
INSERT INTO apex_elemento_formulario (elemento_formulario, padre, descripcion, parametros, proyecto, exclusivo_toba, obsoleto, es_seleccion, es_seleccion_multiple) VALUES ('ef_fieldset', 'ef', 'fieldset', NULL, 'toba', NULL, '0', NULL, NULL);
INSERT INTO apex_elemento_formulario (elemento_formulario, padre, descripcion, parametros, proyecto, exclusivo_toba, obsoleto, es_seleccion, es_seleccion_multiple) VALUES ('ef_fijo', 'ef', 'fijo', NULL, 'toba', NULL, '0', NULL, NULL);
INSERT INTO apex_elemento_formulario (elemento_formulario, padre, descripcion, parametros, proyecto, exclusivo_toba, obsoleto, es_seleccion, es_seleccion_multiple) VALUES ('ef_html', 'ef', 'html', 'ancho: Ancho del Editor (pixels o porcentaje): opcional;
alto: Ancho del Editor (pixels o porcentaje): opcional;
botones: Modelo de botones a utilizar (Toba, Basic, Defualt): opcional;', 'toba', NULL, '0', NULL, NULL);
INSERT INTO apex_elemento_formulario (elemento_formulario, padre, descripcion, parametros, proyecto, exclusivo_toba, obsoleto, es_seleccion, es_seleccion_multiple) VALUES ('ef_multi_seleccion', 'ef', 'Clase ABSTRACT. Permite seleccionar N elementos de una lista, no tiene salida gr�fica. EN BETA.', 'valores: Lista de valores fijos: opcional;
tamanio: Cantidad de elementos a mostrar inicialmente: opcional;
cant_maxima: Cantidad m�xima de elementos que puede seleccionar el cliente: opcional;
cant_minima: Cantidad m�nima de elementos que debe seleccionar el cliente: opcional;', 'toba', NULL, '1', NULL, NULL);
INSERT INTO apex_elemento_formulario (elemento_formulario, padre, descripcion, parametros, proyecto, exclusivo_toba, obsoleto, es_seleccion, es_seleccion_multiple) VALUES ('ef_multi_seleccion_check', 'ef_multi_seleccion', 'multi_check', NULL, 'toba', NULL, '0', '1', '1');
INSERT INTO apex_elemento_formulario (elemento_formulario, padre, descripcion, parametros, proyecto, exclusivo_toba, obsoleto, es_seleccion, es_seleccion_multiple) VALUES ('ef_multi_seleccion_doble', 'ef_multi_seleccion', 'multi_doble', NULL, 'toba', NULL, '0', '1', '1');
INSERT INTO apex_elemento_formulario (elemento_formulario, padre, descripcion, parametros, proyecto, exclusivo_toba, obsoleto, es_seleccion, es_seleccion_multiple) VALUES ('ef_multi_seleccion_lista', 'ef_multi_seleccion', 'multi_lista', 'mostrar_utilidades: Muestra una peque�a barra de herramientas para facilitar el uso: opcional;
(Ver los de ef_multi_seleccion tambi�n)', 'toba', NULL, '0', '1', '1');
INSERT INTO apex_elemento_formulario (elemento_formulario, padre, descripcion, parametros, proyecto, exclusivo_toba, obsoleto, es_seleccion, es_seleccion_multiple) VALUES ('ef_oculto', 'ef', 'oculto', 'estado: Estado en el que se va a setear el elemento oculto:opcional;', 'toba', NULL, '0', NULL, NULL);
INSERT INTO apex_elemento_formulario (elemento_formulario, padre, descripcion, parametros, proyecto, exclusivo_toba, obsoleto, es_seleccion, es_seleccion_multiple) VALUES ('ef_popup', 'ef', 'popup', 'tamano: Tama�o del ef;
sql: SQL que carga los valores del ef;
columna_clave: Columna clave de la tabla;
item_destino: Item que se invoca;
ventana: ancho, alto, scroll (yes | no);', 'toba', NULL, '0', '1', '0');
INSERT INTO apex_elemento_formulario (elemento_formulario, padre, descripcion, parametros, proyecto, exclusivo_toba, obsoleto, es_seleccion, es_seleccion_multiple) VALUES ('ef_radio', 'ef', 'radio', NULL, 'toba', NULL, '0', '1', '0');
INSERT INTO apex_elemento_formulario (elemento_formulario, padre, descripcion, parametros, proyecto, exclusivo_toba, obsoleto, es_seleccion, es_seleccion_multiple) VALUES ('ef_upload', 'ef', 'upload', NULL, 'toba', NULL, '0', NULL, NULL);
