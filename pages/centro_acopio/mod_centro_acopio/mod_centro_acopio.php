<?php 
$accion = array_shift($elements);
////////////////////CONTROL DE URL/////////////////////////
if($accion=="nuevo" and isset($elements[0])){//////
	mostrar404();
}

$title = "Nuevo Centro de Acopio";
$button = "Crear";

$menu_min = ""; ///para que el sidebar se vea pequeño poner "menu-min"

require_once "control/lugar/get_lugar_db.php";
$comunas = get_comunas($_SESSION['usuario']['id_region'], $_SESSION['usuario']['id_provincia']);

if($accion=="editar"){
	$id_centro_acopio = array_shift($elements);
	if($id_centro_acopio){
		require_once "control/centro_acopio/get_centro_acopio_db.php";
		$centro_acopio = get_centro_acopio($id_centro_acopio);
		if (!$centro_acopio) {
			mostrar404();
		}
		$title = "Modificar Centro de Acopio";
		$button = "Modificar";

		$id_comuna_selected = $centro_acopio["id_comuna"];

		if ($centro_acopio["estado_centro_acopio"]=="1")
			$v = "selected";
		else
			$nv = "selected";
	}
	else{
		mostrar404();
	}
}

$include_css = requireToVar("pages/centro_acopio/mod_centro_acopio/mod_centro_acopio_css.php");
$include_js = requireToVar("pages/centro_acopio/mod_centro_acopio/mod_centro_acopio_js.php");

$select_comunas = createSelect("comuna", "COMUNA_NOMBRE",$id_comuna_selected, $comunas, "col-xs-10 col-sm-5 chosen-select" );

//////////////LAYOUT Y CONTENIDO////////////////
require_once "theme/theme_init.php";

require_once "pages/centro_acopio/mod_centro_acopio/mod_centro_acopio_view.php";

require_once "theme/theme_end.php";


?>