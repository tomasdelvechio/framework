//--------------------------------------------------------------------------------
//Clase ef_checkbox
//	El checkbox tiene un valor que depende si esta chequeao o no, por eso cambiar_valor no afecta al check sino s�lo a su value
//	Para cambiar el check usar chequear(boolean) 
ef_checkbox.prototype = new ef;
var def = ef_checkbox.prototype;
def.constructor = ef_checkbox;

	function ef_checkbox(id_form, etiqueta, obligatorio, colapsado) {
		ef.prototype.constructor.call(this, id_form, etiqueta, obligatorio, colapsado);
	}
	
	//cuando_cambia_valor (disparar_callback)
	def.cuando_cambia_valor = function(callback) {
		addEvent(this.input(), 'onclick', callback);
	}

	def.valor = function() {
		if (this.chequeado())
			return this.input().value;
		else
			return null;
	}
	
	def.chequear = function(valor, disparar_eventos) {
		if (typeof eventos != 'boolean')
			disparar_eventos = true;
		if (typeof valor != 'boolean')
			valor = true;
		var input = this.input();
		input.checked = valor;
		if (disparar_eventos && input.onclick)
			input.onclick();
	}
	
	def.chequeado = function() {
		return this.input().checked;
	}	