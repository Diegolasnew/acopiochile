$("#li_crear_producto").addClass("active").parent().parent().addClass("active open");

$('#nuevo_producto_form').validate({
	errorElement: 'div',
	errorClass: 'error_campo',
	focusInvalid: false,
	ignore: "",
	rules: {
		nombre_pro:{
			required: true
		},
		stock_pro:{
			required: true
		}
	},

	messages: {
		nombre_pro: "Por favor introduzca un nombre",
		stock_pro: "Por favor introduzca un stock"
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

$("#crear").click(function(){
	if($('#nuevo_producto_form').valid()){
		var json = {json:"", foo: "crear_producto", args: $("#nuevo_producto_form").serializeObject()};
		$(this).attr("disabled", true);
		$.post(root+"/control/producto/post_producto_db.php", json, function(data){
			$(this).attr("disabled", false);
			if(data){
				alert("Producto creado: " + data);
				window.location=root+"/producto/";
			}

		},"json").fail(function(){
			$(this).attr("disabled", false);
		});
	}
});