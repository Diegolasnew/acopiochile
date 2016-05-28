
<div class="page-header">
	<h1>
	<?php echo $title ?>
	</h1>
	<div id="botones_arriba" >
		<a id="eliminar_oportunidad" class="btn btn-danger <?php echo $es_nuevo?'hide': '' ?>" href="#"/>Eliminar</a>	
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<form class="form-horizontal" id="oportunidad_form" role="form">
			<!-- #section:elements.form -->
			<div class="form-group hide">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ID </label>

				<div class="col-sm-9">
					<input type="text" id="id_oportunidad" name="id_oportunidad" value="<?php echo $oportunidad ? $oportunidad['id_oportunidad']: 0 ?>" class="col-xs-10 col-sm-5" readonly />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Cliente </label>

				<div class="col-sm-9">
					<input type="text" id="nombre_cli" name="nombre_cli" value="<?php echo $oportunidad ? $oportunidad['nombre_cli'] : '' ?>" placeholder="Nombre del Cliente" class="hide col-xs-10 col-sm-5" />
					<?php echo $select_clientes ?>				
					<label class="middle">
						<input class="ace cliente_nuevo" type="checkbox" id="cliente_nuevo"  <?php echo $oportunidad['cliente_nuevo'] ? 'checked' : '' ?>/>
						<span class="lbl"> Cliente nuevo</span>
					</label>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Título </label>

				<div class="col-sm-9">
					<input type="text" id="titulo_opor" name="titulo_opor" value="<?php echo $oportunidad ? $oportunidad['titulo_opor'] : '' ?>" placeholder="Título descriptivo" class="col-xs-10 col-sm-5" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Plazo de Realización </label>

				<div class="col-sm-9">
					<!-- <input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" /> -->
					<input type="text" id="fecha_termino" name="fecha_termino" data-date-format="dd/mm/yyyy" value="<?php echo $oportunidad ? dateToHtml($oportunidad['fecha_termino']) : '' ?>" placeholder="Fecha límite" class="col-xs-10 col-sm-5" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Etapa de la Oportunidad </label>

				<div class="col-sm-9">
					<?php echo $selectEtapas ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Porcentaje de Factibilidad </label>

				<div class="col-sm-4">
					<input type="number" max="100" min="0" id="porcentaje_opor" name="porcentaje_opor" value="<?php echo $oportunidad ? $oportunidad['porcentaje_opor'] : '' ?>" placeholder="%" class="col-xs-10 col-sm-5" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Moneda </label>

				<div class="col-sm-9">
					<input type="text" id="moneda_opor" name="moneda_opor" value="<?php echo $oportunidad ? $oportunidad['moneda_opor'] : 'CLP' ?>" placeholder="Moneda del monto" class="col-xs-10 col-sm-5" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Monto </label>

				<div class="col-sm-9">
					<input type="number" id="monto_opor" name="monto_opor" value="<?php echo $oportunidad ? $oportunidad['monto_opor'] : '' ?>" placeholder="Valor asociado" class="col-xs-10 col-sm-5" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Porcentaje de Ganancia </label>

				<div class="col-sm-4">
					<input type="number" max="100" min="0" id="porcentaje_ganancia_opor" name="porcentaje_ganancia_opor" value="<?php echo $oportunidad ? $oportunidad['porcentaje_ganancia_opor'] : '' ?>" placeholder="%" class="col-xs-10 col-sm-5" />
				</div>
				<div id="total_ganancia"></div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Usuario Asignado </label>

				<div class="col-sm-9">
					<?php echo $select_usuario_asignado ?>
				</div>
			</div>
			<h3>Descripción</h3>
			<div class="wysiwyg-editor" id="descripcion_opor"><?php echo $oportunidad ? $oportunidad['descripcion_opor'] : '' ?></div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Participantes </label>
				<div class="col-sm-6">
					<?php echo $select_participantes ?>
				</div>
			</div>	
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