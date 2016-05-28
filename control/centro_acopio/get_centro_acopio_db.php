<?php
session_start();
if (!isset($intentando_iniciar) && !isset($_SESSION["usuario"])){
	die("VE A MOLESTAR A OTRO SITIO!");
}

function get_centros_acopio($id_region = false, $id_provincia = false, $id_comuna = false, $id_centro_acopio = false, $extra = false){
	global $database;
	$join = array(
			'[>]comuna' => 'id_comuna'
		);
	$cols = array('id_centro_acopio', 'nombre_centro_acopio');
	if($extra){
		array_push($cols, 'id_comuna');
		array_push($cols, 'COMUNA_NOMBRE');
		array_push($cols, 'direccion_centro_acopio');
	}

	$where = array();
	$where['AND'] = array(
		'estado_centro_acopio' => 1
		);
	if($id_region){
		
		$join = array(
			'[>]comuna' => 'id_comuna',
			'[>]provincia' =>'id_provincia',
			'[>]region' => 'id_region'
		);
		
		$where['AND']['id_region'] = $id_region;
		
	}
	elseif ($id_provincia) {
		$join = array(
			'[>]comuna' => 'id_comuna',
			'[>]provincia' =>'id_provincia'
		);
		
		$where['AND']['id_provincia'] = $id_provincia;
	}
	elseif ($id_comuna) {
		$join = array(
			'[>]comuna' => 'id_comuna'
		);
		$where['AND']['id_comuna'] = $id_comuna;
	}
	elseif ($id_centro_acopio) {
		$join = array(
			'[>]comuna' => 'id_comuna'
		);
		$where['AND']['id_centro_acopio'] = $id_centro_acopio;
	}

	

	if($join){
		$crentos_acopio = $database->select('centro_acopio', $join ,$cols, $where);
	}
	else{
		$crentos_acopio = $database->select('centro_acopio', $cols, $where);
	}
	return $crentos_acopio;
}

function get_centro_acopio($id_centro_acopio){
	global $database;
	$centro_acopio = $database->get("centro_acopio", "*", array(
		'id_centro_acopio' => $id_centro_acopio
		));
	return $centro_acopio;
}


if (isset($_GET["json"])) {
	require_once "../../tools/medoo.min.php";
	$database = new medoo();
	echo json_encode(call_user_func_array($_GET["foo"],$_GET["args"]));
}
?>