if(user.id_rol_usuario = 4 ){
	$('#id_comuna').val(user.id_comuna);
	$('#lab_comuna').hide();
}

$('.chosen-select').chosen({
    allow_single_deselect: true
});

$('#centro_acopio_form').validate({
	errorElement: 'div',
	errorClass: 'error_campo',
	focusInvalid: false,
	ignore: "",
	rules: {
		nombre_centro_acopio:{
			required: true
		}
	},

	messages: {
		nombre_centro_acopio: "Por favor introduzca un nombre"
	},


	highlight: function (e) {
		$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
	},

	success: function (e) {
		$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
		$(e).remove();
	},

	errorPlacement: function (error, element) {
		if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
			var controls = element.closest('div[class*="col-"]');
			if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
			else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
		}
		else if(element.is('.select2')) {
			error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
		}
		else if(element.is('.chosen-select')) {
			error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
		}
		else error.insertAfter(element.parent());
	},

	submitHandler: function (form) {
	},
	invalidHandler: function (form) {
	}
});

$("#Modificar, #Crear").click(function(){
	if($('#centro_acopio_form').valid()){
		$(this).attr("disabled", true);
		var json = {json:"true", foo: "mod_centro_acopio", args: $("#centro_acopio_form").serializeObject()};
		console.log(json);
		$.post(root+"/control/centro_acopio/post_centro_acopio_db.php", json, function(data){
			if(data){
				console.log(data);
				window.location=root+"/centros_acopio/";
			}
		},"json").fail(function(e){
			console.log(e.responseText);
			$(this).attr("disabled", false);
		});
	}
});