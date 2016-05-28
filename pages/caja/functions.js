

function crear_caja(id_caja, select_tipo_aporte, id_tipo, id_tipo_caja){
	var titulo = (id_caja==0 ? "Nueva Caja" : "Editar Caja");
	var titulo = (id_tipo == 2 ? titulo+" Armada para: " : titulo);
	var tipo = "Tipo Aporte";
	var html = '\
	<h3 class="header smaller lighter blue">'+titulo+'</h3>	\
	<div class="row">\
		<div class="col-xs-12">\
			<form class="form-horizontal" role="form">\
				<input class="hide" id="id_caja" value="'+id_caja+'" />\
				<div  class="form-group '+ (id_tipo==2 ? 'hide' : '') +'">\
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Nombre </label>\
					<div class="col-sm-10">\
						<input type="text" id="nombre_caja" name="nombre_caja" placeholder="Nombre de la caja" class="col-xs-10 col-sm-10" />\
					</div>\
				</div>\
				<div class="form-group '+ (id_tipo==2 ? 'hide' : '') +'">\
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Detalle </label>\
					<div class="col-sm-10">\
						<textarea type="text" id="descripcion_caja" name="descripcion_caja" placeholder="Descripción general de la caja" class="col-xs-10 col-sm-10"></textarea>\
					</div>\
				</div>\
				\
				<div class="form-group '+ (id_tipo==1 ? 'hide' : '') +'">\
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Rut </label>\
					<div class="col-sm-10">\
						<input type="text" id="rut_destinatario" name="rut_destinatario" placeholder="Rut de destinatario" class="col-xs-10 col-sm-10" />\
					</div>\
				</div>\
				<div class="form-group '+ (id_tipo==1 ? 'hide' : '') +'">\
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Nombre </label>\
					<div class="col-sm-10">\
						<input type="text" id="nombre_destinatario" name="nombre_destinatario" placeholder="Nombre de destinatario" class="col-xs-10 col-sm-10" />\
					</div>\
				</div>\
			</form>\
		</div>\
		<div class="col-xs-12">\
			<table class="table table-striped table-bordered table-hover">\
				<thead>\
					<tr>\
						<th width="70%" >Nombre '+tipo+'</th>\
						<th class="'+ (id_tipo==1 ? 'hide' : '') +'">Disponible</th>\
						<th>Cantidad</th>\
						<th></th>\
					</tr>\
				</thead>\
				<tbody id="rows_aportes">\
				</tbody>\
			</table>\
			\<button id="nuevo_producto_aporte" class="btn btn-primary pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>\
		</div>\
	</div>';
	html = $(html);
	if(id_tipo==1){
		html.find("#rows_aportes").append(crearRow(select_tipo_aporte, id_tipo));
	}
	else{
		$.each(aportes_cajas_json[id_tipo_caja], function(index, value){
			html.find("#rows_aportes").append(crearRow(select_tipo_aporte, id_tipo, value));	
		})
		
	}
	
	html.find("#nuevo_producto_aporte").click(function(){
		var new_row = crearRow(select_tipo_aporte, id_tipo);
		new_row = $(new_row);
		html.find("#rows_aportes").append(new_row);
		$(window).trigger('resize');
	});

	return html;
}

