$("#li_crear_usuario").addClass("active").parent().parent().addClass("active open");
$('.chosen-select').chosen({
    allow_single_deselect: true
});

function ocultar_selects(id_rol_usuario){
	$('.rol').each(function(index, val){
		var local_id = id_rol_usuario;
		if($(this).attr('id') == 'rol_'+id_rol_usuario || $(this).attr('id') == 'rol_'+(id_rol_usuario--) || $(this).attr('id') == 'rol_'+(id_rol_usuario--) || $(this).attr('id') == 'rol_'+(id_rol_usuario--) || $(this).attr('id') == 'rol_'+(id_rol_usuario--) || $(this).attr('id') == 'rol_'+(id_rol_usuario--)){
			if(($(this).attr('id') == 'rol_5' && local_id == 5) || ($(this).attr('id') == 'rol_5' && local_id == 6)){
			}
			else
			{
				$(this).remove();	
			}
			
		}
		id_rol_usuario = local_id;
	});

	$('#id_rol_usuario option').each(function(index, val){
		var local_id = id_rol_usuario;
		if($(this).val() == id_rol_usuario || $(this).val() == (id_rol_usuario--) || $(this).val() == (id_rol_usuario--) || $(this).val() == (id_rol_usuario--) || $(this).val() == (id_rol_usuario--) || $(this).val() == (id_rol_usuario--) || $(this).val() == (id_rol_usuario--)){
			$(this).remove();
		}
		id_rol_usuario = local_id;
	});

	id_rol_usuario = parseInt(id_rol_usuario)+1;
	$('#id_rol_usuario').val( id_rol_usuario ) ;
}
if(user.id_rol_usuario != 1){
	ocultar_selects(user.id_rol_usuario);
}




$('.rol').hide();
function ocultar_mostrar_segun_rol(id_rol_usuario){
	if(id_rol_usuario == 6){
		$('.rol').hide();
		$("#rol_5").show();
	}
	else{
		$(".rol").each(function(index, val){
			if($(this).attr("id") == "rol_"+id_rol_usuario ){
				$(this).show();
			}
			else{
				$(this).hide();	
			}
		});
	}
}
ocultar_mostrar_segun_rol($('#id_rol_usuario').val());
$('#id_rol_usuario').on('change', function(){
	ocultar_mostrar_segun_rol($(this).val());
});



$('#usuario_form').validate({
	errorElement: 'div',
	errorClass: 'error_campo',
	focusInvalid: false,
	ignore: "",
	rules: {
		nombre_usu:{
			required: true
		},
		nick_usu:{
			required: true
		},
		pass_usu:{
			required: creando
		}
	},

	messages: {
		nombre_usu: "Por favor introduzca un nombre",
		nick_usu: "Por favor introduzca un nick",
		pass_usu: "Por favor introduzca una contraseña"
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

$("#nombre_usu").on("focusout change", function(){
	var nombre = $(this).val();
	if (nombre!="" && creando) {
		var json = {json: "", foo: "getNombreValido", args: [nombre]};
		$.get(root+"/control/usuario/get_usuario_db.php", json, function(data){
			$("#nick_usu").val(data);
		}, "json")
	};
});

$("#Crear, #Modificar").click(function(){
	if($('#usuario_form').valid()){
		var form = $("#usuario_form").serializeObject();
		var json = {json:"", foo: "mod_usuario", args: form};

		if(form.id_rol_usuario == 1){
			form.id_region = 'NULL';
			form.id_provincia = 'NULL';
			form.id_comuna = 'NULL';
			form.id_centro_acopio = 'NULL';
		}
		else if(form.id_rol_usuario == 2){
			form.id_provincia = 'NULL';
			form.id_comuna = 'NULL';
			form.id_centro_acopio = 'NULL';
		}
		else if(form.id_rol_usuario == 3){
			form.id_region = 'NULL';
			form.id_comuna = 'NULL';
			form.id_centro_acopio = 'NULL';
		}
		else if(form.id_rol_usuario == 4){
			form.id_region = 'NULL';
			form.id_provincia = 'NULL';
			form.id_centro_acopio = 'NULL';
		}
		else if(form.id_rol_usuario == 5){
			form.id_region = 'NULL';
			form.id_provincia = 'NULL';
			form.id_comuna = 'NULL';
		}
		else if(form.id_rol_usuario == 6){
			form.id_region = 'NULL';
			form.id_provincia = 'NULL';
			form.id_comuna = 'NULL';
		}

		console.log(form);
		//$(this).attr("disabled", true);
		$.post(root+"/control/usuario/post_usuario_db.php", json, function(data){
			$(this).attr("disabled", false);
			console.log(data);
			if(data){
				window.location=root+"/usuarios";
			}
			else{
				alert("nick en uso");
			}
		},"json").fail(function(){
			$(this).attr("disabled", false);
			console.log(e.responseText);
		});
	}
});