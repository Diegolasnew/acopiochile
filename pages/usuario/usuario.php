<?php 
$lugar = array_shift($elements);
////////////////////CONTROL DE URL/////////////////////////
if(isset($elements[0])){
	if ($elements[0]=="nuevo" or $elements[0]=="editar"){
		require_once "pages/usuario/mod_usuario/mod_usuario.php";	
	}
	else{
		mostrar404();
	}
}
////////////////////MUESTRA EL CONTENIDO DE nimanga.com/manga   ///////////////
else{

///////////////OPCIONES E INCLUDES///////////////
$page_title .= "";
$include_css = requireToVar("pages/usuario/usuario_css.php");
$include_js = requireToVar("pages/usuario/usuario_js.php");
//$idioma_js= $dir."/idiomas/usuario/".$idioma.".js";
$menu_min = ""; ///para que el sidebar se vea pequeño poner "menu-min"

require_once "control/usuario/get_usuario_db.php";




$usuarios = get_usuarios($_SESSION['usuario']);

$col = array(
	"ID"=>"id_usuario",
	"Nombre"=>"nombre_usu",
	"Tipo"=>"nombre_rol_usu",
	"Nick"=>"nick_usu",
	"Región"=>"REGION_NOMBRE",
	"Provincia"=>"PROVINCIA_NOMBRE",
	"Comuna"=>"COMUNA_NOMBRE",
	"Centro Acopio"=>"nombre_centro_acopio",
	);
$acciones = array(
	"pencil"=> array("/".$lugar."/editar/", "btn-success")
	);

$table = createTable("usuario", $usuarios, $col,$acciones);

//////////////LAYOUT Y CONTENIDO////////////////
//require_once "idiomas/usuario/".$idioma.".php";
require_once "theme/theme_init.php";
require_once "pages/usuario/usuario_view.php";
require_once "theme/theme_end.php";

}


?>