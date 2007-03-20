--**************************************************************************************************
--**************************************************************************************************
--*******************************************	General	*******************************************
--**************************************************************************************************
--**************************************************************************************************

CREATE TABLE			apex_estilo
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: nucleo
--: dump_order_by: estilo
--: zona: general
--: desc: Estilos	CSS
--: version: 1.0
---------------------------------------------------------------------------------------------------
(
	estilo					varchar(15)		NOT NULL,
	descripcion				varchar(255)	NOT NULL,
	estilo_paleta_p			varchar(15)		NULL,
	estilo_paleta_s			varchar(15)		NULL,
	estilo_paleta_n			varchar(15)		NULL,
	estilo_paleta_e			varchar(15)		NULL,
	CONSTRAINT	"apex_estilo_pk" PRIMARY KEY ("estilo")
);

--#################################################################################################

CREATE TABLE	apex_menu
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: nucleo
--: dump_order_by: menu
--: zona: general
--: desc: Tipos de menues
--: version: 1.0
---------------------------------------------------------------------------------------------------
(
	menu						varchar(15)		NOT NULL,
	descripcion					varchar(255)	NOT NULL,
	archivo						varchar(255)	NOT NULL,
	soporta_frames				smallint		NULL,
	CONSTRAINT	"apex_menu_pk" PRIMARY	KEY ("menu")
);
--#################################################################################################


CREATE TABLE			apex_proyecto
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: nucleo_multiproyecto
--: dump_order_by: proyecto
--: zona: general
--: desc: Tabla maestra	de	proyectos
--: version: 1.0
---------------------------------------------------------------------------------------------------
(
	proyecto							varchar(15)		NOT NULL,
	descripcion							varchar(255)	NOT NULL,
	descripcion_corta					varchar(40)		NOT NULL, 
	estilo								varchar(15)		NOT NULL,
	con_frames							smallint		DEFAULT 1 NULL,
	frames_clase						varchar(40)		NULL,
	frames_archivo						varchar(255)	NULL,
	salida_impr_html_c					varchar(40)		NULL,
	salida_impr_html_a					varchar(255)	NULL,
	menu								varchar(15)		NULL,
	path_includes						varchar(255)	NULL,
	path_browser						varchar(255)	NULL,
	administrador						varchar(60)		NULL,
	listar_multiproyecto				smallint		NULL,
	orden								float			NULL,
	palabra_vinculo_std					varchar(30)		NULL,
	version_toba						varchar(15)		NULL,
	requiere_validacion					smallint		NULL,
	usuario_anonimo						varchar(15)		NULL,
	usuario_anonimo_desc				varchar(60)		NULL,
	usuario_anonimo_grupos_acc			varchar(255)	NULL,
	validacion_intentos					smallint		NULL,
	validacion_intentos_min				smallint		NULL,
	validacion_debug					smallint		NULL,
	sesion_tiempo_no_interac_min		smallint		NULL,
	sesion_tiempo_maximo_min			smallint		NULL,
	sesion_subclase						varchar(40)		NULL,
	sesion_subclase_archivo				varchar(255)	NULL,
	contexto_ejecucion_subclase			varchar(40)		NULL,
	contexto_ejecucion_subclase_archivo	varchar(255)	NULL,
	usuario_subclase					varchar(40)		NULL,
	usuario_subclase_archivo			varchar(255)	NULL,
	encriptar_qs						smallint		NULL,
	registrar_solicitud					varchar(1)		NULL,
	registrar_cronometro				varchar(1)		NULL,
	item_inicio_sesion      			varchar(60)		NULL,--NOT
	item_pre_sesion		          		varchar(60)		NULL,--NOT
	item_set_sesion						varchar(60)		NULL,
	log_archivo							smallint		NULL,
	log_archivo_nivel					smallint		NULL,
	fuente_datos						varchar(20)		NULL,--NOT
	version								varchar(20)		NULL,
	version_fecha						date			NULL,
	version_detalle						varchar(255)	NULL,
	version_link						varchar(60)		NULL,
	CONSTRAINT	"apex_proyecto_pk" PRIMARY	KEY ("proyecto"),
	--CONSTRAINT	"apex_proyecto_item_is" FOREIGN	KEY ("proyecto","tem_inicio_sesion") REFERENCES	"apex_item"	("proyecto","item") ON DELETE CASCADE ON UPDATE NO ACTION	DEFERRABLE	INITIALLY IMMEDIATE,
	--CONSTRAINT	"apex_proyecto_item_ps" FOREIGN	KEY ("proyecto","item_pre_sesion")	REFERENCES "apex_item" ("proyecto","item") ON DELETE CASCADE ON	UPDATE NO ACTION DEFERRABLE INITIALLY	IMMEDIATE,
	--CONSTRAINT	"apex_proyecto_fk_fuente" FOREIGN KEY ("proyecto", "fuente_datos") REFERENCES	"apex_fuente_datos" ("proyecto","fuente_datos") ON DELETE NO ACTION	ON	UPDATE NO ACTION DEFERRABLE INITIALLY	IMMEDIATE,
	CONSTRAINT	"apex_proyecto_fk_estilo" FOREIGN KEY ("estilo") REFERENCES	"apex_estilo" ("estilo") ON DELETE NO ACTION	ON	UPDATE NO ACTION DEFERRABLE INITIALLY	IMMEDIATE,
	CONSTRAINT	"apex_proyecto_fk_menu" FOREIGN KEY ("menu") REFERENCES	"apex_menu" ("menu") ON DELETE NO ACTION	ON	UPDATE NO ACTION DEFERRABLE INITIALLY	IMMEDIATE	
);
--#################################################################################################

CREATE TABLE apex_log_sistema_tipo 
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: nucleo
--: dump_order_by: log_sistema_tipo
--: zona: solicitud
--: desc:
--: version: 1.0
---------------------------------------------------------------------------------------------------
(
	log_sistema_tipo			varchar(20)		NOT NULL,
	descripcion					varchar(255)	NOT NULL,
	CONSTRAINT	"apex_log_sistema_tipo_pk" PRIMARY KEY ("log_sistema_tipo")
);

--#################################################################################################

CREATE TABLE apex_fuente_datos_motor
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: nucleo
--: dump_order_by: fuente_datos_motor
--: zona: general
--: desc: DBMS	soportados
--: version: 1.0
---------------------------------------------------------------------------------------------------
(	
	fuente_datos_motor			varchar(30)		NOT NULL,
	nombre						varchar(255)	NOT NULL,
	version						varchar(30)		NOT NULL,
	CONSTRAINT	"apex_fuente_datos_motor_pk" PRIMARY KEY ("fuente_datos_motor") 
);
--#################################################################################################

