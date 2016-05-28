<?php 
array_shift($elements);
////////////////////CONTROL DE URL/////////////////////////
if(isset($elements[0])){
	if ($elements[0]=="nuevo" or $elements[0]=="editar"){
		require_once "pages/caja/mod_caja/mod_caja.php";	
	}
	else{
		mostrar404();
	}
}
////////////////////MUESTRA EL CONTENIDO DE nimanga.com/manga   ///////////////
else{

///////////////OPCIONES E INCLUDES///////////////
$page_title .= "";
//$idioma_js= $dir."/idiomas/caja/".$idioma.".js";
$menu_min = ""; ///para que el sidebar se vea pequeño poner "menu-min"

require_once 'pages/caja/functions.php';
require_once 'control/aporte/get_aporte_db.php';

require_once 'control/caja/get_caja_db.php';
$categoria_aporte = get_categorias_tipo_aportes();
$cajas = get_cajas($_SESSION['usuario']['centro_acopio']['id_centro_acopio']);
$aportes_cajas_json = array();
foreach ($cajas as $key => $value) {
	$aportes_cajas_json[$value['id_caja']] = get_aportes_caja($value['id_caja']);
}

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

$pos = array();

$col = array(
	"ID"=>"id_po",
	"Rut Destinatario"=>"id_po",
	"Nombre Destinatario"=>"id_po",
	"Creada"=>"id_po",
	"Entregada"=>"id_po",
	"Tipo Caja"=>"nombre_pro",
	"Accion"=>"nombre_pro"
	);

$table1 = createTable("cajas_pendientes", $pos, $col);
$table2 = createTable("cajas_entregadas", $pos, $col);

//////////////LAYOUT Y CONTENIDO////////////////
//require_once "idiomas/caja/".$idioma.".php";

$include_css = requireToVar("pages/caja/caja_css.php");
$include_js = requireToVar("pages/caja/caja_js.php");

require_once "theme/theme_init.php";
require_once "pages/caja/caja_view.php";
require_once "theme/theme_end.php";

}


?>