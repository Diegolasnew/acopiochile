<div class="page-content">
	<div class="page-header">
		<h1>
		Nuevo Producto
		</h1>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<form class="form-horizontal" id="nuevo_producto_form" role="form">
				<!-- #section:elements.form -->
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre </label>

					<div class="col-sm-9">
						<input type="text" id="nombre_pro" name="nombre_pro" placeholder="Nombre del Producto" class="col-xs-10 col-sm-5" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Precio </label>

					<div class="col-sm-9">
						<input type="number" id="precio_pro" name="precio_pro" placeholder="Precio" class="col-xs-10 col-sm-5" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Stock </label>

					<div class="col-sm-9">
						<input type="number" id="stock_pro" name="stock_pro" placeholder="Cantidad" class="col-xs-10 col-sm-5" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Descripción </label>

					<div class="col-sm-9">
						<input type="text" id="descripcion_pro" name="descripcion_pro" placeholder="Descripción" class="col-xs-10 col-sm-5" />
					</div>
				</div>
				<div class="clearfix form-actions">
					<div class="col-md-offset-3 col-md-9">
						<button id="crear" class="btn btn-info" type="button">
							<i class="ace-icon fa fa-check bigger-110"></i>
							Crear
						</button>

						&nbsp; &nbsp; &nbsp;
						<button class="btn" type="reset">
							<i class="ace-icon fa fa-undo bigger-110"></i>
							Reiniciar
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>