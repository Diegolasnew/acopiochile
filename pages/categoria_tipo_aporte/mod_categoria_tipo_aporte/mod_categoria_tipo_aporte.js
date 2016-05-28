$("#li_crear_envase").addClass("active").parent().parent().addClass("active open");


$('#categoria_tipo_aporte_form').validate({
	errorElement: 'div',
	errorClass: 'error_campo',
	focusInvalid: false,
	ignore: "",
	rules: {
		nombre_categoria_tipo_aporte:{
			required: true
		}
	},

	messages: {
		nombre_categoria_tipo_aporte: "Por favor introduzca un nombre"
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
	if($('#categoria_tipo_aporte_form').valid()){
		$(this).attr("disabled", true);
		var json = {json:"true", foo: "mod_categoria_tipo_aporte", args: $("#categoria_tipo_aporte_form").serializeObject()};
		$.post(root+"/control/aporte/post_aporte_db.php", json, function(data){	
			console.log(data);
			window.location=root+"/categorias_aporte/";
		},"json").fail(function(e){
			console.log(e.responseText);
			$(this).attr("disabled", false);
		});
	}
});