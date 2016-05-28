<?php 
array_shift($elements);
////////////////////CONTROL DE URL/////////////////////////
if(isset($elements[0])){//////SI LA URLE ES nimanga.com/manga/onepiece/c33
	mostrar404();
}
else{//////SI LA URL ES nimanga.com/manga/onepiece
///////////MUESTRA LOS CAPS DEL MANGA: nimaga.com/manga/nisekoi ///////////////
///////////////OPCIONES E INCLUDES///////////////
$page_title = "Terragenesis";
$include_css = requireToVar("pages/producto/nuevo_producto/nuevo_producto_css.php");
$include_js = requireToVar("pages/producto/nuevo_producto/nuevo_producto_js.php");
$menu_min = ""; ///para que el sidebar se vea pequeño poner "menu-min"

//////////////LAYOUT Y CONTENIDO////////////////
require_once "theme/theme_init.php";

require_once "pages/producto/nuevo_producto/nuevo_producto_view.php";

require_once "theme/theme_end.php";
}

?>