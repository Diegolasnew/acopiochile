<?php
session_start();
if (!isset($_SESSION["usuario"])){
	die("VE A MOLESTAR A OTRO SITIO!");
}

function get_usuarios($usuario, $estado_usu=1){
	global $database;
	$id_rol_usuario = $usuario['id_rol_usuario'];

	$join = array(
		'[>]region' => 'id_region',
		'[>]provincia' => 'id_provincia',
		'[>]comuna' => 'id_comuna',
		'[>]centro_acopio' => 'id_centro_acopio',
		'[>]rol_usuario' => 'id_rol_usuario'
		);
	$cols = array(
		'usuario.id_usuario',
		'usuario.nombre_usu',
		'usuario.nick_usu',
		'region.REGION_NOMBRE',
		'provincia.PROVINCIA_NOMBRE',
		'comuna.COMUNA_NOMBRE',
		'centro_acopio.nombre_centro_acopio',
		'rol_usuario.nombre_rol_usu'
		);

	$where = array();
	$datos = array();

	if($id_rol_usuario==1){
		$datos = $database->select('usuario', $join, $cols, array('estado_usu' => 1));
	}
	elseif ($id_rol_usuario==2) {
		$provincias = $database->select('provincia', '*', array('id_region' => $usuario['id_region']));
		foreach ($provincias as $key => $provincia) {
			$usuarios = $database->select('usuario', array('id_usuario', 'nombre_usu', 'nick_usu'), array('AND' => array('id_provincia' => $provincia['id_provincia'], 'estado_usu' => 1)));
			foreach ($usuarios as $key2 => $usuario) {
				$usuario['PROVINCIA_NOMBRE'] = $provincia['PROVINCIA_NOMBRE'];
				array_push($datos, $usuario);
			}
			$comunas = $database->select('comuna', '*', array('id_provincia' => $provincia['id_provincia']));
			foreach ($comunas as $key3 => $comuna) {
				$usuarios = $database->select('usuario', array('id_usuario', 'nombre_usu', 'nick_usu'), array('AND' => array('id_comuna' => $comuna['id_comuna'], 'estado_usu'=>1)));
				foreach ($usuarios as $key2 => $usuario) {
					$usuario['COMUNA_NOMBRE'] = $comuna['COMUNA_NOMBRE'];
					array_push($datos, $usuario);
				}
				$centros_acopios = $database->select('centro_acopio', '*', array('id_comuna' => $comuna['id_comuna']));
				foreach ($centros_acopios as $key => $centro_acopio) {
					$usuarios = $database->select('usuario', array('id_usuario', 'nombre_usu', 'nick_usu'), array('AND' => array('id_centro_acopio' => $centro_acopio['id_centro_acopio'], 'estado_usu'=>1)));
					foreach ($usuarios as $key2 => $usuario) {
						$usuario['nombre_centro_acopio'] = $centro_acopio['nombre_centro_acopio'];
						array_push($datos, $usuario);
					}
				}
			}
		}
	}
	elseif ($id_rol_usuario==3) {
		$comunas = $database->select('comuna', '*', array('id_provincia' => $usuario['id_provincia']));
		foreach ($comunas as $key3 => $comuna) {
			$usuarios = $database->select('usuario', array('id_usuario', 'nombre_usu', 'nick_usu'), array('AND' => array('id_comuna' => $comuna['id_comuna'], 'estado_usu'=>1)));
			foreach ($usuarios as $key2 => $usuario) {
				$usuario['COMUNA_NOMBRE'] = $comuna['COMUNA_NOMBRE'];
				array_push($datos, $usuario);
			}
			$centros_acopios = $database->select('centro_acopio', '*', array('id_comuna' => $comuna['id_comuna']));
			foreach ($centros_acopios as $key => $centro_acopio) {
				$usuarios = $database->select('usuario', array('id_usuario', 'nombre_usu', 'nick_usu'), array('AND' => array('id_centro_acopio' => $centro_acopio['id_centro_acopio'], 'estado_usu'=>1)));
				foreach ($usuarios as $key2 => $usuario) {
					$usuario['nombre_centro_acopio'] = $centro_acopio['nombre_centro_acopio'];
					array_push($datos, $usuario);
				}
			}
		}
	}
	elseif ($id_rol_usuario==4) {
		$centros_acopios = $database->select('centro_acopio', '*', array('id_comuna' => $usuario['id_comuna']));
		foreach ($centros_acopios as $key => $centro_acopio) {
			$usuarios = $database->select('usuario', array('id_usuario', 'nombre_usu', 'nick_usu'), array('AND' => array('id_centro_acopio' => $centro_acopio['id_centro_acopio'], 'estado_usu'=>1)));
			foreach ($usuarios as $key2 => $usuario) {
				$usuario['nombre_centro_acopio'] = $centro_acopio['nombre_centro_acopio'];
				array_push($datos, $usuario);
			}
		}
	}
	elseif ($id_rol_usuario==5) {
		$usuarios = $database->select('usuario', array('id_usuario', 'nombre_usu', 'nick_usu'), array('AND' => array('id_centro_acopio' => $usuario['id_centro_acopio'], 'estado_usu'=>1)));
		foreach ($usuarios as $key2 => $usuario) {
			$usuario['nombre_centro_acopio'] = $centro_acopio['nombre_centro_acopio'];
			array_push($datos, $usuario);
		}
	}
	elseif ($id_rol_usuario==6) {
		return array();
	}

	$where['AND']['estado_usu'] = $estado_usu;
	
	return $datos;
}

function get_usuario($id_usuario){
	global $database;
	$usuario = $database->get("usuario", "*", array("id_usuario"=>$id_usuario));
	return $usuario;
}

function get_nombre_usuario($id_usuario){
	global $database;
	$usuario = $database->get("usuario", "nombre_usu", array("id_usuario"=>$id_usuario));
	return $usuario;
}

function nombreValido($nick_usu){
	global $database;
	$s = $database->get("usuario", "nick_usu", array("nick_usu"=>$nick_usu));
	return $s==false;
}

function getNombreValido($nombre, $count = ""){
	$nombres = explode(" ", $nombre);
	if(sizeof($nombres)==1){$nombres[1]=$nombres[0];}

	$minYear = $rest = substr(date("Y"), -2);
	$posibleNombre = $nombres[0][0].$nombres[1].$minYear.$count;
	$posibleNombre = strtolower($posibleNombre);
	if(nombreValido($posibleNombre)){
		return $posibleNombre;
	}
	else{
		$count+="b";
		return getNombreValido($nombre, $count);
	}
}

function get_roles_usuario(){
	global $database;
	return $database->select('rol_usuario', '*', array());
}


if (isset($_GET["json"])) {
	require_once "../../tools/medoo.min.php";
	$database = new medoo();
	echo json_encode(call_user_func_array($_GET["foo"],$_GET["args"]));
}
?>