CREATE TABLE apex_fuente_datos
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: nucleo_multiproyecto
--: dump_order_by: fuente_datos
--: zona: general
--: desc: Bases de datos a	las que se puede acceder
--: version: 1.0
---------------------------------------------------------------------------------------------------
(	
	proyecto					varchar(15)		NOT NULL,
	fuente_datos				varchar(20)		NOT NULL,
	descripcion					varchar(255)	NOT NULL,
	descripcion_corta			varchar(40)		NULL,	--	NOT NULL,
	fuente_datos_motor			varchar(30)		NULL,
	host						varchar(60)		NULL,
	usuario						varchar(30)		NULL,
	clave						varchar(30)		NULL,
	base						varchar(30)		NULL,	--	NOT? ODBC e	instancia no la utilizan...
	administrador				varchar(60)		NULL,
	link_instancia				smallint		NULL,	--	En	vez de abrir una conexion,	utilizar	la	conexion	a la intancia
	instancia_id				varchar(30)	NULL,
	subclase_archivo			varchar(255) 	NULL,
	subclase_nombre				varchar(60) 	NULL,
	orden						smallint		NULL,
	CONSTRAINT	"apex_fuente_datos_pk" PRIMARY KEY ("proyecto","fuente_datos"),
	CONSTRAINT	"apex_fuente_datos_fk_motor" FOREIGN KEY ("fuente_datos_motor") REFERENCES	"apex_fuente_datos_motor" ("fuente_datos_motor") ON DELETE NO ACTION	ON	UPDATE NO ACTION DEFERRABLE INITIALLY	IMMEDIATE,
	CONSTRAINT	"apex_fuente_datos_fk_proyecto" FOREIGN KEY ("proyecto")	REFERENCES "apex_proyecto"	("proyecto") ON DELETE NO ACTION	ON	UPDATE NO ACTION DEFERRABLE INITIALLY	IMMEDIATE
);
--#################################################################################################

CREATE TABLE apex_grafico
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: nucleo
--: dump_order_by: grafico
--: zona: general
--: desc: Tipo	de	grafico
--: version: 1.0
---------------------------------------------------------------------------------------------------
(	
	grafico						varchar(30)			NOT NULL,
	descripcion_corta			varchar(40)			NULL,	--NOT
	descripcion					varchar(255)		NOT NULL,
	parametros					varchar				NULL,
	CONSTRAINT	"apex_tipo_grafico_pk" PRIMARY KEY ("grafico") 
);
--#################################################################################################--

CREATE TABLE apex_recurso_origen
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: nucleo
--: dump_order_by: recurso_origen 
--: zona: general
--: desc: Origen del	recurso:	apex o proyecto
--: version: 1.0
---------------------------------------------------------------------------------------------------
(	
	recurso_origen				varchar(10)			NOT NULL,
	descripcion					varchar(255)		NOT NULL,
	CONSTRAINT	"apex_rec_origen_pk"	PRIMARY KEY	("recurso_origen") 
);
--#################################################################################################--

CREATE TABLE apex_nivel_acceso
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: nucleo
--: dump_order_by: nivel_acceso
--: zona: general
--: desc: Categoria organizadora	de	niveles de seguridad	(redobla	la	cualificaciond	e elementos	para fortalecer chequeos)
--: version: 1.0
---------------------------------------------------------------------------------------------------
(	
	nivel_acceso					smallint			NOT NULL,
	nombre							varchar(80)		NOT NULL,
	descripcion						varchar			NULL,
	CONSTRAINT	"apex_nivel_acceso_pk" PRIMARY KEY ("nivel_acceso")
);
--#################################################################################################

CREATE TABLE apex_solicitud_tipo
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: nucleo
--: dump_order_by: solicitud_tipo
--: zona: general
--: desc:
--: version: 1.0
---------------------------------------------------------------------------------------------------
(
	solicitud_tipo					varchar(20)		NOT NULL,
	descripcion						varchar(255)	NOT NULL,
	descripcion_corta				varchar(40)		NULL,	--	NOT NULL,
	icono								varchar(30)		NULL,
	CONSTRAINT	"apex_sol_tipo_pk" PRIMARY	KEY ("solicitud_tipo")
);
--#################################################################################################

CREATE TABLE apex_elemento_formulario
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: nucleo_multiproyecto
--: dump_order_by: elemento_formulario
--: zona: general
--: desc: Elementos de formulario soportados
--: version: 1.0
---------------------------------------------------------------------------------------------------
(	
	elemento_formulario				varchar(30)		NOT NULL,
	padre							varchar(30)		NULL,
	descripcion						text			NOT NULL,
	parametros						varchar			NULL,	--	Lista de los parametros	que recibe este EF
	proyecto						varchar(15)		NOT NULL,
	exclusivo_toba					smallint		NULL,
	obsoleto						smallint		NULL,
	CONSTRAINT	"apex_elform_pk" PRIMARY KEY ("elemento_formulario"),
	CONSTRAINT	"apex_elform_fk_padre" FOREIGN KEY ("padre") REFERENCES "apex_elemento_formulario"	("elemento_formulario") ON DELETE NO ACTION	ON	UPDATE NO ACTION DEFERRABLE INITIALLY	IMMEDIATE,
	CONSTRAINT	"apex_elform_fk_proyecto" FOREIGN KEY ("proyecto")	REFERENCES "apex_proyecto"	("proyecto") ON DELETE NO ACTION	ON	UPDATE NO ACTION DEFERRABLE INITIALLY	IMMEDIATE
);
--#################################################################################################

CREATE TABLE apex_solicitud_obs_tipo
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: nucleo_multiproyecto
--: dump_order_by: solicitud_obs_tipo
--: zona: general
--: desc:
--: version: 1.0
---------------------------------------------------------------------------------------------------
(	
	proyecto						varchar(15)		NOT NULL,
	solicitud_obs_tipo				varchar(20)		NOT NULL,
	descripcion						varchar(255)	NOT NULL,
	criterio						varchar(20)		NOT NULL,
	CONSTRAINT	"apex_sol_obs_tipo_pk" PRIMARY KEY ("proyecto","solicitud_obs_tipo"),
	CONSTRAINT	"apex_sol_obs_tipo_fk_proyecto" FOREIGN KEY ("proyecto")	REFERENCES "apex_proyecto"	("proyecto") ON DELETE NO ACTION	ON	UPDATE NO ACTION DEFERRABLE INITIALLY	IMMEDIATE
);
--#################################################################################################

CREATE TABLE apex_pagina_tipo
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: nucleo_multiproyecto
--: dump_order_by: pagina_tipo
--: zona: general
--: desc:
--: version: 1.0
---------------------------------------------------------------------------------------------------
(	
	proyecto							varchar(15)		NOT NULL,
	pagina_tipo							varchar(20)		NOT NULL,
	descripcion							varchar(255)	NOT NULL,
	clase_nombre						varchar(40)		NULL,
	clase_archivo						varchar(255)	NULL,
	include_arriba						varchar(100)	NULL,
	include_abajo						varchar(100)	NULL,
	exclusivo_toba						smallint			NULL,
	contexto								varchar(255)	NULL,	--	Establece variables de CONTEXTO?	Cuales?
	CONSTRAINT	"apex_pagina_tipo_pk" PRIMARY	KEY ("proyecto","pagina_tipo"),
	CONSTRAINT	"apex_pagina_tipo_fk_proy"	FOREIGN KEY	("proyecto") REFERENCES	"apex_proyecto" ("proyecto") ON DELETE	NO	ACTION ON UPDATE NO ACTION	DEFERRABLE	INITIALLY IMMEDIATE
);
--###################################################################################################

