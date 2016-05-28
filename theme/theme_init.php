<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="robots" content="noindex">
		<meta name="googlebot" content="noindex">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $page_title ?></title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo $dir ?>/assets/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo $dir ?>/assets/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo $dir ?>/assets/css/my_styles.css" />

		<!-- page specific plugin styles -->
		<?php echo $include_css ?>
		<link rel="stylesheet" href="<?php echo $dir ?>/assets/css/jquery.gritter.css" />
		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo $dir ?>/assets/css/ace-fonts.css" />

		<!-- ace styles -->
		
		<link rel="stylesheet" href="<?php echo $dir ?>/assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link type="text/css" rel="stylesheet" id="ace-skins-stylesheet" href="<?php echo $dir ?>/assets/css/ace-skins.css">

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo $dir ?>/assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo $dir ?>/assets/css/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?php echo $dir ?>/assets/js/ace-extra.js"></script>

		<!-- IDIOMA -->
		<script src="<?php echo $idioma_js ?>"></script>
		<script type="text/javascript">
			var root = "<?php echo $dir ?>";
			var lugar = "<?php echo $lugar ?>";
		</script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?php echo $dir ?>/assets/js/html5shiv.js"></script>
		<script src="<?php echo $dir ?>/assets/js/respond.js"></script>
		<![endif]-->
	</head>
	<body class="skin-1">

	<?php require "header.php" ?>

	<div class="main-container" id="main-container">
		

		<?php require "sidebar.php"; ?>

		<!-- MAIN CONTENT -->
		<div class="main-content">
			<div class="main-content-inner">
				<div class="breadcrumbs" id="breadcrumbs">
					<script type="text/javascript">
						try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
					</script>

					<ul class="breadcrumb">
						<li>
							<i class="ace-icon fa fa-home"></i>
							<a href="<?php echo $dir ?>">Inicio</a>
						</li>
						<li class="active">Principal</li>
					</ul>
				</div>

				<div class="page-content">