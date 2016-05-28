<div class="page-content">
	<div class="page-header">
		<h1>
		<?php echo $title ?>
		</h1>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<form class="form-horizontal" id="tipo_aporte_form" role="form">
				<!-- #section:elements.form -->
				<div class="form-group hide">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ID </label>

					<div class="col-sm-9">
						<input type="text" id="id_tipo_aporte" name="id_tipo_aporte" value="<?php echo $tipo_aporte ? $tipo_aporte['id_tipo_aporte'] : '0' ?>" class="col-xs-10 col-sm-5" readonly />
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre </label>

					<div class="col-sm-9">
						<input type="text" id="nombre_tipo_aporte" name="nombre_tipo_aporte" value="<?php echo $tipo_aporte ? $tipo_aporte['nombre_tipo_aporte'] : '' ?>"  placeholder="Nombre tipo_aporte" class="col-xs-10 col-sm-5" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Categoría </label>

					<div class="col-sm-9">
						<?php echo $select_categorias ?>
					</div>
				</div>

				<?php if ($tipo_aporte) { ?>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Vigencia </label>

					<div class="col-sm-9">
						<select class="col-xs-10 col-sm-5" id="estado_tipo_aporte" name="estado_tipo_aporte" id="form-field-select-1">
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
</div>