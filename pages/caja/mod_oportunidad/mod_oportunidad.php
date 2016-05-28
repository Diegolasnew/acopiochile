<?php 
$accion = array_shift($elements);
////////////////////CONTROL DE URL/////////////////////////
if($accion=="nuevo" and isset($elements[0])){//////
	mostrar404();
}
require_once "control/oportunidad/get_oportunidad_db.php";
require_once "control/cliente/get_cliente_db.php";
$title = "Nueva Oportunidad";
$button = "Crear";
$es_nuevo = true;
$menu_min = ""; ///para que el sidebar se vea pequeño poner "menu-min"
$participantes = array();
if($accion=="editar"){
	$id_oportunidad = array_shift($elements);
	if($id_oportunidad){
		$oportunidad = get_oportunidad($id_oportunidad);
		if (!$oportunidad) {
			mostrar404();
		}
		elseif ($oportunidad['id_etapa_oportunidad'] == 5  || $oportunidad['id_etapa_oportunidad'] == 4){
			mostrar404();
		}

		$es_nuevo = false;
		$id_usuario_asignado = $oportunidad["id_usuario_asignado"];
		$id_etapa_oportunidad = $oportunidad["id_etapa_oportunidad"];
		$id_cliente = $oportunidad["id_cliente"];
		$participantes = get_participantes_oportunidad($id_oportunidad);
		$title = "Modificar Oportunidad";
		$button = "Modificar";
		if ($oportunidad["estado_pro"]=="vigente")
			$v = "selected";
		else
			$v = "selected";
	}
	else{
		mostrar404();
	}
}


$clientes = get_clientes();
$etapas = getEtapasOportunidad();
$selectEtapas = createSelect("etapa_oportunidad", "nombre_etapa",$id_etapa_oportunidad, $etapas, "col-xs-10 col-sm-5", false, "id_etapa_oportunidad");
require_once "control/usuario/get_usuario_db.php";
$vendedores = get_usuarios();
$select_usuario_asignado = createSelect("usuario", "nombre_usu",$id_usuario_asignado, $vendedores, "chosen-select col-xs-10 col-sm-5", true, "id_usuario_asignado");

$select_participantes = createSelect("usuario", "nombre_usu", $participantes, $vendedores, "col-sm-3 control-label no-padding-top", false, "id_participantes", true );
$select_clientes = createSelect("cliente", "nombre_empresa",$id_cliente, $clientes, "chosen-select col-xs-10 col-sm-5", true, "id_cliente");

$include_css = requireToVar("pages/oportunidad/mod_oportunidad/mod_oportunidad_css.php");
$include_js = requireToVar("pages/oportunidad/mod_oportunidad/mod_oportunidad_js.php");

//////////////LAYOUT Y CONTENIDO////////////////
require_once "theme/theme_init.php";

require_once "pages/oportunidad/mod_oportunidad/mod_oportunidad_view.php";

require_once "theme/theme_end.php";


?>