<!-- Validaciones Newsletter -->
<?php include_once('includes/validaciones-newsletter.inc'); ?>

<!doctype html>
<html lang="es">
	<head>
		<!-- Tag Manager Head -->
  	<?php include_once("includes/tag_manager_head.inc"); ?>

		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Zócalo en mdf blanco zfc. trabajamos zócalos y contramarcos que permiten ahorrar tiempo y dinero ya que vienen listos para colocar.">

		<!-- Favicons -->
		<link rel="apple-touch-icon" href="img/apple-icon.png">
		<link rel="icon" href="img/favicon.png">

		<!-- Normalize CSS -->
		<link rel="stylesheet" type="text/css" href="css/normalize.min.css">

		<!-- Animate CSS -->
		<link rel="stylesheet" type="text/css" href="css/animate.css">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">

		<!-- Fontawesome -->
		<link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">

		<!-- Plugins magnific popup -->
		<link href="plugins/magnific-popup/magnific-popup.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link rel="stylesheet" type="text/css" href="css/app.css">

		<title>Zócalo MDF Blanco Curvo ZFC - Zocalos, molduras y contramarcos de madera.</title>
	</head>
	
	<body>
		<!-- Tag Manager Body -->
  		<?php include_once("includes/tag_manager_body.inc"); ?>
	
		<?php $current = 'productos'; ?>

		<!-- WhatsApp -->
  		<?php include_once("includes/wapp.inc"); ?>
  	
		<!-- Header -->
		<?php include_once('includes/header.inc'); ?>

		<!-- Descripcion Producto -->
		<section class="container mb-5 mt-5">

			<div class="row">

				<div class="col-lg-6 mb-5 parent-container">

					<a class="transition productos_mini popup-img" href="img/productos/zocalo-zfc/zocalo-zfc-principal.jpg" title="Zocalo mdf ZFC">
						<img id="principal" class="wow fadeInUp img-fluid" src="img/productos/zocalo-zfc/zocalo-zfc-principal.jpg" alt="Zocalo mdf ZFC">
					</a>

					<div class="row">

						<div class="col-4 offset-2">
							<a class="transition productos_mini popup-img" title="Zocalo ZFC" href="img/productos/zocalo-zfc/zocalo-zfc-perfil.jpg">
								<img id="perfil" class="wow fadeInRight img-fluid" src="img/productos/zocalo-zfc/zocalo-zfc-perfil.jpg" 
								alt="zocalo ZFC perfil">
							</a>
						</div>

						<div class="col-4">
							<a class="transition productos_mini popup-img" title="Zocalo ZFC" href="img/productos/zocalo-zfc/zocalo-zfc-render.jpg">
								<img id="render" class="wow fadeInRight img-fluid" src="img/productos/zocalo-zfc/zocalo-zfc-render.jpg" 
								alt="zocalo ZFC render">
							</a>
						</div>

					</div>
					
				</div>

				<div class="productos col-lg-5 offset-lg-1 mb-5">
					<h1 class="wow fadeInUp">ZÓCALO CON CALLE MDF</h1>
					<h2 class="wow fadeInLeft">MDF ZFC</h2>
					
					<p class="wow fadeInUp">
						<span class="font-weight-bold">Descripción:</span> <br>
						Fabricados en MDF. <br>
						Acabado con pintura secada <br>
						a horno de alta temperatura.
					</p>

					<p class="wow fadeInUp">
						<span class="font-weight-bold">Altura:</span> <br>
						50 mm, 70 mm, 100 mm y 120 mm
					</p>

					<p class="wow fadeInUp">
						<span class="font-weight-bold">Espesor:</span> <br>
						12 mm
					</p>

					<p class="wow fadeInUp">
						<span class="font-weight-bold">Colores:</span> <br>
						Blanco, gris, negro
					</p>

					<div class="row">

						<div class="wow fadeInUp content_colors col-md-12">
							<div class="colors bg-blank">
								&nbsp;
							</div>
							<div class="colors bg-gris">
								&nbsp;
							</div>
							<div class="colors bg-negro">
								&nbsp;
							</div>							
						</div>

					</div>

					<div class="row">
						<div class="col-md-12 text-center mb-3">
							<h5 class="wow fadeInUp mb-3">Consultá por colores personalizados.</h5>
							<a href="contacto.php" class="btn btn_site font_1em wow fadeInLeft">CONTACTO</a>
						</div>
					</div>

				</div>

			</div>
		</section>
		<!-- Descripcion Producto end -->

		<!-- Otros Productos -->
		<?php include_once('includes/otros-productos.inc'); ?>		

		<!-- Newsletter -->
		<?php include_once('includes/newsletter.inc'); ?>

		<!-- Mas Información -->
		<?php include_once('includes/mas-informacion.inc'); ?>

		<!-- Footer -->
		<?php include_once('includes/footer.inc'); ?>

		<!-- jQuery primero, luego Popper.js, luego Bootstrap JS -->
		<script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script> 
		<script type="text/javascript" src="js/popper.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>

		<!-- Wow efecto para que aparezcan los objetos cuando se va scroleando -->
		<script type="text/javascript" src="js/wow.min.js"></script>

		<!-- Magnific Popup javascript -->
		<script type="text/javascript" src="plugins/magnific-popup/jquery.magnific-popup.min.js"></script>

		<!-- Pop Up Productos -->
		<script type="text/javascript" src="js/pop-up-productos.js"></script>

		<!-- Scripts -->
		<script type="text/javascript" src="js/app.js"></script>

	</body>
</html>