function crearRow(select_tipo_aporte, tipo_row, usar_base){
	var new_row = '';

	if(tipo_row == 1){
		new_row = '\
			<tr>\
				<td><select id="id_tipo_aporte">'+select_tipo_aporte.html()+'</select></td>\
				<td><input id="cantidad_aportes_lista" type="number" value=0 /> </td>\
				<td><a id="eliminar_row"><i class="fa fa-times" aria-hidden="true"></i></a></td>\
			</tr>';
	}
	else{
		if(usar_base){

			if(!usar_base['cantidad_aportes_caja']){
				usar_base['cantidad_aportes_caja'] = usar_base['cantidad_aporte_familia'];
			}
			new_row = '\
			<tr>\
				<td><select id="id_tipo_aporte">'+select_tipo_aporte.html()+'</select></td>\
				<td><input id="cantidad_disponible_aporte" type="number" value=0 readonly /> </td>\
				<td><input id="cantidad_aportes_lista" type="number" value="'+usar_base['cantidad_aportes_caja']+'" /> </td>\
				<td><a id="eliminar_row"><i class="fa fa-times" aria-hidden="true"></i></a></td>\
			</tr>';
		}
		else{
			new_row = '\
			<tr>\
				<td><select id="id_tipo_aporte">'+select_tipo_aporte.html()+'</select></td>\
				<td><input id="cantidad_disponible_aporte" type="number" value=0 readonly /> </td>\
				<td><input id="cantidad_aportes_lista" type="number" value=0 /> </td>\
				<td><a id="eliminar_row"><i class="fa fa-times" aria-hidden="true"></i></a></td>\
			</tr>';
		}
		
	}

	new_row = $(new_row);

	if(tipo_row == 2){
		if(usar_base){
			new_row.find('select').val(usar_base['id_tipo_aporte']);
		}
		var id_tipo_aporte = new_row.find("select").val();
		mostrarCantidadDisponibleAporte(id_tipo_aporte, user.centro_acopio.id_centro_acopio, new_row.find('#cantidad_disponible_aporte'));	
		new_row.find("select").on("change",function(){
			var id_tipo_aporte = $(this).val();
			mostrarCantidadDisponibleAporte(id_tipo_aporte, user.centro_acopio.id_centro_acopio, $(this).parent().parent().find('#cantidad_disponible_aporte'));	
		});
	}

	new_row.find("#eliminar_row").click(function(){
		$(this).parent().parent().remove();
	});
	new_row.find('select').chosen({
	    allow_single_deselect: true
	});
	return new_row;
}

function crear_vista_caja_familiar(tipo_caja, caja_familiar, select_tipo_aporte){
	var titulo = (tipo_caja==1 ? "Caja Pendiente" : "Caja Entregada");

	var html = '\
	<h3 class="header smaller lighter blue">'+titulo+'</h3>	\
	<div class="row">\
		<div class="col-xs-12">\
			<form class="form-horizontal" role="form">\
				<input class="hide" id="id_caja_familia" value="'+caja_familiar.id_caja_familia+'" />\
				<input class="hide" id="id_caja" value="'+caja_familiar.id_caja+'" />\
				<div class="form-group ">\
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Rut </label>\
					<div class="col-sm-10">\
						<input value="'+caja_familiar.rut_destinatario+'" type="text" id="rut_destinatario" name="rut_destinatario" placeholder="Rut de destinatario" class="col-xs-10 col-sm-10" />\
					</div>\
				</div>\
				<div class="form-group ">\
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Nombre </label>\
					<div class="col-sm-10">\
						<input value="'+caja_familiar.nombre_destinatario+'" type="text" id="nombre_destinatario" name="nombre_destinatario" placeholder="Nombre de destinatario" class="col-xs-10 col-sm-10" />\
					</div>\
				</div>\
			</form>\
		</div>\
		<div class="col-xs-12">\
			<table class="table table-striped table-bordered table-hover">\
				<thead>\
					<tr>\
						<th width="70%" >Nombre Tipo Aporte</th>\
						<th>Disponible</th>\
						<th>Cantidad</th>\
						<th></th>\
					</tr>\
				</thead>\
				<tbody id="rows_aportes">\
				</tbody>\
			</table>\
			\<button id="nuevo_producto_aporte" class="btn btn-primary pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>\
		</div>\
	</div>';

	html = $(html);

	$.each(caja_familiar.aportes_caja_familia, function(index, value){
		html.find("#rows_aportes").append($(crearRow(select_tipo_aporte, 2, value)));

	});

	html.find("#nuevo_producto_aporte").click(function(){
		var new_row = crearRow(select_tipo_aporte, id_tipo);
		new_row = $(new_row);
		html.find("#rows_aportes").append(new_row);
		$(window).trigger('resize');
	});


	return html;
}


function mostrarCantidadDisponibleAporte(id_tipo_aporte, id_centro_acopio, donde){
	var json = {json:"true", foo: "get_cantidad_aporte", args: {id_tipo_aporte: id_tipo_aporte, id_centro_acopio: id_centro_acopio}};
	console.log(json);
	$.get(root+"/control/aporte/get_aporte_db.php", json, function(data){
		
		console.log(data);
		$(donde).val(data[0]);
		
	},"json").fail(function(e){
		console.log(e.responseText);
		$(this).attr("disabled", false);
	});
}
