<?php 
if (isset($_SESSION["usuario"])){
	require_once "control/centro_acopio/get_centro_acopio_db.php";
	$centros_acopio = get_centros_acopio($_SESSION['usuario']['id_region'], $_SESSION['usuario']['id_provincia'], $_SESSION['usuario']['id_comuna'], $_SESSION['usuario']['id_centro_acopio']);
	$select_centros_acopio = createSelect("centro_acopio", "nombre_centro_acopio", $_SESSION['usuario']['centro_acopio']['id_centro_acopio'], $centros_acopio, "", true, 'cambiar_centro_acopio' );
}


?>

<div id="navbar" class="navbar  navbar-default ">
	<script type="text/javascript">
		try{ace.settings.check('navbar' , 'fixed')}catch(e){}
	</script>

	<div class="navbar-container" id="navbar-container">
		<!-- #section:basics/sidebar.mobile.toggle -->
		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
			<span class="sr-only">Toggle sidebar</span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>
		</button>

		<!-- /section:basics/sidebar.mobile.toggle -->
		<div class="navbar-header pull-left">
			<!-- #section:basics/navbar.layout.brand -->
			<a href="<?php echo $dir ?>/" class="navbar-brand">
				<small>
					<i class="fa fa-archive"></i>
					<?php echo $page_title ?>
				</small>
			</a>

			<!-- /section:basics/navbar.layout.brand -->

			<!-- #section:basics/navbar.toggle -->

			<!-- /section:basics/navbar.toggle -->
		</div>

		<!-- #section:basics/navbar.dropdown -->
		<?php if ($_SESSION["usuario"]) {?>
		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">

				<li class="green">
					<a class="dropdown-toggle">
						Centro de Acopio: 
						<?php echo $select_centros_acopio ?>
					</a>
					
				</li>
				<!-- #section:basics/navbar.user_menu -->
				<li class="light-blue">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<img class="nav-user-photo" src="<?php echo $dir ?>/assets/avatars/avatar2.png" alt="Jason's Photo" />
						<span class="user-info">
							<small><?php echo $_SESSION["usuario"]["nombre_rol_usu"] ?>,</small>
							<?php echo $_SESSION["usuario"]["nombre_usu"] ?>
						</span>

						<i class="ace-icon fa fa-caret-down"></i>
					</a>

					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="#">
								<i class="ace-icon fa fa-cog"></i>
								Ajustes
							</a>
						</li>

						<li>
							<a href="#">
								<i class="ace-icon fa fa-user"></i>
								Perfil
							</a>
						</li>

						<li class="divider"></li>

						<li>
							<a href="<?php echo $dir ?>/salir">
								<i class="ace-icon fa fa-power-off"></i>
								Salir
							</a>
						</li>
					</ul>
				</li>

				<!-- /section:basics/navbar.user_menu -->
			</ul>
		</div>
		<?php } ?>
		<!-- /section:basics/navbar.dropdown -->
	</div><!-- /.navbar-container -->
</div>