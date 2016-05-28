<?php 
$page_title .= " Login";
$include_css = requireToVar("pages/login/login_css.php");
$include_js = requireToVar("pages/login/login_js.php");
//$idioma_js= $dir."/idiomas/orden/".$idioma.".js";
$menu_min = ""; ///para que el sidebar se vea pequeño poner "menu-min"

//////////////LAYOUT Y CONTENIDO////////////////
//require_once "idiomas/orden/".$idioma.".php";
require_once "theme/theme_init.php";
require_once "pages/login/login_view.php";
require_once "theme/theme_end.php";

?>