CREATE SEQUENCE apex_columna_estilo_seq INCREMENT 1 MINVALUE 0	MAXVALUE	9223372036854775807 CACHE 1;
CREATE TABLE apex_columna_estilo
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: nucleo
--: dump_order_by: columna_estilo
--: zona: general
--: desc:
--: historica:	0
--: version: 1.0
---------------------------------------------------------------------------------------------------
(
	columna_estilo						int4				DEFAULT nextval('"apex_columna_estilo_seq"'::text)	NOT NULL, 
	css									varchar(40)		NOT NULL,
	descripcion							varchar(255)	NULL,
	descripcion_corta					varchar(40)	  NULL,
	CONSTRAINT	"apex_columna_estilo_pk" PRIMARY	KEY ("columna_estilo") 
);
--###################################################################################################

CREATE SEQUENCE apex_columna_formato_seq INCREMENT	1 MINVALUE 0 MAXVALUE 9223372036854775807	CACHE	1;
CREATE TABLE apex_columna_formato
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: nucleo
--: dump_order_by: columna_formato
--: zona: general
--: desc:
--: historica:	0
--: version: 1.0
---------------------------------------------------------------------------------------------------
(
	columna_formato					int4				DEFAULT nextval('"apex_columna_formato_seq"'::text) NOT NULL, 
	funcion								varchar(40)		NOT NULL,
	archivo								varchar(80)		NULL,
	descripcion							varchar(255)	NULL,
	descripcion_corta					varchar(40)		NULL,
	parametros							varchar(255)	NULL,
	CONSTRAINT	"apex_columna_formato_pk" PRIMARY KEY ("columna_formato") 
);

--**************************************************************************************************
--**************************************************************************************************
--*********************************************	 Usuario	 ******************************************
--**************************************************************************************************
--**************************************************************************************************

CREATE TABLE apex_usuario_tipodoc
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: nucleo
--: dump_order_by: usuario_tipodoc
--: zona: usuario
--: desc:
--: version: 1.0
---------------------------------------------------------------------------------------------------
(	
	usuario_tipodoc				varchar(10)		NOT NULL,
	descripcion						varchar(40)		NOT NULL,
	CONSTRAINT	"apex_usuario_tipodoc_pk"	 PRIMARY	KEY ("usuario_tipodoc")
);
--#################################################################################################

CREATE TABLE apex_usuario
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: nucleo
--: dump_order_by: usuario
--: zona: usuario
--: desc:
--: instancia:	1
--: usuario:	1
--: version: 1.0
---------------------------------------------------------------------------------------------------
(	
	usuario							varchar(60)		NOT NULL,
	clave							varchar(128)	NOT NULL,
	nombre							varchar(255)	NULL,
	usuario_tipodoc					varchar(10)		NULL,
	pre								varchar(2)		NULL,
	ciu								varchar(18)		NULL,
	suf								varchar(1)		NULL,
	email							varchar(80)		NULL,
	telefono						varchar(18)		NULL,
	vencimiento						date				NULL,
	dias							smallint			NULL,
	hora_entrada					time(0) without time	zone NULL,
	hora_salida						time(0) without time	zone NULL,
	ip_permitida					varchar(20)		NULL,
	solicitud_registrar				smallint			NULL,
	solicitud_obs_tipo_proyecto		varchar(15)		NULL,
	solicitud_obs_tipo				varchar(20)		NULL,
	solicitud_observacion			varchar(255)	NULL,
	parametro_a						varchar(100)	NULL,
	parametro_b						varchar(100)	NULL,
	parametro_c						varchar(100)	NULL,
	autentificacion					varchar(10)		NULL DEFAULT('plano'),
	CONSTRAINT	"apex_usuario_pk"	 PRIMARY	KEY ("usuario"),
	CONSTRAINT	"apex_usuario_fk_sol_ot" FOREIGN	KEY ("solicitud_obs_tipo_proyecto","solicitud_obs_tipo")	REFERENCES "apex_solicitud_obs_tipo" ("proyecto","solicitud_obs_tipo") ON DELETE	NO	ACTION ON UPDATE NO ACTION	DEFERRABLE	INITIALLY IMMEDIATE,
	CONSTRAINT	"apex_usuario_fk_tipodoc" FOREIGN KEY ("usuario_tipodoc") REFERENCES	"apex_usuario_tipodoc" ("usuario_tipodoc") ON DELETE NO ACTION	ON	UPDATE NO ACTION DEFERRABLE INITIALLY	IMMEDIATE
);

--#################################################################################################

CREATE TABLE apex_usuario_perfil_datos
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: multiproyecto
--: dump_order_by: usuario_perfil_datos
--: zona: usuario
--: desc:
--: version: 1.0
---------------------------------------------------------------------------------------------------
(	
	proyecto							varchar(15)		NOT NULL,
	usuario_perfil_datos			varchar(20)		NOT NULL,
	nombre							varchar(80)		NOT NULL,
	descripcion						varchar			NULL,
	listar							smallint			NULL,
	CONSTRAINT	"apex_usuario_perfil_datos_pk" PRIMARY	KEY ("proyecto","usuario_perfil_datos"),
	CONSTRAINT	"apex_usuario_perfil_da_fk_proy"	FOREIGN KEY	("proyecto") REFERENCES	"apex_proyecto" ("proyecto") ON DELETE	NO	ACTION ON UPDATE NO ACTION	DEFERRABLE	INITIALLY IMMEDIATE
);
--#################################################################################################

CREATE TABLE apex_usuario_grupo_acc
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: permisos
--: dump_order_by: usuario_grupo_acc
--: zona: usuario
--: desc:
--: version: 1.0
---------------------------------------------------------------------------------------------------
(	
	proyecto							varchar(15)		NOT NULL,
	usuario_grupo_acc				varchar(20)		NOT NULL,
	nombre							varchar(80)		NOT NULL,
	nivel_acceso					smallint			NOT NULL,
	descripcion						varchar			NULL,
	vencimiento						date				NULL,
	dias								smallint			NULL,
	hora_entrada					time(0) without time	zone NULL,
	hora_salida						time(0) without time	zone NULL,
	listar							smallint			NULL,
	CONSTRAINT	"apex_usu_g_acc_pk" PRIMARY KEY ("proyecto","usuario_grupo_acc"),
	CONSTRAINT	"apex_usu_g_acc_fk_niv"	FOREIGN KEY	("nivel_acceso") REFERENCES "apex_nivel_acceso"	("nivel_acceso") ON DELETE	NO	ACTION ON UPDATE NO ACTION	DEFERRABLE	INITIALLY IMMEDIATE,
	CONSTRAINT	"apex_usu_g_acc_fk_proy" FOREIGN	KEY ("proyecto") REFERENCES "apex_proyecto" ("proyecto")	ON	DELETE NO ACTION ON UPDATE	NO	ACTION DEFERRABLE INITIALLY IMMEDIATE
);
--#################################################################################################

