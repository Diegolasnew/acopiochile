<?php
$accion = array_shift($elements);
////////////////////CONTROL DE URL/////////////////////////
if($accion=="nuevo" and isset($elements[0])){//////
	mostrar404();
}

$page_title = "Ebisu - Fábrica";
$title = "Nueva Tipo Aporte";
$button = "Crear";
$menu_min = ""; ///para que el sidebar se vea pequeño poner "menu-min"

require_once "control/aporte/get_aporte_db.php";
$categorias = get_categorias_tipo_aportes(false);

if($accion=="editar"){
	$id_tipo_aporte = array_shift($elements);
	if($id_tipo_aporte){
		
		$tipo_aporte = get_tipo_aporte($id_tipo_aporte);
		if (!$tipo_aporte) {
			mostrar404();
		}
		$title = "Modificar Tipo Aporte";
		$button = "Modificar";

		$id_categoria_tipo_aporte_selected = $tipo_aporte["id_categoria_tipo_aporte"];

		if ($tipo_aporte["estado_tipo_aporte"]=="1")
			$v = "selected";
		else
			$nv = "selected";
	}
	else{
		mostrar404();
	}
}

$select_categorias = createSelect("categoria_tipo_aporte", "nombre_categoria_tipo_aporte",$id_categoria_tipo_aporte_selected, $categorias, "col-xs-10 col-sm-5 chosen-select" );



//////////////LAYOUT Y CONTENIDO////////////////
$include_css = requireToVar("pages/tipo_aporte/mod_tipo_aporte/mod_tipo_aporte_css.php");
$include_js = requireToVar("pages/tipo_aporte/mod_tipo_aporte/mod_tipo_aporte_js.php");

require_once "theme/theme_init.php";

require_once "pages/tipo_aporte/mod_tipo_aporte/mod_tipo_aporte_view.php";

require_once "theme/theme_end.php";

?>