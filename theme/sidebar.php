<div id="sidebar" class="sidebar <?php echo $menu_min ?> responsive">
	<?php if ($_SESSION["usuario"]) { ?>
	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<a class="btn btn-success" href="#">
				<i class="fa fa-calendar"></i>
			</a>

			<a class="btn btn-info" href="#">
				<i class="menu-icon fa fa-users"></i>
			</a>

			<!-- #section:basics/sidebar.layout.shortcuts -->
			<a class="btn btn-warning" href="#">
				<i class="fa fa-user-secret"></i>
			</a>

			<a class="btn btn-danger" href="#">
				<i class="fa fa-sign-out"></i>
			</a>

			<!-- /section:basics/sidebar.layout.shortcuts -->
		</div>

		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>

			<span class="btn btn-info"></span>

			<span class="btn btn-warning"></span>

			<span class="btn btn-danger"></span>
		</div>
	</div>
	<ul class="nav nav-list">
		<li class="">
			<a href="<?php echo $dir ?>/">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Inicio </span>
			</a>
		</li>
		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-th-large"></i>
				<span class="menu-text"> Acopio </span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li id="li_crear_producto" class="">
					<a href="<?php echo $dir ?>/almacen/">
						<i class="menu-icon fa fa-cubes"></i>
						Almacén
					</a>
					<b class="arrow"></b>
				</li>
				<li id="li_crear_producto" class="">
					<a href="<?php echo $dir ?>/cajas/">
						<i class="menu-icon fa fa-archive"></i>
						Cajas
					</a>

					<b class="arrow"></b>
				</li>
				<li id="li_crear_producto" class="">
					<a href="<?php echo $dir ?>/envios/">
						<i class="menu-icon fa fa-share-square-o"></i>
						Envios
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>

		
		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-briefcase"></i>
				<span class="menu-text"> Recursos </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">

				<?php if ($_SESSION["usuario"]['id_rol_usuario'] != 5 AND $_SESSION["usuario"]['id_rol_usuario'] != 6) { ?>
				<li id="li_crear_producto" class="">
					<a href="<?php echo $dir ?>/centros_acopio/">
						<i class="menu-icon fa fa-caret-right"></i>
						Centros de Acopio
					</a>
					<b class="arrow"></b>
				</li>
				<?php } ?>
				<li id="li_crear_producto" class="">
					<a href="<?php echo $dir ?>/tipo_aporte/">
						<i class="menu-icon fa fa-caret-right"></i>
						Tipos de Aporte
					</a>
					<b class="arrow"></b>
				</li>
				<li id="li_crear_producto" class="">
					<a href="<?php echo $dir ?>/categorias_aporte/">
						<i class="menu-icon fa fa-caret-right"></i>
						Categoría de Aportes
					</a>
					<b class="arrow"></b>
				</li>
				<?php if ($_SESSION["usuario"]['id_rol_usuario'] != 6) { ?>
				<li id="li_crear_producto" class="">
					<a href="<?php echo $dir ?>/usuarios/">
						<i class="menu-icon fa fa-caret-right"></i>
						Usuarios
					</a>
					<b class="arrow"></b>
				</li>
				<?php } ?>
			</ul>
		</li>
	</ul><!-- /.nav-list -->
	<?php } ?>

	<!-- #section:basics/sidebar.layout.minimize -->
	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>

	<!-- /section:basics/sidebar.layout.minimize -->
</div>