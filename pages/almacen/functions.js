

function crear_aporte(id_tipo_lista, select_tipo_aporte){
	var titulo = (id_tipo_lista==1 ? "Nuevo Aporte" : "Nueva Merma");
	var tipo = (id_tipo_lista==1 ? "Aporte" : "Merma");

	var html = '\
	<h3 class="header smaller lighter blue">'+titulo+'</h3>	\
	<div class="row">\
		<div class="col-xs-12">\
			<form class="form-horizontal" role="form">\
				<div class="form-group">\
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Detalle </label>\
					<div class="col-sm-10">\
						<textarea type="text" id="detalle_lista" name="detalle_lista" placeholder="Descripción general" class="col-xs-10 col-sm-10"></textarea>\
					</div>\
				</div>\
			</form>\
		</div>\
		<div class="col-xs-12">\
			<table class="table table-striped table-bordered table-hover">\
				<thead>\
					<tr>\
						<th width="70%" >Nombre '+tipo+'</th>\
						<th>Cantidad</th>\
						<th></th>\
					</tr>\
				</thead>\
				<tbody id="rows_aportes">\
					<tr>\
						<td><select style="width: 100%" id="id_tipo_aporte">'+select_tipo_aporte.html()+'</select> </td>\
						<td><input id="cantidad_aportes_lista" type="number" value=0 /> </td>\
						<td><a id="eliminar_row"><i class="fa fa-times" aria-hidden="true"></i></a></td>\
					</tr>\
				</tbody>\
			</table>\
			\<button id="nuevo_producto_aporte" class="btn btn-primary pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>\
		</div>\
	</div>';
	html = $(html);
	html.find("#eliminar_row").click(function(){
		$(this).parent().parent().remove();
	});
	html.find('select').chosen({
	    allow_single_deselect: true
	})
	html.find("#nuevo_producto_aporte").click(function(){
		var new_row = '\
			<tr>\
				<td><select id="id_tipo_aporte">'+select_tipo_aporte.html()+'</select></td>\
				<td><input id="cantidad_aportes_lista" type="number" value=0 /> </td>\
				<td><a id="eliminar_row"><i class="fa fa-times" aria-hidden="true"></i></a></td>\
			</tr>';
		new_row = $(new_row);
		new_row.find("#eliminar_row").click(function(){
			$(this).parent().parent().remove();
		});
		new_row.find('select').chosen({
		    allow_single_deselect: true
		});
		html.find("#rows_aportes").append(new_row);
		$(window).trigger('resize');
	});

	return html;
}

function crear_ingreso_simple(){
	var html ='\
	<div class="page-header">\
	<h3 class="header smaller lighter blue">Información de aporte</h3>	\
	</div>\
	<div class="row">\
		<div class="col-xs-12">\
			Próximamente\
		</div>\
	</div>';
	
	return html;

}