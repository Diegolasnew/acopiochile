var select_tipo_aporte = $("#select_tipo_aporte");
$("#nombre_centro_acopio").text($("#cambiar_centro_acopio option:selected").text());

var tabla_pendientes = $('#table_cajas_pendientes').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": root+"/control/caja/server_processing_caja.php?id_estado_caja_familia=1&id_centro_acopio="+user.centro_acopio.id_centro_acopio,
        "columnDefs": [ {
            "targets": -1,
            "data": function(row){
            	return row;
            },
            "defaultContent": "<button  onclick='editThis(this,1)' class='btn btn-primary btn-xs'><i class='fa fa-eye '></i></button>"
        }]
    } );
var tabla_entregadas = $('#table_cajas_entregadas').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": root+"/control/caja/server_processing_caja.php?id_estado_caja_familia=2&id_centro_acopio="+user.centro_acopio.id_centro_acopio,
        "columnDefs": [ {
            "targets": -1,
            "data": function(row){
            	return row;
            },
            "defaultContent": "<button  onclick='editThis(this,2)' class='btn btn-primary btn-xs'><i class='fa fa-eye '></i></button>"
        }]
    } );

///////////////FUNCIONES ALMACEN//////////////
function actualizar_datos(){
	var args = {id_centro_acopio: user.centro_acopio.id_centro_acopio, tipos_aporte: []};
	$(".tipo_aporte").each(function(index, value){
		args.tipos_aporte.push($(this).attr('data-id'));
	});

	json = {json:"true", foo: "get_datos_aportes", args: args};

	///actualizar los datos//
	$.get(root+"/control/aporte/get_aporte_db.php", json, function(data){
			//console.log(data);
			$.each(data, function(key, value){
				var contador = $("#id_aporte_"+key).find(".contador_aporte");
				var ultimo_cambio_aporte = $("#id_aporte_"+key).find(".ultimo_cambio_aporte");
				if(parseInt(contador.text()) != value){
					var valor_agregado = value - parseInt(contador.text());
					if(valor_agregado > 0){
						valor_agregado = "+"+valor_agregado;
						ultimo_cambio_aporte.removeClass('badge-pink').addClass('badge-success');
					}else{
						ultimo_cambio_aporte.removeClass('badge-success').addClass('badge-pink');
					}

					ultimo_cambio_aporte.text(valor_agregado);
				}
				if(value<50)
					$("#id_aporte_"+key).removeClass('btn-primary').removeClass('btn-warning').addClass('btn-danger');
				else if(value<100)
					$("#id_aporte_"+key).removeClass('btn-danger').removeClass('btn-primary').addClass('btn-warning');
				else
					$("#id_aporte_"+key).removeClass('btn-danger').removeClass('btn-warning').addClass('btn-primary');
				

				contador.text(value);
			});

		},"json").fail(function(e){
			console.log(e.responseText);
			//alert('Error en la red.');
		});
}
/*actualizar_datos();
setInterval(actualizar_datos, 2000);*/

///////////////EVENTOS DE ALMACEN///////////////////////
$("#nueva_caja").click(function(){
	var params = {
			message: crear_caja(0, select_tipo_aporte,1), ///crear_caja viene de functions.js
			buttons:
			{
				"button" : {
					"label" : "<i class='fa fa-times' aria-hidden='true'></i> Cancelar",
					"className" : "btn btn-danger",
				},
				"success" :
				 {
					"label" : "<i class='fa fa-floppy-o' aria-hidden='true'></i> Guardar",
					"className" : "btn btn-primary",
					"callback": function() {
						var args = {id_caja : $('.modal-content').find('#id_caja').val(),
									nombre_caja : $('.modal-content').find('#nombre_caja').val(),
									descripcion_caja : $('.modal-content').find('#descripcion_caja').val(),
									lista_aportes: [],
									id_estado_caja: 1,
								 	id_centro_acopio: user.centro_acopio.id_centro_acopio};
						$('.modal-content').find('#rows_aportes tr').each(function(index, value){
							args.lista_aportes.push({id_tipo_aporte: $(this).find('#id_tipo_aporte').val(),
													 cantidad_aportes_caja: $(this).find('#cantidad_aportes_lista').val()});
						});

						var json = {json:"true", foo: "mod_caja", args: args};
						//se suben los datos
						$.post(root+"/control/caja/post_caja_db.php", json, function(data){
							if(data){
								console.log(data);
								location.reload();
							}
						},"json").fail(function(e){
							console.log(e.responseText);
							$(this).attr("disabled", false);
						});
						console.log(args);
					}
				}
			}
		};

	bootbox.dialog(params);
});


$(".tipo_caja").click(function(){
	var id_caja = $(this).attr('data');
	
	var params = {
			message: crear_caja(0, select_tipo_aporte,2,id_caja),
			buttons:
			{
				"button" : {
					"label" : "<i class='fa fa-times' aria-hidden='true'></i> Cancelar",
					"className" : "btn btn-danger",
				},
				"success" :
				 {
					"label" : "<i class='fa fa-floppy-o' aria-hidden='true'></i> Guardar",
					"className" : "btn btn-primary",
					"callback": function() {
						var args = {
									id_caja_familia : $('.modal-content').find('#id_caja').val(),
									rut_destinatario : $('.modal-content').find('#rut_destinatario').val(),
									nombre_destinatario : $('.modal-content').find('#nombre_destinatario').val(),
									lista_aportes: [],
									id_estado_caja_familia: 1,
									id_caja: id_caja,
								 	id_centro_acopio: user.centro_acopio.id_centro_acopio};
						$('.modal-content').find('#rows_aportes tr').each(function(index, value){
							args.lista_aportes.push({id_tipo_aporte: $(this).find('#id_tipo_aporte').val(),
													 cantidad_aporte_familia: $(this).find('#cantidad_aportes_lista').val()});
						});

						var json = {json:"true", foo: "mod_caja_familiar", args: args};
						//se suben los datos
						$.post(root+"/control/caja/post_caja_db.php", json, function(data){
							if(data){
								console.log(data);
								//tabla_pendientes.ajax.reload();
								location.reload();
							}
						},"json").fail(function(e){
							console.log(e.responseText);
							$(this).attr("disabled", false);
						});
						console.log(args);
					}
				}
			}
		};

	bootbox.dialog(params);
});

