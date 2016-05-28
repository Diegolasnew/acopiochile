<?php
$accion = array_shift($elements);
////////////////////CONTROL DE URL/////////////////////////
if($accion=="nuevo" and isset($elements[0])){//////
	mostrar404();
}

$page_title = "Ebisu - Fábrica";
$title = "Nueva Categoría Aporte";
$button = "Crear";
$include_css = requireToVar("pages/categoria_tipo_aporte/mod_categoria_tipo_aporte/mod_categoria_tipo_aporte_css.php");
$include_js = requireToVar("pages/categoria_tipo_aporte/mod_categoria_tipo_aporte/mod_categoria_tipo_aporte_js.php");
$menu_min = ""; ///para que el sidebar se vea pequeño poner "menu-min"

if($accion=="editar"){
	$id_categoria_tipo_aporte = array_shift($elements);
	if($id_categoria_tipo_aporte){
		require_once "control/aporte/get_aporte_db.php";
		$categoria_tipo_aporte = get_categoria_tipo_aporte($id_categoria_tipo_aporte);
		if (!$categoria_tipo_aporte) {
			mostrar404();
		}
		$title = "Modificar Categoría Aporte";
		$button = "Modificar";
		if ($categoria_tipo_aporte["estado_categoria_tipo_aporte"]=="1")
			$v = "selected";
		else
			$nv = "selected";
	}
	else{
		mostrar404();
	}
}


//////////////LAYOUT Y CONTENIDO////////////////
require_once "theme/theme_init.php";

require_once "pages/categoria_tipo_aporte/mod_categoria_tipo_aporte/mod_categoria_tipo_aporte_view.php";

require_once "theme/theme_end.php";

?>