CREATE TABLE apex_usuario_proyecto
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: multiproyecto
--: dump_order_by: usuario
--: zona: usuario
--: instancia:	1
--: usuario:	1
--: desc:
--: version: 1.0
---------------------------------------------------------------------------------------------------
(	
	proyecto							varchar(15)		NOT NULL,
	usuario							varchar(60)			NOT NULL,
	usuario_grupo_acc				varchar(20)			NOT NULL,
	usuario_perfil_datos			varchar(20)			NULL,
	CONSTRAINT	"apex_usu_proy_pk"  PRIMARY KEY ("proyecto","usuario"),
	CONSTRAINT	"apex_usu_proy_fk_usuario"	FOREIGN KEY	("usuario")	REFERENCES "apex_usuario" ("usuario") ON DELETE	CASCADE ON UPDATE	CASCADE DEFERRABLE INITIALLY	IMMEDIATE,
	CONSTRAINT	"apex_usu_proy_fk_proyecto" FOREIGN	KEY ("proyecto") REFERENCES "apex_proyecto" ("proyecto")	ON	DELETE NO ACTION ON UPDATE	NO	ACTION DEFERRABLE INITIALLY IMMEDIATE,
	CONSTRAINT	"apex_usu_proy_fk_grupo_acc" FOREIGN KEY ("proyecto","usuario_grupo_acc") REFERENCES "apex_usuario_grupo_acc" ("proyecto","usuario_grupo_acc") ON DELETE	NO	ACTION ON UPDATE NO ACTION	DEFERRABLE	INITIALLY IMMEDIATE,
	CONSTRAINT	"apex_usu_proy_fk_perf_dat" FOREIGN	KEY ("proyecto","usuario_perfil_datos") REFERENCES	"apex_usuario_perfil_datos" ("proyecto","usuario_perfil_datos") ON DELETE NO ACTION	ON	UPDATE NO ACTION DEFERRABLE INITIALLY	IMMEDIATE
);

--**************************************************************************************************
--**************************************************************************************************
--******************	  ELEMENTOS	CENTRALES (item, clase y objeto)	 ***************************
--**************************************************************************************************
--**************************************************************************************************

CREATE TABLE apex_item_zona
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: multiproyecto
--: dump_order_by: zona
--: zona: usuario
--: desc:
--: version: 1.0
---------------------------------------------------------------------------------------------------
(	
	proyecto						varchar(15)		NOT NULL,
	zona							varchar(20)		NOT NULL,
	nombre							varchar(80)		NOT NULL,
	clave_editable					varchar(100)	NULL,		-- Clave	del EDITABLE manejado en la ZONA
	archivo							varchar(80)		NULL, 		-- Archivo	donde	reside la clase que representa la ZONA
	descripcion						varchar			NULL,		-- OBSOLETO
	consulta_archivo				varchar(255)	NULL,
	consulta_clase					varchar(60)		NULL,
	consulta_metodo					varchar(60)		NULL,
	CONSTRAINT	"apex_item_zona_pk" PRIMARY KEY ("proyecto","zona"),
	CONSTRAINT	"apex_item_zona_fk_proy" FOREIGN	KEY ("proyecto") REFERENCES "apex_proyecto" ("proyecto")	ON	DELETE NO ACTION ON UPDATE	NO	ACTION DEFERRABLE INITIALLY IMMEDIATE
);
--#################################################################################################

CREATE SEQUENCE apex_item_seq	INCREMENT 1	MINVALUE	1 MAXVALUE 9223372036854775807 CACHE 1;
CREATE TABLE apex_item
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: componente
--: dump_clave_proyecto: proyecto
--: dump_clave_componente: item
--: dump_order_by: item
--: zona: central
--: desc:
--: version: 1.0
---------------------------------------------------------------------------------------------------
(	
	item_id							int4			DEFAULT nextval('"apex_item_seq"'::text) NULL,
	proyecto						varchar(15)		NOT NULL,
	item							varchar(60)		DEFAULT nextval('"apex_item_seq"'::text) NOT NULL,
	padre_id						int4			NULL,	
	padre_proyecto					varchar(15)		NOT NULL,
	padre							varchar(60)		NOT NULL,
	carpeta							smallint		NULL,
	nivel_acceso					smallint		NULL,
	solicitud_tipo					varchar(20)		NULL,
	pagina_tipo_proyecto			varchar(15)		NULL,
	pagina_tipo						varchar(20)		NULL,
	actividad_buffer_proyecto		varchar(15)		NULL,
	actividad_buffer				int4			NULL,
	actividad_patron_proyecto		varchar(15)		NULL,
	actividad_patron				varchar(20)		NULL,
	nombre							varchar(80)		NOT NULL,
	descripcion						varchar			NULL,
	actividad_accion				varchar(80)		NULL,
	menu							smallint		NULL,
	orden							float			NULL,
	solicitud_registrar				smallint		NULL,
	solicitud_obs_tipo_proyecto		varchar(15)		NULL,
	solicitud_obs_tipo				varchar(20)		NULL,
	solicitud_observacion			varchar(90)		NULL,
	solicitud_registrar_cron		smallint		NULL,
	prueba_directorios				smallint		NULL,
	zona_proyecto					varchar(15)		NULL,
	zona							varchar(20)		NULL,
	zona_orden						float			NULL,
	zona_listar						smallint		NULL,
	imagen_recurso_origen			varchar(10)		NULL,
	imagen							varchar(60)		NULL,
	parametro_a						varchar(100)	NULL,
	parametro_b						varchar(100)	NULL,
	parametro_c						varchar(100)	NULL,
	publico							smallint		NULL,
	redirecciona					smallint		NULL,
	usuario							varchar(20)		NULL,
	creacion						timestamp(0)	without time zone	DEFAULT current_timestamp NULL,
	CONSTRAINT	"apex_item_pk"	PRIMARY KEY	("proyecto","item"),
	CONSTRAINT	"apex_item_uq_path" UNIQUE	("proyecto","item"),
	CONSTRAINT	"apex_item_fk_proyecto"	FOREIGN KEY	("proyecto") REFERENCES	"apex_proyecto" ("proyecto") ON DELETE	NO	ACTION ON UPDATE NO ACTION	DEFERRABLE	INITIALLY IMMEDIATE,
	CONSTRAINT	"apex_item_fk_padre"	FOREIGN KEY	("padre_proyecto","padre")	REFERENCES "apex_item" ("proyecto","item") ON DELETE NO ACTION	ON	UPDATE NO ACTION DEFERRABLE INITIALLY	IMMEDIATE,
	CONSTRAINT	"apex_item_fk_solic_tipo" FOREIGN KEY ("solicitud_tipo")	REFERENCES "apex_solicitud_tipo"	("solicitud_tipo") ON DELETE NO ACTION	ON	UPDATE NO ACTION DEFERRABLE INITIALLY	IMMEDIATE,
	CONSTRAINT	"apex_item_fk_solic_ot"	FOREIGN KEY	("solicitud_obs_tipo_proyecto","solicitud_obs_tipo") REFERENCES "apex_solicitud_obs_tipo"	("proyecto","solicitud_obs_tipo") ON DELETE NO ACTION	ON	UPDATE NO ACTION DEFERRABLE INITIALLY	IMMEDIATE,
	CONSTRAINT	"apex_item_fk_niv_acc" FOREIGN KEY ("nivel_acceso") REFERENCES	"apex_nivel_acceso" ("nivel_acceso") ON DELETE NO ACTION	ON	UPDATE NO ACTION DEFERRABLE INITIALLY	IMMEDIATE,
	CONSTRAINT	"apex_item_fk_pag_tipo"	FOREIGN KEY	("pagina_tipo_proyecto","pagina_tipo")	REFERENCES "apex_pagina_tipo"	("proyecto","pagina_tipo")	ON	DELETE NO ACTION ON UPDATE	NO	ACTION DEFERRABLE INITIALLY IMMEDIATE,
	CONSTRAINT	"apex_item_fk_zona" FOREIGN KEY ("zona_proyecto","zona")	REFERENCES "apex_item_zona" ("proyecto","zona")	ON	DELETE NO ACTION ON UPDATE	NO	ACTION DEFERRABLE INITIALLY IMMEDIATE,
--	  CONSTRAINT  "apex_item_fk_usuario" FOREIGN	KEY ("usuario") REFERENCES	"apex_usuario"	("usuario")	ON	DELETE NO ACTION ON UPDATE	NO	ACTION DEFERRABLE INITIALLY IMMEDIATE,
	CONSTRAINT	"apex_item_fk_rec_orig"	FOREIGN KEY	("imagen_recurso_origen") REFERENCES "apex_recurso_origen" ("recurso_origen")	ON	DELETE NO ACTION ON UPDATE	NO	ACTION DEFERRABLE INITIALLY IMMEDIATE
);

