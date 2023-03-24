<?php
	include_once('includes/config.inc.php');
	include_once('includes/funciones_validar.php');
	require_once("clases/repositorioSQL.php");
	require_once("clases/app.php");

	$db = new RepositorioSQL();
	$errors = [];
	$name = '';
	$email = '';
	$phone = '';
	$comments = '';
	$origin = 'Consulta desde Google Ads';

	// Envio del formulario de contacto
	if (isset($_POST["send"])) {

		if(isset($_POST['g-recaptcha-response'])){$captcha=$_POST['g-recaptcha-response'];}
	  $secretKey = RECAPTCHA_SECRET_KEY;
	  $ip = $_SERVER['REMOTE_ADDR'];
	  $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
	  $responseKeys = json_decode($response,true);

	  if ($responseKeys['success']) {
	  
	    // Verificamos si hay errores en el formulario
	    if (campoVacio($_POST['name'])){
	      $errors['name']='Ingresa tu nombre';
	    } else {
	      $name = $_POST['name'];
	    }

	    if (!comprobar_email($_POST['email'])){
	      $errors['email']='Ingresa el mail :(';
	    } else {
	      $email = $_POST['email'];
	    }

	    if (campoVacio($_POST['comments'])){
	      $errors['comments']='Ingresa tus comentarios';
	    } else {
	      $comments = $_POST['comments'];
	    }

	  } else {
	    $errors['recaptcha'] = 'Error al validar el recaptcha';
	  }

	  if (!$errors) {

	  	//grabamos en la base de datos
	    $save = $db->getRepositorioContacts()->saveInBDD($_POST);

	    //Enviamos los mails al cliente y usuario
	    $app = new App;

	    // Registramos en Mailchimp el contacto
	    $app->registerEmailInMailchimp(API_KEY_MAILCHIMP, LIST_ID, $_POST);

	    $sendClient = $app->sendEmail('Cliente', 'Contacto Cliente', $_POST);

	    $sendUser = $app->sendEmail('Usuario', 'Contacto Usuario', $_POST);

	    if ($sendClient) {
	      // Redirigimos a la pagina de gracias
	      ?>
	      <script type="text/javascript">
	      window.location= 'gracias.php';
	      </script>
	      <?php
	    } else {
	      exit('Error al enviar la consulta, por favor intente nuevamente');
	    }
	    
	  }

	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Zocalos en MDF blanco, negro y de varios colores. Contramarcos de MDF.">
	<meta name="author" content="Librecomunicacion">
    <!-- Favicons -->
    <?php include('includes/favicon.inc.php'); ?>
	<title>Zócalos, Cubrezócalos, Contramarcos y Guardasillas en MDF</title>

	<link rel="stylesheet" href="node_modules/normalize.css/normalize.css">
	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.min.css">
	<link rel="stylesheet" href="css/app.css">
	<?php include('includes/tag_manager_head.inc'); ?>
</head>
<body>
	<?php include('includes/tag_manager_body.inc'); ?>

	<?php include('includes/wapp.inc'); ?>

	<!-- Header -->
	<header class="container">
		<div class="row">
			<div class="col-5">
				<img class="img-fluid" src="img/logo-moldurama.png" alt="logo moldurama">
			</div>
			<div class="col-7">
				<p><i class="fa fa-phone-square" aria-hidden="true"></i>113.596.8714</p>
				<p><i class="fa fa-envelope" aria-hidden="true"></i>info@moldurama.com.ar</p>
			</div>
		</div>
	</header>
	<!-- Header end -->

	<!-- Slide -->
	<section class="slide container-fluid">
		<div class="row">

			<div class="col-md-12">

				<div id="carouselCaptions" class="carousel slide" data-ride="carousel">
				  <div class="carousel-inner">

				    <div class="carousel-item active">
				      <img src="img/slide-1.jpg" class="d-block w-100" alt="zocalos en mdf blancos">
				      <div id="frase_1" class="data wow fadeInUp">
		      			<h1>Zócalos en MDF</h1>
				      	<p>BRINDAMOS ASESORAMIENTO INTEGRAL A: <br><span>CONSTRUCTORAS - ARQUITECTOS - CONSUMIDOR FINAL</span> </p>
				      </div>
				    </div>

				    <div class="carousel-item">
				      <img src="img/slide-2.jpg" class="d-block w-100" alt="zocalos en mdf varios colores">
				      <div id="frase_2" class="data">
		      			<h2>Zócalos de colores</h2>
		      			<p>Personalizá tus ambientes.</p>
				      </div>
				    </div>

				    <div class="carousel-item">
				      <img src="img/slide-3.jpg" class="d-block w-100" alt="Contramarcos en MDF">
				      <div id="frase_3" class="data">
		      			<h2>Contramarcos en MDF</h2>
		      			<p>Detalles que hacen que tus ambientes sean diferentes.</p>
				      </div>
				    </div>

				    <div class="carousel-item">
				      <img src="img/slide-4.jpg" class="d-block w-100" alt="Cubrezócalo en MDF">
				      <div id="frase_4" class="data">
		      			<h2>Cubrezócalo en MDF</h2>
		      			<p>Se colocan sobre los existentes y se pueden <br>ocultar cables en su interior.</p>
				      </div>
				    </div>

				    <div class="carousel-item">
				      <img src="img/slide-5.jpg" class="d-block w-100" alt="Guardasillas en MDF">
				      <div id="frase_5" class="data">
		      			<h2>Guardasillas en MDF</h2>
		      			<p>Protección y estilo para tus ambientes.</p>
				      </div>
				    </div>
				      
			    </div>

			  </div>

			  <a class="carousel-control-prev" href="#carouselCaptions" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselCaptions" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>

		</div>

		<div class="content_formulario">
			<form id="formulario" method="post" class="needs-validation" novalidate>
				<input type="hidden" name="origin" value="<?= $origin ?>">

				<!-- Errores Formulario -->
					<?php if ($errors): ?>
						<div id="error" class="alert alert-danger alert-dismissible fade show fadeInLeft" role="alert">
						  <strong>¡Por favor verificá los datos!</strong>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						  <ul style="padding: 0;">
						    <?php foreach ($errors as $error) { ?>
						      <li>- <?php echo $error; ?></li>
						    <?php } ?>
						  </ul>
						</div>
					<?php endif ?>
					<!-- Errores Formulario end -->
				<p>¿NECESITAS ASESORAMIENTO?<br>
					<span>Envianos tú consulta y te contestaremos a la brevedad.</span>
				</p>
				<div class="form-group">
			    <input required type="text" class="form-control" id="name" name="name" value="<?= $name ?>" placeholder="Nombre">
			    <div class="invalid-feedback">
          	Por favor ingresá tu nombre
        	</div>
			  </div>
			  <div class="form-group">
			    <input required type="email" class="form-control" id="email" name="email" value="<?= $email ?>" placeholder="Email">
			    <div class="invalid-feedback">
          	Por favor ingresá tu email
        	</div>
			  </div>
			  <div class="form-group">
			    <textarea required class="form-control" id="comments" name="comments" rows="3" value="<?= $comments ?>" placeholder="Comentarios"></textarea>
			    <div class="invalid-feedback">
          	Por favor dejá tu consulta
        	</div>
			  </div>

			  <!-- reCAPTCHA  -->
				<div class="form-group">
					<div id="recaptcha" class="g-recaptcha" data-sitekey="<?= RECAPTCHA_PUBLIC_KEY ?>"></div>
				</div>

			  <div class="form-group form-check">
			    <input type="checkbox" class="form-check-input" name="newsletter" id="newsletter" checked>
			    <label class="form-check-label" for="newsletter">suscribe newsletter</label>
			  </div>
			  <button type="submit" id="send" name="send" class="btn btn-primary btn_form transition">Enviar</button>
			</form>
		</div>

	</section>
	<!-- Slide end -->

	<!-- Facil Instalación -->
	<section class="facil_instalacion text-center">
		<div class="container">
			<div class="row">

				<div class="col-md-12">
					<h3>FÁCIL INSTALACIÓN</h3>
					<p>Su colocación es sumamente sencilla pueden ser pegados con diferentes tipos de pegamentos o clavados.</p>
				</div>

				<div class="col-4 text-center">
					<img class="img-fluid" src="img/adhesivo.png" alt="adhesivo de contacto">
					<p>Adhesivo de contacto.</p>
				</div>
				<div class="col-4 text-center">
					<img class="img-fluid" src="img/silicona.png" alt="pegamento con silicona">
					<p>Silicona.</p>
				</div>
				<div class="col-4 text-center">
					<img class="img-fluid" src="img/clavos.png" alt="clavos de acero">
					<p>Clavos de acero.</p>
				</div>

			</div>
		</div>
	</section>
	<!-- Facil Instalación end -->

	<!-- Tarjetas de Credito -->
	<section class="tarjetas">
		<div class="container-fluid">
			<div class="container">
				<div class="row">

					<div class="col-md-12 text-center content_pay">
						<div>
							<img class="img-fluid" src="img/tarjetas.png" alt="tarjetas de credito">
							<p>PAGÁ CON TARJETA<br>DE CRÉDITO Y DÉBITO</p>
						</div>
						<img class="img-fluid mercadopago" src="img/mercadopago.png" alt="tarjetas mercadopago">
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- Tarjetas de Credito end -->

	<!-- Línea Zócalos -->
	<section class="linea_zocalos">
		<div class="container">
			<div class="row">

				<div class="col-md-8 offset-md-2 text-center">
					<h3>LÍNEA ZÓCALOS</h3>
					<p>
						Nuestros zócalos o rodapies son fabricados en MDF y poseen un acabado con pintura a horno de alta temperatura, que le brinda excelente vista y gran durabilidad. Estos zócalos permiten resolver los remates de piso pared con suma facilidad y son ideales para acompañar pisos flotantes o de madera.
					</p>
				</div>

			</div>

			<div class="row">

				<div class="col-md-6">
					<img class="img-fluid" src="img/zocalos-mdf.jpg" alt="zocalos en mdf">
				</div>

				<div class="col-md-6">

					<div class="titulo">
						<h2>ZÓCALOS EN MDF <span>LISTOS PARA COLOCAR</span></h2>
					</div>

					<div class="medidas">
						<p>
							MEDIDAS ESTÁNDAR: <br>
							Altura: 50 mm | 70 mm | 82 mm | 100 mm | 120 mm<br>
							<span>Espesor: 12 mm</span> <br>
							<span>Colores: Blanco, gris, negro y personalizados a pedido</span>
						</p>
					</div>

				</div>

			</div>

		</div>
	</section>
	<!-- Línea Zócalos end -->

	<!-- Línea de Zócalos Completa -->
	<section class="linea_zocalos_completa">
		<div class="container-fluid p-0">
			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<h4>LÍNEA COMPLETA</h4>
					</div>

					<div class="col-md-12">

						<div class="content_line">

							<div class="perfil">
								<img class="img-fluid" src="img/zocalo-zfl.png" alt="zocalo de MDF zfl">
								<p class="title">ZFL</p>
								<p class="description">Zócalo Curvo</p>
							</div>

							<div class="perfil">
								<img class="img-fluid" src="img/zocalo-zfr.png" alt="zocalo de MDF zfr">
								<p class="title">ZFR</p>
								<p class="description">Zócalo Recto</p>
							</div>

							<div class="perfil">
								<img class="img-fluid" src="img/zocalo-zff.png" alt="zocalo de MDF zff">
								<p class="title">ZFF</p>
								<p class="description">Zócalo Fantasía</p>
							</div>

							<div class="perfil">
								<img class="img-fluid" src="img/zocalo-zff.png" alt="zocalo de MDF zff">
								<p class="title">ZFC</p>
								<p class="description">Zócalo con Calle</p>
							</div>

							<div class="perfil">
								<img class="img-fluid" src="img/zocalo-zrc.png" alt="zocalo de MDF zrc">
								<p class="title">CZ</p>
								<p class="description">Cubrezócalo</p>
							</div>

							<div class="perfil">
								<img class="img-fluid" src="img/cubrezocalo-cz.png" alt="cubrezocalo de MDF cz">
								<p class="title">ZFM</p>
								<p class="description">Zócalo Moldurado</p>
							</div>
							
						</div>

					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- Línea de Zócalos Completa end -->

	<!-- Línea Contramarcos -->
	<section class="linea_contramarcos">
		<div class="container">
			<div class="row">

				<div class="col-md-8 offset-md-2 text-center">
					<h3>LÍNEA CONTRAMARCOS</h3>
					<p>Contramarcos fabricados en MDF, son ideales para dar el toque final a cualquier obra, brindan una solución estética a las uniones entre marcos y paredes. Poseen acabado con pintura secada a horno de alta temperatura, que le brinda excelente vista y gran durabilidad.</p>
				</div>

			</div>

			<div class="row">

				<div class="col-md-6">
					<img class="img-fluid" src="img/contramarco-principal.jpg" alt="contramarcos de MDF">
				</div>

				<div class="col-md-6">

					<div class="titulo">
						<h2>CONTRAMARCOS EN MDF <span>LISTOS PARA COLOCAR</span></h2>
					</div>

					<div class="medidas">
						<p>
							MEDIDAS ESTÁNDAR: <br>
							Alto: 42 mm | 50 mm | 70 mm <br>
							<span>Espesor: 12 mm</span> <br>
							<span>Colores: Blanco, gris, negro y personalizados a pedido</span>
						</p>
					</div>

				</div>

			</div>

		</div>
	</section>
	<!-- Línea Contramarcos end -->

	<!-- Línea de Contramarcos Completa -->
	<section class="linea_contramarcos_completa">
		<div class="container-fluid p-0">
			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<h4>LÍNEA COMPLETA</h4>
					</div>

					<div class="col-md-12">

						<div class="content_line">
							<div class="perfil">
								<img class="img-fluid" src="img/icono-contramarco.gif" alt="contramarco de mdf CFR">
								<p class="title">CFR</p>
								<p class="description">Contramarco Recto</p>
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- Línea de Contramarcos Completa end -->

	<!-- Línea Guardasillas -->
	<section class="linea_zocalos">
		<div class="container">
			<div class="row">

				<div class="col-md-8 offset-md-2 text-center">
					<h3>LÍNEA GUARDASILLAS</h3>
					<p>
						Los guardasillas de MDF son utilizados principalmente como elementos decorativos y protectores en paredes. Estas molduras se colocan en la parte inferior de las paredes para protegerlas de golpes y para darles un acabado estético y atractivo.
					</p>
					<p>
						Además de proteger las paredes, los guardasillas de MDF también pueden ocultar imperfecciones en las paredes y pueden servir como una transición suave entre diferentes tipos de revestimientos de pared. Por lo tanto, los guardasillas de MDF son una excelente opción para darle un toque decorativo a cualquier espacio y al mismo tiempo proteger las paredes.
					</p>
				</div>

			</div>

			<div class="row">

				<div class="col-md-6">
					<img class="img-fluid" src="img/guardasillas-mdf.jpg" alt="guardasillas en mdf">
				</div>

				<div class="col-md-6">

					<div class="titulo">
						<h2>GUARDASILLA MOLDURADO Y RECTO<span>LISTOS PARA COLOCAR</span></h2>
					</div>

					<div class="medidas">
						<p>
							MEDIDAS ESTÁNDAR: <br>
							Alto: 50 mm | 70 mm | 100 mm | 120 mm<br>
							<span>Espesor: 12 mm</span> <br>
							<span>Colores: Blanco, gris, negro y personalizados a pedido</span>
						</p>
					</div>

				</div>

			</div>

		</div>
	</section>
	<!-- Línea Guardasillas end -->

	<!-- Línea de Guardasillas Completa -->
	<section class="linea_zocalos_completa">
		<div class="container-fluid">
			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<h4>LÍNEA COMPLETA</h4>
					</div>

					<div class="col-md-12">

						<div class="content_line">

							<div class="perfil">
								<img class="img-fluid" src="img/icono-guardasilla-gfm.png" alt="guardasilla gfm">
								<p class="title">GFM</p>
								<p class="description">Guardasilla Moldurado</p>
							</div>

							<div class="perfil">
								<img class="img-fluid" src="img/icono-guardasilla-gfr.png" alt="guardasilla gfr">
								<p class="title">GFR</p>
								<p class="description">Guardasilla Recto</p>
							</div>

						</div>

					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- Línea de Guardasillas Completa end -->

	<!-- Línea Cubrezócalos -->
	<section class="linea_contramarcos">
		<div class="container">
			<div class="row">

				<div class="col-md-8 offset-md-2 text-center">
					<h3>LÍNEA CUBREZÓCALOS</h3>
					<p>
						Al momento de realizar un upgrade en tus ambientes, podés empezar por los detalles. Como por ejemplo cubrir los zócalos actuales sin las complicaciones de una obra.
						Otra de las ventajas que ofrecen es que se pueden pintar y de esta forma lograr emparejarlos con la decoración de tu hogar.
						También se utilizan para ocultar cables e instalaciones.
					</p>
				</div>

			</div>

			<div class="row">

				<div class="col-md-6">
					<img class="img-fluid" src="img/cubrezocalo-mdf.jpg" alt="cubrezocalo de MDF">
				</div>

				<div class="col-md-6">

					<div class="titulo">
						<h2>CUBREZÓCALOS EN MDF <span>LISTOS PARA COLOCAR</span></h2>
					</div>

					<div class="medidas">
						<p>
							MEDIDAS ESTÁNDAR: <br>
							Alto: 70 mm | 100 mm | 120 mm <br>
							<span>Espesor: 12 mm</span> <br>
							<span>Colores: Blanco, gris, negro y personalizados a pedido</span>
						</p>
					</div>

				</div>

			</div>

		</div>
	</section>
	<!-- Línea Cubrezócalos end -->

	<!-- Línea de Cubrezócalos Completa -->
	<section class="linea_contramarcos_completa">
		<div class="container-fluid p-0">
			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<h4>LÍNEA COMPLETA</h4>
					</div>

					<div class="col-md-12">

						<div class="content_line">
							<div class="perfil">
								<img class="img-fluid" src="img/icono-cubrezocalo.png" alt="cubrezocalo de mdf CZ">
								<p class="title">CZ</p>
								<p class="description">Cubrezócalo</p>
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- Línea de Cubrezócalos Completa end -->

	<!-- Medidas y Colores Personalizados -->
	<section class="medidas_colores_custom">
		<div class="container">
			<div class="row">

				<div class="col-md-8 offset-md-2 text-center">
					<div class="header">
						<img class="img-fluid" src="img/medidas-colores.gif" alt="medidas y colores personalizados">
						<p>¡MEDIDAS Y COLORES <br>PERSONALIZABLES!</p>
					</div>
					<p>
						Todos nuestros productos pueden personalizarse bajo pedido, tanto en sus medidas como colores. <strong>Dejá volar tu imaginación</strong>
					</p>		
				</div>

			</div>
		</div>
	</section>
	<!-- Medidas y Colores Personalizados end -->

	<!-- Imagenes de zocalos instalados -->
	<section class="instalados">
		<div class="container">
			<div class="row">

				<div class="col-md-4 text-center">
					<img class="img-fluid" src="img/contramarco-instalado.jpg" alt="Imagenes de contramarco instalados">
				</div>

				<div class="col-md-4 text-center">
					<img class="img-fluid" src="img/zocalo-instalado.jpg" alt="Imagenes de zocalos instalados">
				</div>

				<div class="col-md-4 text-center">
					<img class="img-fluid" src="img/zocalo-instalado-a.jpg" alt="Imagenes de zocalos instalados a">
				</div>

			</div>
		</div>
	</section>
	<!-- Imagenes de zocalos instalados end -->

	<!-- Colores Estandar -->
	<section class="colores_estandar">
		<div class="container">
			<div class="row">

				<div class="col-md-12 text-center">
					<h4>COLORES ESTÁNDAR</h4>
				</div>

				<div class="col-md-12">

					<div class="color text-center">
						<img class="img-fluid" src="img/aluminio.jpg" alt="color aluminio">
						<p>aluminio</p>
					</div>

					<div class="color text-center">
						<img class="img-fluid" src="img/negro.jpg" alt="color negro">
						<p>negro</p>
					</div>

					<div class="color text-center">
						<img class="img-fluid" src="img/blanco.jpg" alt="color blanco">
						<p>blanco</p>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- Colores Estandar end -->

	<!-- Explora Colores -->
	<section class="explora_colores">
		<div class="container">
			<div class="row">

				<div class="col-md-6">
					<img class="img-fluid" src="img/zocalos-colores.jpg" alt="zocalos de colores">
				</div>

				<div class="col-md-6 text-center">
					<h4>COLORES PERSONALIZADOS A PEDIDO</h4>
					<p>
						Dale un toque de color a tus ambiente <br>
						Gracias a nuestro exclusivo proceso de pintura con secado en horno de alta temperatura, logramos colores plenos y bien definidos, que perduran en el tiempo, animate a explorar nuevos colores. Pedinos el que mejor combine con tus proyectos. 
					</p>
				</div>

			</div>
		</div>
	</section>
	<!-- Explora Colores end -->

	<!-- Caracteristicas -->
	<section class="caracteristicas">
		<div class="container">
			<div class="row">

				<div class="col-md-6">
					<ul>
						<li>
							<img class="img-fluid" src="img/tilde.gif" alt="tilde a">
							<p>Libres de Mantenimiento</p>
						</li>
						<li>
							<img class="img-fluid" src="img/tilde.gif" alt="tilde a">
							<p>Amplia variedad de colores</p>
						</li>
					</ul>
				</div>

				<div class="col-md-6">
					<ul>
						<li>
							<img class="img-fluid" src="img/tilde.gif" alt="tilde a">
							<p>Fáciles de instalar</p>
						</li>
						<li>
							<img class="img-fluid" src="img/tilde.gif" alt="tilde a">
							<p>No necesitan terminación</p>
						</li>
					</ul>
				</div>

			</div>
		</div>
	</section>
	<!-- Caracteristicas end -->

	<!-- Asistencia -->
	<section class="asistencia">
		<div class="container-fluid">
			<div class="container">
				<div class="row">

					<div class="col-md-10 offset-md-1 text-center">
						<div class="header">
							<img class="img-fluid" src="img/asistencia.png" alt="Asistencia y asesoramiento">
							<div>
								<h5>Asistencia y asesoramiento en obra</h5>
								<p>
									Contamos con personal altamente capacitado para orientar a Profesionales de la Arquitectura y Consumidores Finales en la elección del producto ideal para su obra.
								</p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- Asistencia end -->

	<!-- Comerzialización -->
	<section class="comerzializacion">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3 text-center">
						<p>
							Comercializamos productos fabricados con materiales nobles priorizando la calidad, durabilidad y la facilidad en su colocación.
						</p>

						<a href="#formulario" class="btn btn-primary transition btn_to_form">COTIZAR AHORA</a>
				</div>
			</div>
		</div>
	</section>
	<!-- Comerzialización end -->

	<!-- Footer -->
	<footer>
		<div class="container-fluid">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<a class="transition btn_to_form" href="#formulario"><i class="fa fa-envelope" aria-hidden="true"></i>info@moldurama.com.ar</a>
					</div>
					<div class="col-md-12 text-center">
						<p>Copyright &reg; <?= date('Y'); ?>, All Rights Reserved.</p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer end -->

	<script src="node_modules/jquery/dist/jquery.min.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="node_modules/jquery.easing/jquery.easing.min.js"></script>
	<script src="node_modules/wow.js/dist/wow.min.js"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<script src="js/app.js"></script>
</body>
</html>