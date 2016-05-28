<?php 
$accion = array_shift($elements);
////////////////////CONTROL DE URL/////////////////////////
if($accion=="nuevo" and isset($elements[0])){//////
	mostrar404();
}

$title = "Nuevo ".$tipo_usuario;
$button = "Crear";

$menu_min = ""; ///para que el sidebar se vea pequeño poner "menu-min"
$zona_selected = 1;

require_once "control/usuario/get_usuario_db.php";
require_once "control/lugar/get_lugar_db.php";
require_once "control/centro_acopio/get_centro_acopio_db.php";

$roles = get_roles_usuario();


$centros_acopio = get_centros_acopio($_SESSION['usuario']['id_region'], $_SESSION['usuario']['id_provincia'], $_SESSION['usuario']['id_comuna'], $_SESSION['usuario']['id_centro_acopio']);
$comunas = get_comunas($_SESSION['usuario']['id_region'], $_SESSION['usuario']['id_provincia']);
$provincias = get_provincias($_SESSION['usuario']['id_region']);
$regiones = get_regiones();


if($accion=="editar"){
	$id_usuario = array_shift($elements);
	if($id_usuario){
		$usuario = get_usuario($id_usuario);
		if (!$usuario) {
			mostrar404();
		}
		$title = "Modificar ".$tipo_usuario;
		$button = "Modificar";

		$id_rol_usuario_selected = $usuario["id_rol_usuario"];

		if ($usuario["estado_usu"]=="1")
			$v = "selected";
		else
			$nv = "selected";
	}
	else{
		mostrar404();
	}
}

$include_css = requireToVar("pages/usuario/mod_usuario/mod_usuario_css.php");
$include_js = requireToVar("pages/usuario/mod_usuario/mod_usuario_js.php");

//$select_zonas = createSelect("zona", "nombre_zona",$id_rol_usuario_selected, $zonas, "col-xs-10 col-sm-5" );
$select_roles = createSelect("rol_usuario", "nombre_rol_usu",$id_rol_usuario_selected, $roles, "col-xs-10 col-sm-5 " );
$select_comuna = createSelect("comuna", "COMUNA_NOMBRE",$id_comuna_selected, $comunas, "col-xs-10 col-sm-5 chosen-select" );
$select_provincia = createSelect("provincia", "PROVINCIA_NOMBRE",$id_provincia_selected, $provincias, "col-xs-10 col-sm-5 chosen-select" );
$select_region = createSelect("region", "REGION_NOMBRE",$id_region_selected, $regiones, "col-xs-10 col-sm-5 chosen-select" );
$select_centro_acopio = createSelect("centro_acopio", "nombre_centro_acopio",$id_centro_acopio_selected, $centros_acopio, "col-xs-10 col-sm-5 chosen-select" );

//////////////LAYOUT Y CONTENIDO////////////////
require_once "theme/theme_init.php";

require_once "pages/usuario/mod_usuario/mod_usuario_view.php";

require_once "theme/theme_end.php";


?>