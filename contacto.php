<!-- Validaciones Formulario de Contacto -->
<?php include_once('includes/validaciones-contacts.inc'); ?>

<!-- Validaciones Newsletter -->
<?php include_once('includes/validaciones-newsletter.inc'); ?>

<?php include_once('includes/config.inc.php'); ?>

<!doctype html>
<html lang="es">
	<head>
		<!-- Tag Manager Head -->
  	<?php include_once("includes/tag_manager_head.inc"); ?>

		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Contactese con nosotros. zócalos y contramarcos permiten ahorrar tiempo y dinero. Descubrí nuestra línea de productos y dale a tus ambientes un toque de distinción.">

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

		<!-- Custom CSS -->
		<link rel="stylesheet" type="text/css" href="css/app.css">

		<title>Contacto - Zocalos, molduras y contramarcos de madera.</title>
	</head>
	
	<body>
		<!-- Tag Manager Body -->
  	<?php include_once("includes/tag_manager_body.inc"); ?>
	
		<?php $current = 'contacto'; ?>

		<!-- WhatsApp -->
  	<?php include_once("includes/wapp.inc"); ?>
  	
		<!-- Header -->
		<?php include_once('includes/header.inc'); ?>

		<!-- Slider Estático -->
		<section class="proyectos contacto_header container-fluid bg-azul text-white text-center p-0 mb-5">

			<div class="text-right">
				<div class="header_faja">
					<h1>CONTACTO</h1>
					<h2>Para comunicarse con nosotros por presupuestos o más información complete el siguiente formulario.</h2>
				</div>
			</div>

		</section>
		<!-- Slider Estático end -->


		<!-- Formulario -->
		<section class="container mb-5">

			<div class="row">

				<div class="contacto_datos col-md-6">

					<span>
						<a class="transition" href="tel:1177237758">
							<i class="transition fas fa-phone mb-3"></i>
							7723-7758
						</a>
					</span>

					<span>
						<a class="transition" href="mailto:info@moldurama.com.ar">
							<i class="transition fas fas fa-envelope mb-3"></i>
							info@moldurama.com.ar
						</a>
					</span>

					<span>
						<a class="transition" href="https://goo.gl/tSXWCM" target="blank">
							<i class="transition fas fa-map-marker-alt mb-3"></i>
							La Paz 4546 Villa Ballester. Buenos Aires - Argentina
						</a>
					</span>

					<div class="error">
			      <ul>
			        <?php foreach ($errors_contacto as $error_contacto) { ?>
			          <li><?php echo $error_contacto; ?></li>
			        <?php } ?>
			      </ul>
			    </div>

				</div>

				<div class="contacto col-md-6">

					<form method="post" action="">
					  
					  <input name="origin" type="hidden" value='Formulario de Contacto'>

					  <div class="form-group">
					    <input type="text" class="form-control" name="name" placeholder="Nombre" value='<?php echo $name_contacto; ?>'>
					  </div>

					  <div class="form-group">
					    <input type="email" class="form-control" name="email" placeholder="Email" value='<?php echo $email_contacto; ?>'>
					  </div>

					  <div class="form-group">
							<textarea class="form-control" rows="5" name="comments" placeholder="Comentarios"><?php echo $comments_contacto; ?></textarea>
				    </div>

				    <!-- reCAPTCHA  -->
						<div class="form-group">
							<div id="recaptcha" class="g-recaptcha" data-sitekey="<?= RECAPTCHA_PUBLIC_KEY ?>"></div>
						</div>

				    <div class="text-right">
					  	<button id="contacto" name="contacto" type="submit" class="btn btn_site font_1em">Enviar</button>
				    </div>

					</form>	
				</div>

			</div>

		</section>
		<!-- Formulario end -->

		<!-- Mapa -->
		<section class="container-fluid mb-1">

			<div class="row">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3285.543068758062!2d-58.56725478424993!3d-34.56512286296499!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb9c5391491e3%3A0xbe6b266f2cbfde71!2sMoldurama!5e0!3m2!1ses-419!2sar!4v1678744449852!5m2!1ses-419!2sar" width="100%" height="650" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>

		</section>
		<!-- Mapa end -->

		<!-- Distribuidor -->
		<?php include_once('includes/distribuidores.inc'); ?>

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

		<script src="https://www.google.com/recaptcha/api.js" async defer></script>

		<!-- Scripts -->
		<script type="text/javascript" src="js/app.js"></script>

	</body>
</html>