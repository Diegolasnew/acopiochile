<?php
session_start();
if (!isset($_SESSION["usuario"])){
	die("VE A MOLESTAR A OTRO SITIO!");
}

function get_tipo_aporte($id_tipo_aporte){
	global $database;
	return $database->get('tipo_aporte', '*', array('id_tipo_aporte'=>$id_tipo_aporte));
}

function get_tipos_aportes($estado_tipo_aporte=1){
	global $database;
	$tipos_aporte = $database->select('tipo_aporte', 
		array('[>]categoria_tipo_aporte' => 'id_categoria_tipo_aporte'),
		array('tipo_aporte.id_tipo_aporte', 'tipo_aporte.nombre_tipo_aporte', 'categoria_tipo_aporte.nombre_categoria_tipo_aporte'),
		array('estado_tipo_aporte' => $estado_tipo_aporte));

	return $tipos_aporte;
}



function get_categoria_tipo_aporte($id_categoria_tipo_aporte){
	global $database;
	return $database->get('categoria_tipo_aporte', '*', array('id_categoria_tipo_aporte'=>$id_categoria_tipo_aporte));
}

function get_categorias_tipo_aportes($incluir_tipo_aporte=true){
	global $database;
	$categorias = $database->select('categoria_tipo_aporte', '*', array());
	if($incluir_tipo_aporte){
		foreach ($categorias as $key => $value) {
			$tipos_aportes = $database->select('tipo_aporte', '*', array(
				'AND' =>array(
					'id_categoria_tipo_aporte' => $value['id_categoria_tipo_aporte'],
					'estado_tipo_aporte'=>1
					)
				));
			$categorias[$key]['tipos_aportes'] = $tipos_aportes;
		}	
	}

	return $categorias;
}

function get_datos_aportes($id_centro_acopio, $tipos_aportes){
	global $database;
	$respuesta = array();
	foreach ($tipos_aportes as $key => $value) {
		$respuesta[$value] = get_cantidad_aporte($value, $id_centro_acopio);
	}
	return $respuesta;
}

function get_cantidad_aporte($id_tipo_aporte, $id_centro_acopio){
	global $database;
	
	$cantidad = $database->select('aporte', 'cantidad_aporte', array(
			'AND'=>array(
				'id_tipo_aporte' => $id_tipo_aporte,
				'id_centro_acopio' => $id_centro_acopio)
			));
	if(!$cantidad){
		$cantidad = 0;
	}
	
	return $cantidad;
}

if (isset($_GET["json"])) {
	require_once "../../tools/medoo.min.php";
	$database = new medoo();
	echo json_encode(call_user_func_array($_GET["foo"],$_GET["args"]));
}
?>