<?php
session_start();
if (!isset($_SESSION["usuario"])){
	die("VE A MOLESTAR A OTRO SITIO!");
}

function get_cajas($id_centro_acopio, $id_estado_caja = 1, $incluir_lista=true){
	global $database;
	$cajas = $database->select('caja', '*', 
		array(
			'AND' => array(
				'id_estado_caja' => $id_estado_caja,
				'id_centro_acopio' => $id_centro_acopio
				)
			)
		);

	return $cajas;
}

function get_aportes_caja($id_caja){
	global $database;
	return $database->select('aportes_caja', '*', array('id_caja' => $id_caja));
}

function get_caja_familia($id_caja_familia){
	global $database;
	$caja_familia = $database->get('caja_familia', '*', array('id_caja_familia' => $id_caja_familia));
	$caja_familia['aportes_caja_familia'] = $database->select('aportes_caja_familia', '*', array('id_caja_familia'=> $id_caja_familia));

	return $caja_familia;
}



if (isset($_GET["json"])) {
	require_once "../../tools/medoo.min.php";
	$database = new medoo();
	echo json_encode(call_user_func_array($_GET["foo"],$_GET["args"]));
}
?>