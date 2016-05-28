<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
if (isset($_SESSION['most_recent_activity']) && 
    (time() -   $_SESSION['most_recent_activity'] > 18000)) {
    //600 seconds = 10 minutes
    $_SESSION["usuario"] = null;
    session_destroy();   
    session_unset();      
}
$_SESSION['most_recent_activity'] = time();

$idioma = "ES_es";

$dir = "";
$page_title= "Acopio Chile";
$path = $_SERVER['DOCUMENT_ROOT'];
/////////////////////CONTROL DE URL////////////////////////
$init_url = ltrim($_SERVER['REQUEST_URI'], '/');    // Nos entrega el url entero
$elements = explode('/', $init_url);    
            // Separa el url en partes
if (isset($elements[0]) and $elements[0]=="acopiochile"){///////ESTO SOLO PARA EL LOCALHOST, NO OLVIDAR BORRAR EN EL SERVER///////////
    array_shift($elements);
    $dir="/acopiochile";
    $path.=$dir;
}


require_once "includes.php";


if($elements[sizeof($elements)-1]==""){///////ELIMINA EL ULTIMO "/" DE LA URL SI ES QUE LO TIENE
    array_pop($elements);
}


/*if($_SESSION["usuario"]!=null && $_SESSION["usuario"]["id_usuario"]!=1){
    $_SESSION["usuario"] = null;
    session_destroy();   
    session_unset(); 
    require_once "pages/mantencion/mantencion.php";
}*/

if(!$_SESSION["usuario"]){
    require_once "pages/login/login.php";
}
else{
    
    $nuevos_datos = actualizar_datos($_SESSION['usuario']['id_usuario']);

    $_SESSION['usuario']['nombre_usu'] = $nuevos_datos['nombre_usu'];
    $_SESSION['usuario']['nick_usu'] = $nuevos_datos['nick_usu'];
    $_SESSION['usuario']['nombre_rol_usu'] = $nuevos_datos['nombre_rol_usu'];
    $_SESSION['usuario']['id_rol_usuario'] = $nuevos_datos['id_rol_usuario'];
    $_SESSION['usuario']['id_centro_acopio'] = $nuevos_datos['id_centro_acopio'];
    $_SESSION['usuario']['id_region'] = $nuevos_datos['id_region'];
    $_SESSION['usuario']['id_provincia'] = $nuevos_datos['id_provincia'];
    $_SESSION['usuario']['id_comuna'] = $nuevos_datos['id_comuna'];
    

   if(sizeof($elements)==0){ /////////////MUESTRA EL HOME////////////
        require_once "pages/home/home.php";
    }
    else{
        switch($elements[0])//////////////redirecciona al contenido de la página//////////
        {
            case 'almacen':
                require_once "pages/almacen/almacen.php";
                break;
            case 'cajas':
                require_once "pages/caja/caja.php";
                break;
            case 'centros_acopio':
                require_once "pages/centro_acopio/centro_acopio.php";
                break;
            case 'categorias_aporte':
                require_once "pages/categoria_tipo_aporte/categoria_tipo_aporte.php";
                break;
            case 'tipo_aporte':
                require_once "pages/tipo_aporte/tipo_aporte.php";
                break;
            case 'usuarios':
                require_once "pages/usuario/usuario.php";
                break;
            case 'info':
                phpinfo();
                break;
            case 'salir':
                $_SESSION["usuario"] = null;
                session_destroy();   
                session_unset(); 
                header('Location: '.$dir.'/');
                break;
            default:
                mostrar404(); // MUESRA 404
                break;
        }
    } 
}

?>
