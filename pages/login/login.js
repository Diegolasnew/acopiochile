$('#login_form').validate({
	errorElement: 'div',
	errorClass: 'error_campo',
	focusInvalid: false,
	ignore: "",
	rules: {
		nombre_usu:{
			required: true
		},
		pass_usu:{
			required: true
		}
	},

	messages: {
		nombre_usu: "Por favor introduzca un nombre",
		pass_usu: "Por favor introduzca su contraseña"		
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

$("#autenticar").click(function(){
	if($('#login_form').valid()){
		var json = {json:"true", foo: "validate", args: $("#login_form").serializeObject()};
		$.get(root+"/control/session/session.php", json, function(data){
			console.log(data);
			if(data){
				location.reload();
			}
			else{
				alert("Usuario o contraseña inválido.");
			}
		},"json").fail(function(e){
			console.log(e.responseText);
			$(this).attr("disabled", false);
		});;
	}
});
$(document).keypress(function(e) {
    if(e.which == 13) {
        $("#autenticar").click();
    }
});