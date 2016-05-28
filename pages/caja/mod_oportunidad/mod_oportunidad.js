$('.chosen-select').chosen({
    allow_single_deselect: true
});

$('#oportunidad_form').validate({
	errorElement: 'div',
	errorClass: 'error_campo',
	focusInvalid: false,
	ignore: "",
	rules: {
		nombre_cli:{
			required: true
		},
		porcentaje_opor:{
			required: true
		},
		titulo_opor:{
			required: true
		},
		fecha_termino:{
			required: true
		}
	},

	messages: {
		nombre_cli: "Por favor introduzca un nombre de cliente",
		porcentaje_opor: "Por favor indique un porcentaje",
		titulo_opor: "Por favor indique un título",
		fecha_termino: "Por favor seleccione una fecha final."
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

$('#descripcion_opor').ace_wysiwyg({
	toolbar:
	[
		'font',
		null,
		'fontSize',
		null,
		{name:'bold', className:'btn-info'},
		{name:'italic', className:'btn-info'},
		{name:'strikethrough', className:'btn-info'},
		{name:'underline', className:'btn-info'},
		null,
		{name:'insertunorderedlist', className:'btn-success'},
		{name:'insertorderedlist', className:'btn-success'},
		{name:'outdent', className:'btn-purple'},
		{name:'indent', className:'btn-purple'},
		null,
		{name:'justifyleft', className:'btn-primary'},
		{name:'justifycenter', className:'btn-primary'},
		{name:'justifyright', className:'btn-primary'},
		{name:'justifyfull', className:'btn-inverse'},
		null,
		{name:'createLink', className:'btn-pink'},
		{name:'unlink', className:'btn-pink'},
		null,
		{name:'insertImage', className:'btn-success'},
		null,
		'foreColor',
		null,
		{name:'undo', className:'btn-grey'},
		{name:'redo', className:'btn-grey'}
	],
	'wysiwyg': {
		fileUploadError: showErrorAlert
	}
}).prev().addClass('wysiwyg-style2');

$('#fecha_termino').datepicker({
	autoclose: true,
	todayHighlight: true
});

var nombre_cli = $("#nombre_cli");

var demo1 = $('select[name="id_participantes"]').bootstrapDualListbox({
	infoTextFiltered: '<span class="label label-purple label-lg">Filtrados</span>',
	filterTextClear: "Mostrar Todos",
	filterPlaceHolder: "Filtro",
	infoText: "Mostrando todos {0}",
	infoTextEmpty: "Lista vacía",
	selectorMinimalHeight: 200
	});
var container1 = demo1.bootstrapDualListbox('getContainer');
container1.find('.btn').addClass('btn-white btn-info btn-bold');

var cliente_nuevo = $("#cliente_nuevo");
cliente_nuevo.click(cambiarSiEsNuevo);

function cambiarSiEsNuevo(){
	if($(cliente_nuevo).is(":checked")){
		$("#id_cliente_chosen").hide();
		$("#nombre_cli").removeClass('hide');
	}
	else{
		$("#id_cliente_chosen").show();
		$("#nombre_cli").addClass('hide');
	}
}
cambiarSiEsNuevo();

$("#id_cliente").on("change", function(){
	$("#nombre_cli").val($(this).find("option:selected").text());
});

$("#eliminar_oportunidad").click(function(){
	if(confirm('¿Seguro que desea eliminar esta oportunidad?')){
		var json = {json:"", foo: "eliminar_oportunidad", args: {'id_oportunidad': $("#id_oportunidad").val()}};
		$.post(root+"/control/oportunidad/post_oportunidad_db.php", json, function(data){
			$(this).attr("disabled", false);
			if(data){
				//alert("oportunidad creada: " + data);
				console.log(data);
				window.location=root+"/oportunidades/";
			}

		},"json").fail(function(e){
			alert("error de conexión.");
			$(this).attr("disabled", false);
			console.log(e.responseText);
		});
	}	
});

$("#porcentaje_ganancia_opor").on('change keyup', function(){
	$("#total_ganancia").html("$" + parseInt(parseInt($("#monto_opor").val())*(parseInt($("#porcentaje_ganancia_opor").val())/100)) );
});

$("#Crear, #Modificar").click(function(){
	if($('#oportunidad_form').valid()){
		$(this).attr("disabled", true);
		var data = $("#oportunidad_form").serializeObject();
		data["cliente_nuevo"] = (cliente_nuevo.is(":checked") ? 1 : 0);
		data["fecha_termino"] = dateToMySQL(data["fecha_termino"]);
		data["descripcion_opor"] = $("#descripcion_opor").html();
		data["descripcion_corta"] = strip($("#descripcion_opor").html()).substring(0, 62);
		var json = {json:"", foo: "crear_oportunidad", args: data};
		console.log(json);
		$(this).attr("disabled", true);
		$.post(root+"/control/oportunidad/post_oportunidad_db.php", json, function(data){
			$(this).attr("disabled", false);
			console.log(data);
			if(data){
				//alert("oportunidad creada: " + data);
				window.location=root+"/oportunidades/#"+data.id_oportunidad;
			}

		},"json").fail(function(e){
			alert("error de conexión.");
			$(this).attr("disabled", false);
			console.log(e.responseText);
		});
	}
});

$