var select_tipo_aporte = $("#select_tipo_aporte");
$("#nombre_centro_acopio").text($("#cambiar_centro_acopio option:selected").text());


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
				if(value<=0)
					$("#id_aporte_"+key).removeClass('btn-primary').removeClass('btn-warning').removeClass('btn-danger');
				else if(value<50)
					$("#id_aporte_"+key).removeClass('btn-primary').removeClass('btn-warning').addClass('btn-danger');
				else if(value<100)
					$("#id_aporte_"+key).removeClass('btn-danger').removeClass('btn-primary').addClass('btn-warning');
				else
					$("#id_aporte_"+key).removeClass('btn-danger').removeClass('btn-warning').addClass('btn-primary');
				

				contador.text(value);
			});

			$(".contenido-aportes").each(function(index, value){
				$('.tipo_aporte').sort(function (a, b) {
					var contentA = parseInt( $(a).find('.contador_aporte').text() );
					var contentB = parseInt( $(b).find('.contador_aporte').text() );
					return (contentA > contentB) ? -1 : (contentA < contentB) ? 1 : 0;

			   	}).each(function (_, container) {
				  $(container).parent().append(container);
				})
			});
			

		},"json").fail(function(e){
			console.log(e.responseText);
			//alert('Error en la red.');
		});
}
actualizar_datos();
setInterval(actualizar_datos, 30000);

///////////////EVENTOS DE ALMACEN///////////////////////
$("#nuevo_aporte, #nueva_merma").click(function(){
	var id_tipo_lista = $(this).attr('data');

	var params = {
			message: crear_aporte(id_tipo_lista, select_tipo_aporte),
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
						var args = {"detalle_lista" : $('.modal-content').find('#detalle_lista').text(),
									lista_aportes: [],
									id_tipo_lista: id_tipo_lista,
									id_estado_lista: 1,
								 	id_centro_acopio: user.centro_acopio.id_centro_acopio};
						$('.modal-content').find('#rows_aportes tr').each(function(index, value){
							args.lista_aportes.push({id_tipo_aporte: $(this).find('#id_tipo_aporte').val(),
													 cantidad_aportes_lista: $(this).find('#cantidad_aportes_lista').val()});
						});

						var json = {json:"true", foo: "ingresar_lista", args: args};
						//se suben los datos
						$.post(root+"/control/aporte/post_aporte_db.php", json, function(data){
							if(data){
								console.log(data);
								actualizar_datos();
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

$("#lista_productos .btn-app").click(function(){
	var params = {
		message: crear_ingreso_simple(),
		buttons:
		{
			
			"success" :
			 {
				"label" : "Aceptar",
				"className" : "btn btn-success",
				"callback": function() {
					console.log("hola mundo");
				}
			}
		}
	};

	bootbox.dialog(params);
});