<?php 
array_shift($elements);
////////////////////CONTROL DE URL/////////////////////////
if(isset($elements[0])){
	if ($elements[0]=="nuevo" or $elements[0]=="editar"){
		require_once "pages/tipo_aporte/mod_tipo_aporte/mod_tipo_aporte.php";	
	}
	else{
		mostrar404();
	}
}
////////////////////MUESTRA EL CONTENIDO DE nimanga.com/manga   ///////////////
else{

///////////////OPCIONES E INCLUDES///////////////
$page_title .= "";
$include_css = requireToVar("pages/tipo_aporte/tipo_aporte_css.php");
$include_js = requireToVar("pages/tipo_aporte/tipo_aporte_js.php");

$menu_min = ""; ///para que el sidebar se vea pequeño poner "menu-min"

require_once "control/aporte/get_aporte_db.php";
$tipo_aportes = get_tipos_aportes();

$col = array(
	"ID"=>"id_tipo_aporte",
	"Nombre"=>"nombre_tipo_aporte",
	"Categoría"=>"nombre_categoria_tipo_aporte"
	);
$acciones = array(
	"pencil"=> array("/tipo_aporte/editar/", "btn-success")
	);
$table = createTable("tipo_aporte", $tipo_aportes, $col, $acciones);

//////////////LAYOUT Y CONTENIDO////////////////
//require_once "idiomas/tipo_aporte/".$idioma.".php";
require_once "theme/theme_init.php";
require_once "pages/tipo_aporte/tipo_aporte_view.php";
require_once "theme/theme_end.php";

}


?>