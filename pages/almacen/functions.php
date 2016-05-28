<?php 
function crear_contenido_almacen($categorias){

	foreach ($categorias as $key => $value) {
		?>
		<div class="col-xs-12">
			<div class="row">
				<h3 class="header smaller lighter green"><?php echo $value['nombre_categoria_tipo_aporte'] ?></h3>
				<div class="col-xs-12 contenido-aportes">
					<?php foreach ($value['tipos_aportes'] as $key2 => $value2) { ?>
					<a  title="<?php echo $value2['descripcion_tipo_aporte'] ?>" id='id_aporte_<?php echo $value2['id_tipo_aporte'] ?>' data-id='<?php echo $value2['id_tipo_aporte'] ?>'  class="btn btn-primary btn-app radius-4 tipo_aporte">
						<i class="contador_aporte ace-icon fa bigger-230">0</i>
						<?php echo $value2['nombre_tipo_aporte'] ?>
						<span class="ultimo_cambio_aporte badge badge-success">0</span>
					</a>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php 
	}
}

?>