--#################################################################################################

CREATE TABLE apex_item_info
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: componente
--: dump_clave_proyecto: item_proyecto
--: dump_clave_componente: item
--: dump_order_by: item
--: dump_where: (	item_proyecto = '%%'	)
--: zona: central
--: desc:
--: version: 1.0
-----------------------------------------	----------------------------------------------------------
(	
	item_id							int4				NULL,	
	item_proyecto					varchar(15)		NOT NULL,
	item								varchar(60)		NOT NULL,
	descripcion_breve				varchar(255)	NULL,
	descripcion_larga				text				NULL,
	CONSTRAINT	"apex_item_info_pk"	 PRIMARY	KEY ("item_proyecto","item"),
	CONSTRAINT	"apex_item_info_fk_item" FOREIGN	KEY ("item_proyecto","item") REFERENCES "apex_item" ("proyecto","item")	ON	DELETE CASCADE ON UPDATE	NO	ACTION DEFERRABLE INITIALLY IMMEDIATE
);
--#################################################################################################

CREATE SEQUENCE apex_clase_tipo_seq	INCREMENT 1	MINVALUE	1 MAXVALUE 9223372036854775807 CACHE 1;
CREATE TABLE apex_clase_tipo
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: nucleo
--: dump_order_by: clase_tipo
--: zona: central
--: desc:
--: version: 1.0
---------------------------------------------------------------------------------------------------
(	
	clase_tipo						int4				DEFAULT nextval('"apex_clase_tipo_seq"'::text) NOT	NULL,	
	descripcion_corta				varchar(40)			NOT NULL,
	descripcion						varchar(255)		NULL,
	icono							varchar(30)			NULL,
	orden							float				NULL,
	metodologia						varchar(10)			NULL, --NOT
	CONSTRAINT	"apex_clase_tipo_pk"	 PRIMARY	KEY ("clase_tipo")
);
--#################################################################################################

CREATE TABLE apex_clase
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: nucleo_multiproyecto
--: dump_order_by: clase
--: zona: central
--: desc:
--: version: 1.0
---------------------------------------------------------------------------------------------------
(	
	proyecto						varchar(15)		NOT NULL,
	clase							varchar(60)		NOT NULL,
	clase_tipo						int4			NOT NULL, 
	archivo							varchar(80)		NOT NULL,
	descripcion						varchar(250)	NOT NULL,
	descripcion_corta				varchar(40)		NULL,	--	NOT NULL, 
	icono							varchar(60)		NOT NULL, --> Icono con	el	que los objetos de la clase aparecen representados	en	las listas
	screenshot						varchar(60)		NULL,	--> Path a una imagen de la clase
	ancestro_proyecto				varchar(15)		NULL,	--> Ancestro a	considerar para incluir	dependencias
	ancestro						varchar(60)		NULL,
	instanciador_id					int4			NULL,	
	instanciador_proyecto			varchar(15)		NULL,
	instanciador_item				varchar(60)		NULL,	--> Item	del catalogo a	invocar como instanciador de objetos de esta	clase
	editor_id						int4			NULL,	
	editor_proyecto					varchar(15)		NULL,
	editor_item						varchar(60)		NULL,	--> Item	del catalogo a	invocar como editor de objetos de esta	clase
	editor_ancestro_proyecto		varchar(15)		NULL,	--> Ancestro a	considerar para el EDITOR
	editor_ancestro					varchar(60)		NULL,
	plan_dump_objeto				varchar(255)	NULL, --> Lista ordenada de tablas	que poseen la definicion del objeto	(respetar FK!)
	sql_info						text			NULL, --> SQL	que DUMPEA el estado	del objeto
	doc_clase						varchar(255)	NULL,			--> GIF donde hay	un	Diagrama	de	clases.
	doc_db							varchar(255)	NULL,			--> GIF donde hay	un	DER de las tablas	que necesita la clase.
	doc_sql							varchar(255)	NULL,			--> path	al	archivo que	crea las	tablas.
	vinculos						smallint		NULL,			--> Indica si los	objetos generados	pueden tener vinculos
	autodoc							smallint		NULL,
	parametro_a						varchar(255)	NULL,
	parametro_b						varchar(255)	NULL,
	parametro_c						varchar(255)	NULL,
	exclusivo_toba					smallint		NULL,
	CONSTRAINT	"apex_clase_pk" PRIMARY	KEY ("proyecto","clase"),
	CONSTRAINT	"apex_clase_uq" UNIQUE 	("clase"),
	CONSTRAINT	"apex_clase_fk_proyecto" FOREIGN	KEY ("proyecto") REFERENCES "apex_proyecto" ("proyecto")	ON	DELETE NO ACTION ON UPDATE	NO	ACTION DEFERRABLE INITIALLY IMMEDIATE,
	CONSTRAINT	"apex_clase_fk_tipo"	FOREIGN KEY	("clase_tipo")	REFERENCES "apex_clase_tipo" ("clase_tipo") ON DELETE	NO	ACTION ON UPDATE NO ACTION	DEFERRABLE	INITIALLY IMMEDIATE
--	CONSTRAINT	"apex_clase_fk_editor_anc"	FOREIGN KEY	("editor_ancestro_proyecto","editor_ancestro") REFERENCES "apex_clase" ("proyecto","clase") ON DELETE	NO	ACTION ON UPDATE NO ACTION	DEFERRABLE	INITIALLY IMMEDIATE,
--	CONSTRAINT	"apex_clase_fk_ancestro" FOREIGN	KEY ("ancestro_proyecto","ancestro") REFERENCES	"apex_clase" ("proyecto","clase") ON DELETE NO ACTION	ON	UPDATE NO ACTION DEFERRABLE INITIALLY	IMMEDIATE,
--	CONSTRAINT	"apex_clase_fk_editor" FOREIGN KEY ("editor_proyecto","editor_item")	REFERENCES "apex_item" ("proyecto","item") ON DELETE NO ACTION	ON	UPDATE NO ACTION DEFERRABLE INITIALLY	IMMEDIATE,
--	CONSTRAINT	"apex_clase_fk_instan" FOREIGN KEY ("instanciador_proyecto","instanciador_item")	REFERENCES "apex_item" ("proyecto","item") ON DELETE NO ACTION	ON	UPDATE NO ACTION DEFERRABLE INITIALLY	IMMEDIATE
);
--#################################################################################################

