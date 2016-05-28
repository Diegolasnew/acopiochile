
<div class="page-header">
	<h1>
	Almacén
	<small>
		<i class="ace-icon fa fa-angle-double-right"></i>
		Centro de Acopio: <b id="nombre_centro_acopio"></b>
	</small>
	</h1>
</div>
<div class="row">
		<div class="col-xs-12">
			<a id="nuevo_aporte" class="btn btn-success" data='1' /><i class="fa fa-plus-circle" aria-hidden="true"></i> Nuevo Aporte</a>
			<a id="nueva_merma" class="btn btn-warning" data='2'/><i class="fa fa-trash" aria-hidden="true"></i> Registrar Merma </a>
			<a id="movimientos" class="btn btn-info" /><i class="fa fa-retweet" aria-hidden="true"></i> Ver Movimientos </a>
		</div>
		<div id="lista_productos">
			<?php crear_contenido_almacen($categoria_aporte) ?>
		</div>
</div>
<?php echo $select_comunas ?>

