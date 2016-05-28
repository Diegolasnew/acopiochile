<?php 
session_start();
if (!isset($_SESSION["usuario"])){
	die("VE A MOLESTAR A OTRO SITIO!");
}


function mod_centro_acopio($datos){
	global $database;

	$id_centro_acopio = $datos['id_centro_acopio'];
	unset($datos['id_centro_acopio']);

	if($id_centro_acopio == 0){
		$id_centro_acopio = $database->insert('centro_acopio', $datos);
	}
	else{
		$database->update('centro_acopio', $datos, array('id_centro_acopio'=>$id_centro_acopio));
	}

	return array($id_centro_acopio, $database->error());
}

function cambiar_centro_acopio($id_centro_acopio){
	global $database;
	$centro_acopio = $database->get('centro_acopio', '*', array('id_centro_acopio' => $id_centro_acopio));

	$_SESSION['usuario']['centro_acopio'] = $centro_acopio;
	
	//$database->update('usuario', array('id_centro_acopio' => $id_centro_acopio), array('id_usuario' => $_SESSION['usuario']['id_usuario']));

	return $id_centro_acopio;
}

if (isset($_POST["json"])) {
	require_once "../../tools/medoo.min.php";
	$database = new medoo();
	echo json_encode(call_user_func_array($_POST["foo"],array($_POST["args"])));
}
?>