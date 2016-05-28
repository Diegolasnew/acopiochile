<?php 
session_start();
if (!isset($_SESSION["usuario"])){
	die("VE A MOLESTAR A OTRO SITIO!");
}


function mod_categoria_tipo_aporte($datos){
	global $database;

	$id_categoria_tipo_aporte = $datos['id_categoria_tipo_aporte'];
	unset($datos['id_categoria_tipo_aporte']);

	if($id_categoria_tipo_aporte == 0){
		$id_categoria_tipo_aporte = $database->insert('categoria_tipo_aporte', $datos);
	}
	else{
		$database->update('categoria_tipo_aporte', $datos, array('id_categoria_tipo_aporte'=>$id_categoria_tipo_aporte));
	}

	return array($id_categoria_tipo_aporte, $database->error());
}

function mod_tipo_aporte($datos){
	global $database;

	$id_tipo_aporte = $datos['id_tipo_aporte'];
	unset($datos['id_tipo_aporte']);

	if($id_tipo_aporte == 0){
		$id_tipo_aporte = $database->insert('tipo_aporte', $datos);
	}
	else{
		$database->update('tipo_aporte', $datos, array('id_tipo_aporte'=>$id_tipo_aporte));
	}

	return array($id_tipo_aporte, $database->error());
}

function cambiar_centro_acopio($id_centro_acopio){
	global $database;
	$_SESSION['usuario']['id_centro_acopio'] = $id_centro_acopio;
	
	$database->update('usuario', array('id_centro_acopio' => $id_centro_acopio), array('id_usuario' => $_SESSION['usuario']['id_usuario']));

	return $id_centro_acopio;
}

function ingresar_lista($datos){
	global $database;
	$lista_aportes = $datos['lista_aportes'];
	unset($datos['lista_aportes']);

	$id_usuario = $_SESSION["usuario"]["id_usuario"];
	$datos['id_usuario'] = $id_usuario;
	date_default_timezone_set('America/Santiago');
	$fecha = date("Y-m-d H:i:s");
	$datos["fecha_creacion"] = $fecha;

	$id_lista = $database->insert('lista', $datos);
	foreach ($lista_aportes as $key => $value) {
		$lista_aportes[$key]['id_lista_aporte'] = $id_lista;
	}

	foreach ($lista_aportes as $key => $value) {
		$database->insert('aportes_lista', $value);
		$aditivo = $datos['id_tipo_lista']==1 ? '[+]' : '[-]';

		$aportes = $database->select('aporte', 'id_aporte', array(
										'AND' => array(
											'id_tipo_aporte'=>$value['id_tipo_aporte'],
											'id_centro_acopio' => $datos['id_centro_acopio']
										)));
		
		if(sizeof($aportes)==0){
			$database->insert('aporte', array('id_tipo_aporte'=>$value['id_tipo_aporte'],'id_centro_acopio' => $datos['id_centro_acopio'], 'cantidad_aporte' => $value['cantidad_aportes_lista']));
		}
		else{
			$database->update('aporte', array('cantidad_aporte'.$aditivo => $value['cantidad_aportes_lista']),
							array( 'AND' => array(
											'id_tipo_aporte'=>$value['id_tipo_aporte'],
											'id_centro_acopio' => $datos['id_centro_acopio']
										)));	
		}
		
	}
	



	return $database->error();

}

if (isset($_POST["json"])) {
	require_once "../../tools/medoo.min.php";
	$database = new medoo();
	echo json_encode(call_user_func_array($_POST["foo"],array($_POST["args"])));
}
?>