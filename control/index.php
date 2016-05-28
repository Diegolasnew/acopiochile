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
$page_title= "Ebisu";
$path = $_SERVER['DOCUMENT_ROOT'];
/////////////////////CONTROL DE URL////////////////////////
$init_url = ltrim($_SERVER['REQUEST_URI'], '/');    // Nos entrega el url entero
$elements = explode('/', $init_url);    
            // Separa el url en partes
if (isset($elements[0]) and $elements[0]=="ebisu"){///////ESTO SOLO PARA EL LOCALHOST, NO OLVIDAR BORRAR EN EL SERVER///////////
    array_shift($elements);
    $dir="/ebisu";
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
elseif(sizeof($elements)==0){ /////////////MUESTRA EL HOME////////////
    require_once "pages/home/home.php";
}
else{
    switch($elements[0])//////////////redirecciona al contenido de la página//////////
    {
        case 'oportunidades':
            require_once "pages/oportunidad/oportunidad.php";
            break;
        case 'negociaciones':
            require_once "pages/negociacion/negociacion.php";
            break;
        case 'POs':
            require_once "pages/po/po.php";
            break;
        case 'salir':
            $_SESSION["usuario"] = null;
            session_destroy();   
            session_unset(); 
            header('Location: '.$dir.'/');
            break;
        case 'info':
            phpinfo();
            break;
        default:
            mostrar404(); // MUESRA 404
            break;
    }
}
?>
