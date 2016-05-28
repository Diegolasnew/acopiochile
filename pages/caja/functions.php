<?php 
function crear_contenido_cajas($cajas){

	foreach ($cajas as $key => $value) {
		?>
			<a title="<?php echo $value['descripcion_caja'] ?>" data="<?php echo $value['id_caja'] ?>" id="id_caja_<?php echo $value['id_caja'] ?>" class="btn btn-primary btn-app radius-4 tipo_caja">
				<i class="contador_caja ace-icon fa bigger-230"><?php echo $value['cantidad_caja'] ?></i>
				<?php echo $value['nombre_caja'] ?>
				<span class="ultimo_cambio_aporte badge badge-success">0</span>
			</a>
			
		<?php 
	}
}

?>