CREATE SEQUENCE apex_objeto_seq INCREMENT	1 MINVALUE 0 MAXVALUE 9223372036854775807	CACHE	1;
CREATE TABLE apex_objeto
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: componente
--: dump_clave_proyecto: proyecto
--: dump_clave_componente: objeto
--: dump_order_by: objeto
--: zona: central
--: desc:
--: version: 1.0
---------------------------------------------------------------------------------------------------
(
	proyecto							varchar(15)		NOT NULL,
	objeto								int4			DEFAULT nextval('"apex_objeto_seq"'::text) NOT NULL, 
	anterior							varchar(20)		NULL,
	reflexivo							smallint		NULL,
	clase_proyecto						varchar(15)		NOT NULL,
	clase								varchar(60)		NOT NULL,
	subclase							varchar(80)		NULL,
	subclase_archivo					varchar(80)		NULL,
	objeto_categoria_proyecto			varchar(15)		NULL,
	objeto_categoria					varchar(30)		NULL,
	nombre								varchar(120)		NOT NULL,
	titulo								varchar(120)		NULL,
	colapsable							smallint		NULL,
	descripcion							varchar			NULL,
	fuente_datos_proyecto				varchar(15)		NULL,
	fuente_datos						varchar(20)		NULL,
	solicitud_registrar					smallint		NULL,	-- no mas
	solicitud_obj_obs_tipo				varchar(20)		NULL,	-- no mas
	solicitud_obj_observacion			varchar(255)	NULL,	-- no mas
	parametro_a							varchar(100)	NULL,
	parametro_b							varchar(100)	NULL,
	parametro_c							varchar(100)	NULL,
	parametro_d							varchar(100)	NULL,
	parametro_e							varchar(100)	NULL,
	parametro_f							varchar(100)	NULL,
	usuario								varchar(20)		NULL,
	creacion							timestamp(0)	without time zone	DEFAULT current_timestamp NULL,
	CONSTRAINT	"apex_objeto_pk"	 PRIMARY	KEY ("proyecto","objeto"),
	CONSTRAINT	"apex_objeto_fk_clase" FOREIGN KEY ("clase_proyecto","clase") REFERENCES "apex_clase" ("proyecto","clase") ON DELETE	NO	ACTION ON UPDATE NO ACTION	DEFERRABLE	INITIALLY IMMEDIATE,
	CONSTRAINT	"apex_objeto_fk_fuente_datos"	FOREIGN KEY	("fuente_datos_proyecto","fuente_datos") REFERENCES "apex_fuente_datos"	("proyecto","fuente_datos") ON DELETE NO ACTION	ON	UPDATE NO ACTION DEFERRABLE INITIALLY	IMMEDIATE,
	CONSTRAINT	"apex_objeto_fk_proyecto" FOREIGN KEY ("proyecto")	REFERENCES "apex_proyecto"	("proyecto") ON DELETE NO ACTION	ON	UPDATE NO ACTION DEFERRABLE INITIALLY	IMMEDIATE
--  CONSTRAINT  "apex_objeto_fk_usuario"	FOREIGN KEY	("usuario")	REFERENCES "apex_usuario" ("usuario") ON DELETE	NO	ACTION ON UPDATE NO ACTION	DEFERRABLE	INITIALLY IMMEDIATE,
);
--#################################################################################################

CREATE TABLE apex_objeto_info
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: componente
--: dump_clave_proyecto: objeto_proyecto
--: dump_clave_componente: objeto
--: dump_order_by: objeto
--: dump_where: ( objeto_proyecto = '%%' )
--: zona: central
--: desc:
--: version: 1.0
---------------------------------------------------------------------------------------------------
(
	objeto_proyecto						varchar(15)			NOT NULL,
	objeto								int4				NOT NULL,
	descripcion_breve					varchar(255)		NULL,
	descripcion_larga					text				NULL,
	CONSTRAINT	"apex_objeto_info_pk" PRIMARY	KEY ("objeto_proyecto","objeto"),
	CONSTRAINT	"apex_objeto_info_fk_objeto" FOREIGN KEY ("objeto_proyecto","objeto") REFERENCES	"apex_objeto" ("proyecto","objeto")	ON	DELETE CASCADE ON UPDATE	NO	ACTION DEFERRABLE INITIALLY IMMEDIATE
);
--#################################################################################################

CREATE SEQUENCE apex_objeto_dep_seq INCREMENT	1 MINVALUE 0 MAXVALUE 9223372036854775807	CACHE	1;
CREATE TABLE apex_objeto_dependencias
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: componente
--: dump_clave_proyecto: proyecto
--: dump_clave_componente: objeto_consumidor
--: dump_order_by: objeto_consumidor, identificador
--: zona: central
--: desc:
--: version: 1.0
---------------------------------------------------------------------------------------------------
(
	proyecto							varchar(15)			NOT NULL,
	dep_id								int4				DEFAULT nextval('"apex_objeto_dep_seq"'::text) NOT NULL, 
	objeto_consumidor					int4				NOT NULL,
	objeto_proveedor					int4				NOT NULL,
	identificador						varchar(20)			NOT NULL,
	parametros_a						varchar(255)		NULL,
	parametros_b						varchar(255)		NULL,
	parametros_c						varchar(255)		NULL,
	inicializar							smallint			NULL,
	orden								smallint			NULL,
	CONSTRAINT	"apex_objeto_depen_pk"	 PRIMARY	KEY ("proyecto","objeto_consumidor","dep_id"),
--	CONSTRAINT	"apex_objeto_depen_pk"	 PRIMARY	KEY ("proyecto","objeto_consumidor","identificador"),
	CONSTRAINT	"apex_objeto_depen_uq"	 UNIQUE  ("proyecto","objeto_consumidor","identificador"),
	CONSTRAINT	"apex_objeto_depen_fk_objeto_c" FOREIGN KEY ("proyecto","objeto_consumidor") REFERENCES "apex_objeto"	("proyecto","objeto") ON DELETE CASCADE ON UPDATE NO ACTION DEFERRABLE INITIALLY IMMEDIATE,
	CONSTRAINT	"apex_objeto_depen_fk_objeto_p" FOREIGN KEY ("proyecto","objeto_proveedor") REFERENCES	"apex_objeto" ("proyecto","objeto")	ON	DELETE CASCADE ON UPDATE NO	ACTION DEFERRABLE INITIALLY IMMEDIATE
);
--#################################################################################################