function editThis(element, modo){
	var id_caja_familia = $(element).parent().parent().find("td").html();

	var json = {json:"true", foo: "get_caja_familia", args: {id_caja_familia, id_caja_familia}};
	$.get(root+"/control/caja/get_caja_db.php", json, function(data){
		
		var params = {
			message: crear_vista_caja_familiar(1, data,select_tipo_aporte),
			buttons:
			{
				"button" : {
					"label" : "<i class='fa fa-times' aria-hidden='true'></i> Cancelar",
					"className" : "btn btn-danger",
				},
				"borrar" :
				 {
					"label" : "<i class='fa fa-trash' aria-hidden='true'></i> Eliminar",
					"className" : "btn btn-warning",
					"callback": function() {
						var args = {
									id_caja_familia : $('.modal-content').find('#id_caja_familia').val(),
									rut_destinatario : $('.modal-content').find('#rut_destinatario').val(),
									nombre_destinatario : $('.modal-content').find('#nombre_destinatario').val(),
									lista_aportes: [],
									id_estado_caja_familia: 3,
									id_caja: $('.modal-content').find('#id_caja').val(),
								 	id_centro_acopio: user.centro_acopio.id_centro_acopio};
						$('.modal-content').find('#rows_aportes tr').each(function(index, value){
							args.lista_aportes.push({id_tipo_aporte: $(this).find('#id_tipo_aporte').val(),
													 cantidad_aporte_familia: $(this).find('#cantidad_aportes_lista').val()});
						});

						var json = {json:"true", foo: "mod_caja_familiar", args: args};
						//se suben los datos
						$.post(root+"/control/caja/post_caja_db.php", json, function(data){
							if(data){
								console.log(data);
								tabla_pendientes.ajax.reload();
								tabla_entregadas.ajax.reload();
								//location.reload();
							}
						},"json").fail(function(e){
							console.log(e.responseText);
							$(this).attr("disabled", false);
						});
						console.log(args);
					}
				},
				"save" :
				 {
					"label" : "<i class='fa fa-floppy-o' aria-hidden='true'></i> Guardar",
					"className" : "btn btn-primary",
					"callback": function() {
						var args = {
									id_caja_familia : $('.modal-content').find('#id_caja_familia').val(),
									rut_destinatario : $('.modal-content').find('#rut_destinatario').val(),
									nombre_destinatario : $('.modal-content').find('#nombre_destinatario').val(),
									lista_aportes: [],
									id_estado_caja_familia: 1,
									id_caja: $('.modal-content').find('#id_caja').val(),
								 	id_centro_acopio: user.centro_acopio.id_centro_acopio};
						$('.modal-content').find('#rows_aportes tr').each(function(index, value){
							args.lista_aportes.push({id_tipo_aporte: $(this).find('#id_tipo_aporte').val(),
													 cantidad_aporte_familia: $(this).find('#cantidad_aportes_lista').val()});
						});

						var json = {json:"true", foo: "mod_caja_familiar", args: args};
						//se suben los datos
						$.post(root+"/control/caja/post_caja_db.php", json, function(data){
							if(data){
								console.log(data);
								tabla_pendientes.ajax.reload();
								tabla_entregadas.ajax.reload();
								//location.reload();
							}
						},"json").fail(function(e){
							console.log(e.responseText);
							$(this).attr("disabled", false);
						});
						console.log(args);
					}
				},
				"success" :
				 {
					"label" : "<i class='fa fa-share-square' aria-hidden='true'></i> Entregar",
					"className" : "btn btn-success",
					"callback": function() {
						var args = {
									id_caja_familia : $('.modal-content').find('#id_caja_familia').val(),
									rut_destinatario : $('.modal-content').find('#rut_destinatario').val(),
									nombre_destinatario : $('.modal-content').find('#nombre_destinatario').val(),
									lista_aportes: [],
									id_estado_caja_familia: 2,
									id_caja: $('.modal-content').find('#id_caja').val(),
								 	id_centro_acopio: user.centro_acopio.id_centro_acopio};
						$('.modal-content').find('#rows_aportes tr').each(function(index, value){
							args.lista_aportes.push({id_tipo_aporte: $(this).find('#id_tipo_aporte').val(),
													 cantidad_aporte_familia: $(this).find('#cantidad_aportes_lista').val()});
						});

						var json = {json:"true", foo: "mod_caja_familiar", args: args};
						//se suben los datos
						$.post(root+"/control/caja/post_caja_db.php", json, function(data){
							if(data){
								console.log(data);
								tabla_pendientes.ajax.reload();
								tabla_entregadas.ajax.reload();
								//location.reload();
							}
						},"json").fail(function(e){
							console.log(e.responseText);
							$(this).attr("disabled", false);
						});
						console.log(args);
					}
				}

			}
		};

		if(modo==2){
			delete params.buttons.save;
			delete params.buttons.success;
		}
		bootbox.dialog(params);
	},"json").fail(function(e){
		console.log(e.responseText);
		$(this).attr("disabled", false);
	});


	/**/

}