
<div class="page-header">
	<h1>
	Cajas de ayuda
	<small>
		<i class="ace-icon fa fa-angle-double-right"></i>
		Centro de Acopio: <b id="nombre_centro_acopio"></b>
	</small>
	</h1>
</div>
<div class="row">
		<div class="col-xs-12">
			<a id="nueva_caja" class="btn btn-success" data='0' /><i class="fa fa-plus-circle" aria-hidden="true"></i> Nuevo tipo de Caja</a>
			
		</div>
		<div id="cajas_disponibles" class="col-xs-12">
			<h3 class="header smaller lighter green">Cajas Para Crear</h3>
			<?php crear_contenido_cajas($cajas); ?>	
		</div>
		<div id="cajas_pendientes" class="col-xs-12">
			<h3 class="header smaller lighter pink">Cajas Pendientes</h3>
			<?php echo $table1 ?>
		</div>
		<div id="cajas_pendientes" class="col-xs-12">
			<h3 class="header smaller lighter blue">Cajas Entregadas</h3>
			<?php echo $table2 ?>
		</div>
</div>


<?php echo $select_comunas ?>

