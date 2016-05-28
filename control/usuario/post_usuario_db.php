<?php
session_start();
if (!isset($_SESSION["usuario"])){
	die("VE A MOLESTAR A OTRO SITIO!");
}
function createHash($username, $password){

	// A higher "cost" is more secure but consumes more processing power
	$cost = 10;

	// Create a random salt
	$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');

	// Prefix information about the hash so PHP knows how to verify it later.
	// "$2a$" Means we're using the Blowfish algorithm. The following two digits are the cost parameter.
	$salt = sprintf("$2a$%02d$", $cost) . $salt;

	// Value:
	// $2a$10$eImiTXuWVxfM37uY4JANjQ==

	// Hash the password with the salt
	return crypt($password, $salt);

}
function nombreValido($nick_usu){
	global $database;
	$s = $database->get("usuario", "nick_usu", array("nick_usu"=>$nick_usu));
	return $s==false;
}

function mod_usuario($datos){
	global $database;
	$id_usuario = $datos["id_usuario"];
	unset($datos["id_usuario"]);
	$usu = $datos["nick_usu"];

	$datos['id_region'] = $datos['id_region'] == 'NULL' ? null : $datos['id_region'];
	$datos['id_provincia'] = $datos['id_provincia'] == 'NULL' ? null : $datos['id_provincia'];
	$datos['id_comuna'] = $datos['id_comuna'] == 'NULL' ? null : $datos['id_comuna'];
	$datos['id_centro_acopio'] = $datos['id_centro_acopio'] == 'NULL' ? null : $datos['id_centro_acopio'];

	if(isset($datos["pass_usu"])){
		$pass = $datos["pass_usu"];		
		$hash = createHash($usu, $pass);
		$datos["hash"] = $hash;
		unset($datos["pass_usu"]);
	}
	
	

	
	if ($id_usuario == 0){
		if(!nombreValido($usu)){return false;}
		$id_usuario = $database->insert("usuario", $datos);
	}
	else{
		$database->update("usuario", $datos, array("id_usuario"=>$id_usuario));
	}


	return array($database->error(), $id_usuario, $database->last_query());
}

function update_usuario($datos){
	global $database;
	$id_usuario = $datos["id_usuario"];
	unset($datos["id_usuario"]);
	$usu = $datos["nick_usu"];

	if(isset($datos["pass_usu"])){
		$pass = $datos["pass_usu"];		
		$hash = createHash($usu, $pass);
		$datos["hash"] = $hash;
		echo json_encode($datos);
		unset($datos["pass_usu"]);
	}

	$database->update("usuario", $datos, array(
		"id_usuario"=>$id_usuario
		));

	return $database->error();
}


if (isset($_POST["json"])) {
	require_once "../../tools/medoo.min.php";
	$database = new medoo();
	echo json_encode(call_user_func_array($_POST["foo"],array($_POST["args"])));
}
?>