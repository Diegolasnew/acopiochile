
	<div class="page-header">
		<h1>
		<?php echo $title ?>
		</h1>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<form class="form-horizontal" id="usuario_form" role="form">
				<!-- #section:elements.form -->
				
				<div class="form-group hide">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ID </label>

					<div class="col-sm-9">
						<input type="text" id="id_usuario" name="id_usuario" value="<?php echo $usuario ? $usuario['id_usuario'] : 0  ?>" class="col-xs-10 col-sm-5" readonly />
					</div>
				</div>

				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre </label>

					<div class="col-sm-9">
						<input type="text" id="nombre_usu" name="nombre_usu" value="<?php echo $usuario ? $usuario['nombre_usu'] : '' ?>" placeholder="Nombre del usuario" class="col-xs-10 col-sm-5" />
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email </label>

					<div class="col-sm-9">
						<input type="email" id="email_usu" name="email_usu" value="<?php echo $usuario ? $usuario['email_usu'] : '' ?>" placeholder="Email del usuario" class="col-xs-10 col-sm-5" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nick </label>

					<div class="col-sm-9">
						<input type="text" id="nick_usu" name="nick_usu" value="<?php echo $usuario ? $usuario['nick_usu'] : '' ?>" placeholder="Nick del usuario" class="col-xs-10 col-sm-5" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Contraseña </label>

					<div class="col-sm-9">
						<input type="text" id="pass_usu" name="pass_usu" value="" placeholder="Contraseña" class="col-xs-10 col-sm-5" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Rol Usuario </label>

					<div class="col-sm-9">
						<?php echo $select_roles ?>
					</div>
				</div>
				<div id="rol_2" class="rol form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Region </label>

					<div class="col-sm-9">
						<?php echo $select_region ?>
					</div>
				</div>
				<div id="rol_3" class="rol form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Provincia </label>

					<div class="col-sm-9">
						<?php echo $select_provincia ?>
					</div>
				</div>
				<div id="rol_4" class="rol form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Comuna </label>

					<div class="col-sm-9">
						<?php echo $select_comuna ?>
					</div>
				</div>
				<div id="rol_5" class="rol form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Centro de Acopio </label>
					<div class="col-sm-9">
						<?php echo $select_centro_acopio ?>
					</div>
				</div>

				<?php if ($usuario) { ?>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Vigencia </label>

					<div class="col-sm-9">
						<select class="col-xs-10 col-sm-5" id="estado_usu" name="estado_usu" id="form-field-select-1">
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