CREATE SEQUENCE apex_objeto_eventos_seq INCREMENT	1 MINVALUE 0 MAXVALUE 9223372036854775807	CACHE	1;
CREATE TABLE apex_objeto_eventos
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: componente
--: dump_clave_proyecto: proyecto
--: dump_clave_componente: objeto
--: dump_order_by: objeto, orden, identificador
--: zona: central
--: desc:
--: version: 1.0
---------------------------------------------------------------------------------------------------
(
	proyecto							varchar(15)			NOT NULL,
	evento_id							int4				DEFAULT nextval('"apex_objeto_eventos_seq"'::text) NOT NULL,
	objeto								int4				NOT NULL,
	identificador						varchar(20)			NOT NULL,
	etiqueta							varchar(60)			NULL,
	maneja_datos						smallint			NULL DEFAULT 1,
	sobre_fila							smallint			NULL,
	confirmacion						varchar(160)		NULL,
	estilo								varchar(40)			NULL,
	imagen_recurso_origen				varchar(10)			NULL,
	imagen								varchar(60)			NULL,
	en_botonera							smallint			NULL DEFAULT 1,
	ayuda								varchar(255)		NULL,
	orden								smallint			NULL,
	ci_predep							smallint			NULL, 
	implicito							smallint			NULL,
	defecto								smallint			NULL,
	display_datos_cargados				smallint			NULL, 
	grupo								varchar(80)			NULL,
	accion								varchar(1)			NULL,
	accion_imphtml_debug				smallint			NULL,
	accion_vinculo_carpeta				varchar(60)			NULL,
	accion_vinculo_item					varchar(60)			NULL,
	accion_vinculo_objeto				int4				NULL,
	accion_vinculo_popup				smallint			NULL,
	accion_vinculo_popup_param			varchar(100)		NULL,
	accion_vinculo_target				varchar(40)			NULL,
	accion_vinculo_celda				varchar(40)			NULL,
	CONSTRAINT	"apex_objeto_eventos_pk" PRIMARY KEY ("proyecto","evento_id"),
	CONSTRAINT	"apex_objeto_eventos_uq" UNIQUE ("proyecto","objeto","identificador"),	
	CONSTRAINT	"apex_objeto_eventos_fk_rec_orig" FOREIGN KEY ("imagen_recurso_origen") REFERENCES "apex_recurso_origen" ("recurso_origen")	ON	DELETE NO ACTION ON UPDATE	NO	ACTION DEFERRABLE INITIALLY IMMEDIATE,
	CONSTRAINT	"apex_objeto_eventos_fk_objeto" FOREIGN KEY ("proyecto","objeto") REFERENCES "apex_objeto"	("proyecto","objeto") ON DELETE CASCADE ON UPDATE NO ACTION DEFERRABLE INITIALLY	IMMEDIATE
);
--#################################################################################################

CREATE TABLE apex_item_objeto
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: componente
--: dump_clave_proyecto: proyecto
--: dump_clave_componente: item
--: dump_order_by: item, objeto
--: zona: central
--: desc:
--: version: 1.0
---------------------------------------------------------------------------------------------------
(
	item_id								int4			NULL,	
	proyecto							varchar(15)		NOT NULL,
	item								varchar(60)		NOT NULL,
	objeto								int4			NOT NULL,
	orden								smallint		NOT NULL,
	inicializar							smallint		NULL,
	CONSTRAINT	"apex_item_consumo_obj_pk"	 PRIMARY	KEY ("proyecto","item","objeto"),
	CONSTRAINT	"apex_item_consumo_obj_fk_item" FOREIGN KEY ("proyecto","item") REFERENCES	"apex_item"	("proyecto","item") ON DELETE CASCADE ON UPDATE NO ACTION	DEFERRABLE	INITIALLY IMMEDIATE,
	CONSTRAINT	"apex_item_consumo_obj_fk_objeto" FOREIGN	KEY ("proyecto","objeto") REFERENCES "apex_objeto"	("proyecto","objeto") ON DELETE CASCADE	ON	UPDATE NO ACTION DEFERRABLE INITIALLY	IMMEDIATE
);
--#################################################################################################

CREATE TABLE apex_usuario_grupo_acc_item
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: permisos
--: dump_order_by: usuario_grupo_acc, item
--: zona: usuario, item
--: desc:
--: version: 1.0
---------------------------------------------------------------------------------------------------
(
	proyecto								varchar(15)		NOT NULL,
	usuario_grupo_acc					varchar(20)		NOT NULL,
	item_id								int4				NULL,	
	item									varchar(60)		NOT NULL,
	CONSTRAINT	"apex_usu_item_pk" PRIMARY	KEY ("proyecto","usuario_grupo_acc","item"),
	CONSTRAINT	"apex_usu_item_fk_item"	FOREIGN KEY	("proyecto","item") REFERENCES "apex_item" ("proyecto","item")	ON	DELETE CASCADE ON UPDATE	NO	ACTION DEFERRABLE INITIALLY IMMEDIATE,
	CONSTRAINT	"apex_usu_item_fk_us_gru_acc"	FOREIGN KEY	("proyecto","usuario_grupo_acc")	REFERENCES "apex_usuario_grupo_acc"	("proyecto","usuario_grupo_acc")	ON	DELETE NO ACTION ON UPDATE	NO	ACTION DEFERRABLE INITIALLY IMMEDIATE
);
  
--#################################################################################################

CREATE TABLE apex_arbol_items_fotos

---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: multiproyecto
--: dump_order_by: usuario, foto_nombre
--: zona: usuario
--: instancia:	1
--: desc:
--: version: 1.0
---------------------------------------------------------------------------------------------------
(
	proyecto							varchar(15)		NOT NULL, 
	usuario								varchar(20)		NOT NULL,
	foto_nombre							varchar(100)	NOT NULL,
	foto_nodos_visibles					varchar			NULL,
	foto_opciones						varchar			NULL,
  CONSTRAINT "apex_arbol_items_fotos_pk" PRIMARY KEY("proyecto", "usuario", "foto_nombre"),
  CONSTRAINT "apex_arbol_items_fotos_fk_proy" 	FOREIGN KEY ("proyecto", "usuario")
    											REFERENCES "apex_usuario_proyecto" ("proyecto", "usuario") ON	DELETE CASCADE ON UPDATE	NO	ACTION DEFERRABLE INITIALLY IMMEDIATE
);

--#################################################################################################

CREATE TABLE apex_admin_album_fotos

