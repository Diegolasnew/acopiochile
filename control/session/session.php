<?php 
if(!function_exists('hash_equals'))
{
    function hash_equals($str1, $str2)
    {
        if(strlen($str1) != strlen($str2))
        {
            return false;
        }
        else
        {
            $res = $str1 ^ $str2;
            $ret = 0;
            for($i = strlen($res) - 1; $i >= 0; $i--)
            {
                $ret |= ord($res[$i]);
            }
            return !$ret;
        }
    }
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

function check($password, $hash){
	return hash_equals($hash, crypt($password, $hash));
}

function validate($nombre, $pass){
	global $database;
	$where = array('AND'=>array(
			'nick_usu'=>strtolower($nombre)
		));

	$cols = array('id_usuario', 'hash', 'id_region', 'id_provincia', 'id_comuna', 'id_centro_acopio');
	$usu = $database->get('usuario', $cols, $where);
	
	
	if($usu and check($pass, $usu['hash'])){
		session_start();
		unset($usu['hash']);

		$_SESSION['usuario'] = $usu;
		$centro_acopios = get_centros_acopio($_SESSION['usuario']['id_region'], $_SESSION['usuario']['id_provincia'], $_SESSION['usuario']['id_comuna'], $_SESSION['usuario']['id_centro_acopio'], true);
		$_SESSION['usuario']['centro_acopio'] = sizeof($centro_acopios) > 0 ? $centro_acopios[0] : false;
		return true;
	}
	
	return false;
}


if (isset($_GET['json'])) {
	require_once '../../tools/medoo.min.php';
	$database = new medoo();
	echo json_encode(call_user_func_array($_GET['foo'],$_GET['args']));
}


?>