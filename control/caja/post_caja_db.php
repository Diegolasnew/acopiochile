<?php 
session_start();
if (!isset($_SESSION["usuario"])){
	die("VE A MOLESTAR A OTRO SITIO!");
}


function mod_caja($datos){
	global $database;

	$id_caja = $datos['id_caja'];
	$lista_aportes = $datos['lista_aportes'];
	unset($datos['id_caja']);
	unset($datos['lista_aportes']);

	if($id_caja == 0){
		$id_caja = $database->insert('caja', $datos);
	}
	else{
		$database->update('caja', $datos, array('id_caja'=>$id_caja));
		$database->delete('aportes_caja', array('id_caja' => $id_caja));
	}

	foreach ($lista_aportes as $key => $value) {
		$lista_aportes[$key]['id_caja'] = $id_caja;
	}
	$database->insert('aportes_caja', $lista_aportes);

	return array($id_caja, $database->error());
}

function mod_caja_familiar($datos){
	date_default_timezone_set('America/Santiago');
	global $database;
	$id_caja_familia = $datos['id_caja_familia'];
	$lista_aportes = $datos['lista_aportes'];
	unset($datos['id_caja_familia']);
	unset($datos['lista_aportes']);
	$aditivo = $datos['id_estado_caja_familia']==1 ? '[+]' : '[-]';
	$restativo = $datos['id_estado_caja_familia']==1 ? '[-]' : '[+]';

	if($datos['id_estado_caja_familia'] != 2){
		$database->update('caja', array('cantidad_caja'.$aditivo => 1), array('id_caja'=>$datos['id_caja']));
	}

	

	if($id_caja_familia == 0){
		$fecha = date("Y-m-d H:i:s");
		$datos["fecha_creacion"] = $fecha;
		$id_caja_familia = $database->insert('caja_familia', $datos);
	}
	else{
		$database->update('caja_familia', $datos, array('id_caja_familia'=>$id_caja_familia));


		$aportes_antiguos = $database->select('aportes_caja_familia', "*", array('id_caja_familia' => $id_caja_familia));
		foreach ($aportes_antiguos as $key => $value) {
			$database->update('aporte', array('cantidad_aporte[+]' => $value['cantidad_aporte_familia']), 
				array(
					'AND'=>array(
						'id_tipo_aporte'=>$value['id_tipo_aporte'],
						'id_centro_acopio' => $datos['id_centro_acopio']
						)
					)
				);
		}

		$database->delete('aportes_caja_familia', array('id_caja_familia' => $id_caja_familia));
	}

	foreach ($lista_aportes as $key => $value) {
		$lista_aportes[$key]['id_caja_familia'] = $id_caja_familia;
		if($datos['id_estado_caja_familia'] != 3){
			$database->update('aporte', array('cantidad_aporte[-]' => $value['cantidad_aporte_familia']), 
				array(
					'AND'=>array(
						'id_tipo_aporte'=>$value['id_tipo_aporte'],
						'id_centro_acopio' => $datos['id_centro_acopio']
						)
					)
				);
		}
	}

	$database->insert('aportes_caja_familia', $lista_aportes);

	return array($id_caja_familia, $database->error());

	
	return $datos;
}

function cambiar_caja($id_caja){
	global $database;
	$_SESSION['usuario']['id_caja'] = $id_caja;
	
	$database->update('usuario', array('id_caja' => $id_caja), array('id_usuario' => $_SESSION['usuario']['id_usuario']));

	return $id_caja;
}

if (isset($_POST["json"])) {
	require_once "../../tools/medoo.min.php";
	$database = new medoo();
	echo json_encode(call_user_func_array($_POST["foo"],array($_POST["args"])));
}
?>