<?php
session_start();
if (!isset($_SESSION["usuario"])){
	die("VE A MOLESTAR A OTRO SITIO!");
}


function get_regiones(){
	global $database;
	return $database->select('region', '*', array());
}

function get_provincias($id_region = false){
	global $database;
	$where = array();
	if($id_region){
		$where['AND'] = array('id_region' => $id_region);
	}

	$comunas = $database->select("provincia", "*", $where);
	return $comunas;
}

function get_comunas($id_region = false, $id_provincia = false){
	global $database;
	$join = false;
	$where = array();
	$cols = '*';

	if($id_region){
		$join = array(
			'[>]provincia' =>'id_provincia',
			'[>]region' => 'id_region'
			);
		$where = array('region.id_region' => $id_region);
		$cols = array('id_comuna', 'COMUNA_NOMBRE');
	}
	elseif($id_provincia){
		$where['AND'] = array('id_provincia' => $id_provincia);
	}

	if($join){
		$comunas = $database->select("comuna",$join, $cols, $where);
	}
	else{
		$comunas = $database->select("comuna", $cols, $where);	
	}		

	return $comunas;
}


if (isset($_GET["json"])) {
	require_once "../../tools/medoo.min.php";
	$database = new medoo();
	echo json_encode(call_user_func_array($_GET["foo"],$_GET["args"]));
}
?>