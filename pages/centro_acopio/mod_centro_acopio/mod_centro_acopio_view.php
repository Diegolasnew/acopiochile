
	<div class="page-header">
		<h1>
		<?php echo $title ?>
		</h1>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<form class="form-horizontal" id="centro_acopio_form" role="form">
				<!-- #section:elements.form -->
				<div class="form-group hide">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ID </label>

					<div class="col-sm-9">
						<input type="number" id="id_centro_acopio" name="id_centro_acopio" value="<?php echo $centro_acopio ? $centro_acopio['id_centro_acopio'] : 0 ?>" class="col-xs-10 col-sm-5" readonly />
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre </label>

					<div class="col-sm-9">
						<input type="text" id="nombre_centro_acopio" name="nombre_centro_acopio" value="<?php echo $centro_acopio ? $centro_acopio['nombre_centro_acopio'] : '' ?>" placeholder="Nombre del centro de acopio" class="col-xs-10 col-sm-5" />
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Dirección </label>

					<div class="col-sm-9">
						<input type="text" id="direccion_centro_acopio" name="direccion_centro_acopio" value="<?php echo $centro_acopio ? $centro_acopio['direccion_centro_acopio'] : '' ?>" placeholder="Dirección del centro de acopio" class="col-xs-10 col-sm-5" />
					</div>
				</div>
				<div id="lab_comuna" class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Comuna </label>

					<div class="col-sm-9">
						<?php echo $select_comunas ?>
					</div>
				</div>
				
				<?php if ($centro_acopio) { ?>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Vigencia </label>

					<div class="col-sm-9">
						<select class="col-xs-10 col-sm-5" id="estado_centro_acopio" name="estado_centro_acopio" id="form-field-select-1">
							<option value="1" <?php echo $v ?>>vigente</option>
							<option value="0" <?php echo $nv ?>>no vigente</option>
						</select>
					</div>
				</div>

				<?php } ?>
				<div class="clearfix form-actions">
					<div class="col-md-offset-3 col-md-9">
						<button id="<?php echo $button ?>" class="btn btn-info" type="button">
							<i class="ace-icon fa fa-check bigger-110"></i>
							<?php echo $button ?>
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