---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: multiproyecto
--: dump_order_by: usuario, foto_tipo, foto_nombre
--: zona: usuario
--: instancia:	1
--: desc:
--: version: 1.0
---------------------------------------------------------------------------------------------------
(
	proyecto							varchar(15)		NOT NULL, 
	usuario								varchar(20)		NOT NULL,
	foto_tipo							varchar(20)		NOT NULL,	--cat_item u cat_objeto
	foto_nombre							varchar(100)	NOT NULL,
	foto_nodos_visibles					varchar			NULL,
	foto_opciones						varchar			NULL,
	predeterminada							smallint	NULL,
  CONSTRAINT "apex_admin_album_fotos_pk" PRIMARY KEY("proyecto", "usuario", "foto_nombre", "foto_tipo"),
  CONSTRAINT "apex_admin_album_fotos_fk_proy" 	FOREIGN KEY ("proyecto", "usuario")
    											REFERENCES "apex_usuario_proyecto" ("proyecto", "usuario") ON	DELETE CASCADE ON UPDATE	NO	ACTION DEFERRABLE INITIALLY IMMEDIATE
);

--#################################################################################################

CREATE TABLE apex_admin_param_previsualizazion

---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: multiproyecto
--: dump_order_by: usuario, proyecto
--: zona: usuario
--: instancia:	1
--: desc:
--: version: 1.0
---------------------------------------------------------------------------------------------------
(
	proyecto							varchar(15)		NOT NULL, 
	usuario								varchar(60)		NOT NULL,
	grupo_acceso						varchar(20)		NOT NULL,
	punto_acceso						varchar(100)	NOT NULL,
  CONSTRAINT "apex_admin_param_prev_pk" PRIMARY KEY("proyecto", "usuario"),
  CONSTRAINT "apex_admin_param_prev_fk_proy" 	FOREIGN KEY ("proyecto", "usuario")
    											REFERENCES "apex_usuario_proyecto" ("proyecto", "usuario") ON	DELETE CASCADE ON UPDATE	NO	ACTION DEFERRABLE INITIALLY IMMEDIATE
);
 
--#################################################################################################

CREATE TABLE apex_conversion
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: multiproyecto
--: dump_order_by: proyecto
--: dump_where: (	proyecto =	'%%' )
--: zona: nucleo
--: desc:
--: version: 1.0
---------------------------------------------------------------------------------------------------
(
	proyecto							varchar(15)		NOT NULL,
	conversion_aplicada					varchar(60)		NOT NULL,
	fecha								timestamp		NOT NULL,
	CONSTRAINT	"apex_conversion_pk" PRIMARY	KEY ("proyecto","conversion_aplicada"),
	CONSTRAINT	"apex_conversion_proy" FOREIGN KEY ("proyecto") REFERENCES "apex_proyecto" ("proyecto") ON	DELETE NO ACTION ON UPDATE	NO	ACTION DEFERRABLE INITIALLY IMMEDIATE
);

--#################################################################################################
CREATE TABLE apex_ptos_control 
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: multiproyecto
--: dump_order_by: proyecto
--: dump_where: (	proyecto =	'%%' )
--: zona: nucleo
--: desc:
--: version: 1.0
---------------------------------------------------------------------------------------------------
(
  proyecto VARCHAR(15) NOT NULL,
  pto_control          VARCHAR(20) NOT NULL,
  descripcion          VARCHAR(255) NULL,

  CONSTRAINT "apex_ptos_control__pk" PRIMARY KEY("proyecto", "pto_control")
);

--#################################################################################################
CREATE TABLE apex_ptos_control_param
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: multiproyecto
--: dump_order_by: proyecto
--: dump_where: (	proyecto =	'%%' )
--: zona: nucleo
--: desc:
--: version: 1.0
---------------------------------------------------------------------------------------------------
(
  proyecto VARCHAR(15) NOT NULL,
  pto_control              VARCHAR(20) NOT NULL,
  parametro                VARCHAR(60) NULL,

  CONSTRAINT "apex_ptos_ctrl_param__pk" PRIMARY KEY("proyecto", "pto_control", "parametro"),
  CONSTRAINT "apex_ptos_ctrl_param_fk_ptos_ctrl" FOREIGN KEY ("proyecto", "pto_control") REFERENCES "public"."apex_ptos_control"("proyecto", "pto_control") ON DELETE NO ACTION ON UPDATE NO ACTION DEFERRABLE INITIALLY IMMEDIATE
);

--#################################################################################################
CREATE TABLE apex_ptos_control_ctrl
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: multiproyecto
--: dump_order_by: proyecto
--: dump_where: (	proyecto =	'%%' )
--: zona: nucleo
--: desc:
--: version: 1.0
---------------------------------------------------------------------------------------------------
(
  proyecto VARCHAR(15)  NOT NULL,
  pto_control             VARCHAR(20)  NOT NULL,
  clase                   VARCHAR(60)  NOT NULL,
  archivo                 VARCHAR(255) NULL,
  actua_como              CHAR(1)      DEFAULT 'M' NOT NULL CHECK (actua_como IN ('E','A','M')),
  
  CONSTRAINT "apex_ptos_ctrl_ctrl__pk" PRIMARY KEY("proyecto", "pto_control", "clase"),
  CONSTRAINT "apex_ptos_ctrl_ctrl_fk_ptos_ctrl" FOREIGN KEY ("proyecto", "pto_control") REFERENCES "public"."apex_ptos_control"("proyecto", "pto_control") ON DELETE NO ACTION ON UPDATE NO ACTION DEFERRABLE INITIALLY IMMEDIATE
);

--#################################################################################################
CREATE TABLE apex_ptos_control_x_evento
---------------------------------------------------------------------------------------------------
--: proyecto: toba
--: dump: multiproyecto
--: dump_order_by: proyecto
--: dump_where: (	proyecto =	'%%' )
--: zona: nucleo
--: desc:
--: version: 1.0
---------------------------------------------------------------------------------------------------
(
  proyecto VARCHAR(15) NOT NULL,
  pto_control              VARCHAR(20) NOT NULL,
  evento_id                INTEGER     NOT NULL,

  CONSTRAINT "apex_ptos_ctrl_x_evt__pk" PRIMARY KEY("proyecto", "pto_control", "evento_id"),
  CONSTRAINT "apex_proyecto_fk_ptos_ctrl" FOREIGN KEY ("proyecto", "pto_control") REFERENCES "public"."apex_ptos_control"("proyecto", "pto_control") ON DELETE NO ACTION ON UPDATE NO ACTION DEFERRABLE INITIALLY IMMEDIATE,
  CONSTRAINT "apex_ptos_ctrl_x_evt_fk_proyecto" FOREIGN KEY ("proyecto") REFERENCES "public"."apex_proyecto"("proyecto") ON DELETE NO ACTION ON UPDATE NO ACTION DEFERRABLE INITIALLY IMMEDIATE, 
  CONSTRAINT "apex_ptos_ctrl_x_evt_fk_evento" FOREIGN KEY ("proyecto", "evento_id") REFERENCES "public"."apex_objeto_eventos"("proyecto", "evento_id") ON DELETE NO ACTION ON UPDATE NO ACTION DEFERRABLE INITIALLY IMMEDIATE
);