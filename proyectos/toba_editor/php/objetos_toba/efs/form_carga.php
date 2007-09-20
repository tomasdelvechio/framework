<?php 
//--------------------------------------------------------------------
class form_carga extends toba_ei_formulario
{

	function extender_objeto_js()
	{
		echo "
			var mecanismos_carga = ['carga_metodo','carga_sql', 'carga_lista', 'carga_dt'];
			
			{$this->objeto_js}.evt__estatico__procesar = function(inicial) {
				var cheq = this.ef('estatico').chequeado();
				this.ef('carga_include').mostrar(cheq, true);
				this.ef('carga_clase').mostrar(cheq, true);
			}
						
			{$this->objeto_js}.evt__mecanismo__procesar = function(inicial) {
				actual = this.ef('mecanismo').valor();
				var mostrar = (actual != apex_ef_no_seteado);
				//---Ocultar/Mostrar todos
				for (var id_ef in this._efs) {
					if (id_ef != 'mecanismo' && id_ef != 'sep_carga') {
						this.ef(id_ef).mostrar(mostrar, true);
					}
				}
				if (mostrar) {
					for (var i=0; i < mecanismos_carga.length; i++) {
						var mostrar = (actual == mecanismos_carga[i]);
						this.cambiar_mecanismo(mecanismos_carga[i], mostrar, actual);
					}

				}
			}

			{$this->objeto_js}.cambiar_mecanismo = function(mecanismo, estado, actual) {
				switch (mecanismo) {
					case 'carga_metodo':
						this.ef('estatico').mostrar(estado, true);
						if (estado) {
							this.evt__estatico__procesar(false);
						} else {
							this.ef('carga_include').ocultar(true);
							this.ef('carga_clase').ocultar(true);						
						}
						if (actual == 'carga_dt') {
							//-- Caso particular porque la forma de esta extension no se banca que dos mecanismos re-utilicen un ef						
							estado = true;
						}
						this.ef('carga_metodo').mostrar(estado, true);
						break;
					case 'carga_sql':
						this.ef('carga_sql').mostrar(estado, true);
						this.ef('carga_fuente').mostrar(estado, true);
						break;
					case 'carga_lista':
						if (this.ef('carga_lista')) 
							this.ef('carga_lista').mostrar(estado, true);
						if (this.ef('carga_col_clave')) 
							this.ef('carga_col_clave').mostrar(!estado, true);
						if (this.ef('carga_col_desc')) 							
							this.ef('carga_col_desc').mostrar(!estado, true);
						break;
					case 'carga_dt':
						this.ef('carga_dt').mostrar(estado, true);
						if (actual == 'carga_metodo') {
							//-- Caso particular porque la forma de esta extension no se banca que dos mecanismos re-utilicen un ef						
							estado = true;
						}						
						this.ef('carga_metodo').mostrar(estado, true);
						break; 
				}
			}
			
			{$this->objeto_js}.evt__carga_dt__procesar = function(inicial) {
				if (inicial) return;
				var tabla_actual = this.ef('carga_dt').get_estado();
				if (tabla_actual != apex_ef_no_seteado) {
					this.ef('carga_metodo').set_estado('');
					this.controlador.ajax('existe_metodo_dt', tabla_actual, this, this.respuesta_existe_dt); 
				} else {
					this.ef('carga_metodo').ocultar(true);
					this.ef('carga_col_clave').ocultar(true);
					this.ef('carga_col_desc').ocultar(true);
				}
			}
			
			{$this->objeto_js}.generar_metodo = function() {
				var tabla_actual = this.ef('carga_dt').get_estado();
				this.controlador.ajax('crear_metodo_get_listado', tabla_actual, this, this.respuesta_crear_dt);
			}

			
			{$this->objeto_js}.respuesta_existe_dt = function(existe) {
				this.ef('carga_metodo').mostrar();
				this.ef('carga_col_clave').mostrar(true);
				this.ef('carga_col_desc').mostrar(true);				
				var div = $('nodo_carga_metodo');
				if (! div) {
					this.ef('carga_metodo').get_contenedor().innerHTML += '<span id=\"nodo_carga_metodo\"></span>';	
				}			
				div = $('nodo_carga_metodo');				
				if (! existe) {
					this.ef('carga_metodo').set_estado('');
					var link = '<a href=\"javascript: {$this->objeto_js}.generar_metodo()\" ';
					link += 'title=\"Crea un m�todo get_listado() dentro de la extensi�n del datos tabla, conteniendo el select requerido para cargar esta tabla\">';
					link += 'Crear m�todo <strong>get_listado</strong></a>';
					div.innerHTML = link;
				} else {
					div.innerHTML = '';
					this.ef('carga_metodo').set_estado('get_listado');
				}			
			}			
			
			
			{$this->objeto_js}.respuesta_crear_dt = function(datos) {
				if (datos) {
					this.ef('carga_metodo').set_estado('get_listado');
					this.ef('carga_col_clave').set_estado(datos[1]);
					this.ef('carga_col_desc').set_estado(datos[2]);
				}
			}
		";
	}

}

?>