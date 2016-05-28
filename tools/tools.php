<?php 
$zonas_spam = array("green");

function actualizar_datos($id_usuario){
	global $database;
	$valores = $database->get('usuario', array('[>]rol_usuario' => 'id_rol_usuario'), array('id_usuario','nombre_usu', 'nick_usu', 'nombre_rol_usu', 'id_rol_usuario', 'id_centro_acopio', 'id_region','id_provincia','id_comuna' ), array('id_usuario'=> $id_usuario) );

	
    return $valores;
}

function mostrar_oportunidad($tipo){
}


function mostrar404(){
	header('HTTP/1.1 404 Not Found');
	die();
}

function dateToHtml($date){
	$phpdate = strtotime( $date );
	$mysqldate = date( 'd/m/Y', $phpdate );
	return 	$mysqldate;
}

function dateTimeToHtml($date){
	$phpdate = strtotime( $date );
	$mysqldate = date( 'd/m/Y H:i:s', $phpdate );
	return 	$mysqldate;
}

function allowAccess($id_roles){
	$allowAccess = false;
	foreach ($id_roles as $key => $value) {
		if($value == $_SESSION["usuario"]["id_rol_usuario"]){
			$allowAccess = true;
		}
	}
	if(!$allowAccess){
		mostrar404();
	}
}

function requireToVar($file){
    ob_start();
    global $dir;
    require($file);
    return ob_get_clean();
}

function prepararEventos($eventos){
	$jsonE = array();
	foreach ($eventos as $key => $value) {
		# code...
	}
}

function crearClientesVendedor($clientes, $tipo){
	$div_cliente = "";
	if (isset($clientes)){
		foreach ($clientes as $key => $value) {
			$div_cliente.= '<div  class="external-event label-grey '.$tipo.'" data-class="'.$tipo.'" id_cliente="'.$value["id_cliente"].'">
							<i class="ace-icon fa fa-arrows"></i>
							'.$value["nombre_empresa"].'
						</div>';
		}
	}
	return $div_cliente;

}

function crearContactos($contactos){
	$tableB = "";
	foreach ($contactos as $key => $value) {
		$tableB.= '<tr><td><input id="nombre_cont" name="nombre_cont" value="'.$value["nombre_cont"].'"></td><td><input id="cargo_cont" name="cargo_cont" value="'.$value["cargo_cont"].'"></td><td><input id="rol_cont" name="rol_cont" value="'.$value["rol_cont"].'"></td><td><input id="telefonos_cont" name="telefonos_cont" value="'.$value["telefonos_cont"].'"></td><td><input id="email_cont" name="email_cont" value="'.$value["email_cont"].'"></td><td><button class="btn btn-minier btn-danger eliminar"><i class="fa fa-times"></i></button></td></tr>';	
	}
	return $tableB;
}

function crearCompetencia($competencia){
	$tableB = "";
	foreach ($competencia as $key => $value) {
		$tableB.= '<tr><td><input id="nombre_comp" name="nombre_comp" value="'.$value["nombre_comp"].'"></td><td><input id="descripcion_comp" value="'.$value["descripcion_comp"].'"></td><td><button class="btn btn-minier btn-danger" class="eliminar"><i class="fa fa-times"></i></button></td></tr>';	
	}
	return $tableB;
}

function createSelect($table, $name, $id_selected, $options,$class, $empty_field = false, $id_select=false, $multiple = false, $extra = "",$categoria=false){
	$mul = $multiple?'multiple="multiple" size="'.sizeof($id_selected).'"':'';
	$select = "<select ".$mul." id='". ($id_select?$id_select:"id_".$table)   ."' name='". ($id_select?$id_select:"id_".$table)   ."' class='$class' ".$extra.">";
	if ($empty_field){
		$select.="<option value=''>Seleccione...</option>";
	}

	foreach ($options as $key => $value) {
		if($categoria){
			$select.= '<optgroup label="'.$key.'">';
			foreach ($value as $key2 => $value2) {
				$selected = "";
				$selected = $id_selected==$value2["id_".$table] ? "selected" : "";
				$select.="<option value='".$value2["id_".$table]."'". $selected .">".$value2[$name]."</option>";
			}
			$select.= '</optgroup>';
		}
		else{
			$selected = "";
			if($multiple){
				foreach ($id_selected as $key2 => $value2) {
					if($value["id_".$table] == $value2["id_".$table]){
						$selected = "selected";
					}
				}
			}
			else{
				$selected = $id_selected==$value["id_".$table] ? "selected" : "";
			}
			$select.="<option value='".$value["id_".$table]."'". $selected .">".$value[$name]."</option>";
		}
		
	}
	$select.="</select>";

	return $select;
}


function createTable($id, $datos, $col, $acciones=false ,$class=""){
	global $dir;
	$table = "<table id='table_$id' class='table table-striped table-bordered table-hover $class'>";
	$table.= "<thead><tr>";
	foreach ($col as $key => $value) {
		$table.="<th>";
		$table.=$key;
		$table.="</th>";
	}
	if ($acciones){
		$table.="<th width='10%'>Acciones</th>";	
	}	

	$table.= "</tr></thead>";

	$table.= "<tbody>";

	if($datos){
		foreach ($datos as $key => $value) {
			$table.="<tr>";
			foreach ($col as $key2 => $value2) {
				$table.="<td>";
				$table.= $key2=="Fecha" ? dateToHtml($value[$value2]) : $value[$value2];
				$table.="</td>";
			}
			if ($acciones){
				$table.="<td>";
				foreach ($acciones as $key3 => $value3) {
					$table.="<a class='btn-xs btn ".$value3[1]."' href='".$dir.$value3[0].$value["id_".$id]."'><i class='menu-icon fa fa-".$key3."'></i></a> ";
				}
				$table.="</td>";
			}
			$table.="</tr>";
		}
	}

	$table.= "</tbody>";

	$table.="</table>";
	return $table;
}



?>