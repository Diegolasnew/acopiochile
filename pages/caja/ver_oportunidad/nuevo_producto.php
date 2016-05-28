<?php 
array_shift($elements);
////////////////////CONTROL DE URL/////////////////////////
if(!isset($elements[0])){//////SI LA URLE ES nimanga.com/manga/onepiece/c33
	mostrar404();
}
else{
$id_cliente = array_shift($elements);
$page_title = "Mercadia Cliente";
$include_css = requireToVar("pages/cliente/ver_cliente/ver_cliente_css.php");
$include_js = requireToVar("pages/cliente/ver_cliente/ver_cliente_js.php");
$menu_min = ""; ///para que el sidebar se vea pequeño poner "menu-min"

//////////////LAYOUT Y CONTENIDO////////////////
require_once "theme/theme_init.php";

require_once "pages/cliente/ver_cliente/ver_cliente_view.php";

require_once "theme/theme_end.php";
}

?>