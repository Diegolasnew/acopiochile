<?php 
array_shift($elements);
////////////////////CONTROL DE URL/////////////////////////
if(isset($elements[0])){
	if ($elements[0]=="nuevo" or $elements[0]=="editar"){
		require_once "pages/almacen/mod_almacen/mod_almacen.php";	
	}
	else{
		mostrar404();
	}
}
////////////////////MUESTRA EL CONTENIDO DE nimanga.com/manga   ///////////////
else{

///////////////OPCIONES E INCLUDES///////////////
$page_title .= "";
$include_css = requireToVar("pages/almacen/almacen_css.php");
$include_js = requireToVar("pages/almacen/almacen_js.php");
//$idioma_js= $dir."/idiomas/almacen/".$idioma.".js";
$menu_min = ""; ///para que el sidebar se vea pequeño poner "menu-min"

require_once 'pages/almacen/functions.php';
require_once 'control/aporte/get_aporte_db.php';
$categoria_aporte = get_categorias_tipo_aportes();


$tipos_aportes = array();
$cat_aporte_key = array();
foreach ($categoria_aporte as $key => $value) {
	$cat_aporte_key[$value['nombre_categoria_tipo_aporte']] = array();
	foreach ($value['tipos_aportes'] as $key2 => $value2) {
		array_push($tipos_aportes, array('id_tipo_aporte' => $value2['id_tipo_aporte'], 'nombre_tipo_aporte'=> $value2['nombre_tipo_aporte']));
		array_push($cat_aporte_key[$value['nombre_categoria_tipo_aporte']], array('id_tipo_aporte' => $value2['id_tipo_aporte'], 'nombre_tipo_aporte'=> $value2['nombre_tipo_aporte']));
	}
}



$select_comunas = createSelect("tipo_aporte", "nombre_tipo_aporte",-1, $cat_aporte_key, "col-xs-10 col-sm-5 chosen-select hide", false, 'select_tipo_aporte',false,'',true );

//////////////LAYOUT Y CONTENIDO////////////////
//require_once "idiomas/almacen/".$idioma.".php";
require_once "theme/theme_init.php";
require_once "pages/almacen/almacen_view.php";
require_once "theme/theme_end.php";

}


?>