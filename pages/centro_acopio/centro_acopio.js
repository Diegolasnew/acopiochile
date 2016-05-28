var oTable1 = 
	$('#table_centro_acopio').DataTable();

function editThis(element){
	var id_centro_acopio = $(element).parent().parent().find("td").html();
	window.location = root+"/centros_acopio/editar/"+id_centro_acopio;
}
function vewThis(element){
    var id_centro_acopio = $(element).parent().parent().find("td").html();
    window.location = root+"/centros_acopio/ver/"+id_centro_acopio;
}