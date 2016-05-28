<?php 
$lugar = array_shift($elements);
////////////////////CONTROL DE URL/////////////////////////
if(isset($elements[0])){
	if ($elements[0]=="nuevo" or $elements[0]=="editar"){
		require_once "pages/centro_acopio/mod_centro_acopio/mod_centro_acopio.php";	
	}
	else{
		mostrar404();
	}
}
////////////////////MUESTRA EL CONTENIDO DE nimanga.com/manga   ///////////////
else{

///////////////OPCIONES E INCLUDES///////////////
$page_title .= "";
$include_css = requireToVar("pages/centro_acopio/centro_acopio_css.php");
$include_js = requireToVar("pages/centro_acopio/centro_acopio_js.php");
//$idioma_js= $dir."/idiomas/centro_acopio/".$idioma.".js";
$menu_min = ""; ///para que el sidebar se vea pequeño poner "menu-min"

require_once "control/centro_acopio/get_centro_acopio_db.php";

$centro_acopios = get_centros_acopio($_SESSION['usuario']['id_region'], $_SESSION['usuario']['id_provincia'], $_SESSION['usuario']['id_comuna'], $_SESSION['usuario']['id_centro_acopio'], true);
$col = array(
	"ID"=>"id_centro_acopio",
	"Nombre"=>"nombre_centro_acopio",
	"Dirección"=>"direccion_centro_acopio",
	"Comuna"=>"COMUNA_NOMBRE"
	);
$acciones = array(
	"pencil"=> array("/".$lugar."/editar/", "btn-success")
	);
$table = createTable("centro_acopio", $centro_acopios, $col, $acciones);



//////////////LAYOUT Y CONTENIDO////////////////
//require_once "idiomas/centro_acopio/".$idioma.".php";
require_once "theme/theme_init.php";
require_once "pages/centro_acopio/centro_acopio_view.php";
require_once "theme/theme_end.php";

}


?>