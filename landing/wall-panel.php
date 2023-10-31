<?php

	include_once('./includes/config.inc.php');
	include_once('./includes/funciones_validar.php');
	require_once('./clases/repositorioSQL.php');
	require_once('./clases/app.php');

	$db = new RepositorioSQL();
	$errors = [];
	$name = '';
	$email = '';
	$phone = '';
	$comments = '';
	$rubro = 'Wall Panel';

	if ( isset($_GET['utm_source']) ) {
		$origin = $_GET['utm_source'];
	} else {
		$origin = "no set";
	}

	if ( isset($_GET['utm_campaign']) ) {
		$campaign = $_GET['utm_campaign'];
	} else {
		$campaign = "no set";
	}

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
	    $app->registerEmailInMailchimp(API_KEY_MAILCHIMP, LIST_ID, $_POST, $rubro);

	    $sendClient = $app->sendEmail('Cliente', 'Contacto Cliente', $_POST, $rubro);

	    $sendUser = $app->sendEmail('Usuario', 'Contacto Usuario', $_POST, $rubro);

	    if ($sendClient) {
	      // Redirigimos a la pagina de gracias
	      ?>
<script type="text/javascript">
window.location = 'gracias.php';
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
  <meta name="description"
    content="Fabricado en MDF con un espesor delgado y canaletas poco profundas  facilitan la limpieza y aprovechan al máximo las medidas de tu espacio.">
  <meta name="author" content="Librecomunicacion">
  <!-- Favicons -->
  <?php include('./includes/favicon.inc.php'); ?>
  <title>Wall Panel en MDF</title>

  <link rel="stylesheet" href="node_modules/normalize.css/normalize.css">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="stylesheet" href="css/app.css">
  <link rel="stylesheet" href="css/wall-panel.css">
  <?php include('./includes/tag_manager_head.inc'); ?>
</head>

<body>

  <?php include('./includes/tag_manager_body.inc'); ?>

  <?php include('./includes/wapp.inc'); ?>

  <!-- Header -->
  <header class="container">
    <div class="row">
      <div class="col-5">
        <img class="img-fluid" src="img/logo-moldurama.png" alt="logo moldurama">
      </div>
      <div class="col-7">
        <p><i class="fa fa-phone-square" aria-hidden="true"></i>11.4767.5100</p>
        <p><i class="fa fa-phone-square" aria-hidden="true"></i>11.7723.7758</p>
        <p><i class="fab fa fa-whatsapp" aria-hidden="true"></i>11.3596.8714</p>
        <p><i class="fa fa-envelope" aria-hidden="true"></i>info@moldurama.com.ar</p>
      </div>
    </div>
  </header>
  <!-- Header end -->

  <section class="wall-panel">

    <!-- Slide -->
    <section class="slide container-fluid">
      <div class="row">

        <div class="col-md-12">

          <div id="carouselCaptions" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

              <div class="carousel-item active">
                <img src="img/wall-panel/header-wall-panel.jpg" class="d-block w-100" alt="wall panel en mdf">
                <div id="frase_1" class="data wow fadeInUp">
                  <h1>Wall Panel MDF</h1>
                  <p>Dale personalidad a tus espacios.
                  </p>
                </div>
              </div>

            </div>

          </div>

          <!-- <a class="carousel-control-prev" href="#carouselCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a> -->
        </div>

      </div>

      <div class="content_formulario">
        <form id="formulario" method="post" class="needs-validation" novalidate>
          <input type="hidden" name="origin" value="<?= $origin ?>">
          <input type="hidden" name="campaign" value="<?= $campaign ?>">

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
            <input required type="text" class="form-control" id="name" name="name" value="<?= $name ?>"
              placeholder="Nombre">
            <div class="invalid-feedback">
              Por favor ingresá tu nombre
            </div>
          </div>
          <div class="form-group">
            <input required type="email" class="form-control" id="email" name="email" value="<?= $email ?>"
              placeholder="Email">
            <div class="invalid-feedback">
              Por favor ingresá tu email
            </div>
          </div>
          <div class="form-group">
            <textarea required class="form-control" id="comments" name="comments" rows="3" value="<?= $comments ?>"
              placeholder="Comentarios"></textarea>
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

    <!-- Línea Wall Panel -->
    <section class="linea_zocalos">
      <div class="container">
        <div class="row">

          <div class="col-md-8 offset-md-2 text-center">
            <h3>LÍNEA WALL PANEL</h3>
            <p>
              Fabricado en MDF con un espesor delgado y canaletas poco profundas facilitan la limpieza y aprovechan al
              máximo las medidas de tu espacio; Tiene un diseño contemporáneo de líneas limpias, su superficie
              texturizada
              agrega dimensión y carácter a tus paredes además de ser muy versátil ya que podés usarlo en ambientes
              modernos y sofisticados o darle un toque rústico y acogedor a cualquier habitación.
            </p>
          </div>

        </div>

        <div class="row">

          <div class="col-md-6">
            <img class="img-fluid" src="img/zocalos-mdf.jpg" alt="zocalos en mdf">
          </div>

          <div class="col-md-6">

            <div class="titulo">
              <h2>WALL PANEL EN MDF<span>LISTOS PARA COLOCAR</span></h2>
            </div>

            <div class="medidas">
              <p>
                MEDIDAS ESTÁNDAR: <br>
                <span>Cada tira mide 110mm de ancho x 2750mm de alto y 9mm de espesor.
                  Cada empaque contiene 10 tiras de revestimiento que cubren 2,90 m2.</span> <br>
                Colores: <br><span> Prepintado y Natural</span>
              </p>
            </div>

          </div>

        </div>

      </div>
    </section>
    <!-- Línea Wall Panel end -->

    <!-- Línea de Wall Panel Completa -->
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
                  <img class="img-fluid" src="img/wall-panel/wpfn.png" alt="wall panel WPFN">
                  <p class="title">WPFN</p>
                  <p class="description">Wall Panel Natural</p>
                </div>

                <div class="perfil">
                  <img class="img-fluid" src="img/wall-panel/wpfp.png" alt="wall panel WPFP">
                  <p class="title">WPFP</p>
                  <p class="description">Wall Panel Prepintado</p>
                </div>

              </div>

            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- Línea de Wall Panel Completa end -->

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
              Todos nuestros productos pueden personalizarse bajo pedido, tanto en sus medidas como colores.
              <strong>Dejá
                volar tu imaginación</strong>
            </p>
          </div>

        </div>
      </div>
    </section>
    <!-- Medidas y Colores Personalizados end -->

    <!-- Imagenes de wall panel instalados -->
    <section class="instalados">
      <div class="container">
        <div class="row">

          <div class="col-md-4 text-center">
            <img class="img-fluid" src="img/wall-panel/galeria-wall-panel-1.jpg" alt="Imagen de wall panel instalado 1">
          </div>

          <div class="col-md-4 text-center">
            <img class="img-fluid" src="img/wall-panel/galeria-wall-panel-2.jpg" alt="Imagen de wall panel instalado 2">
          </div>

          <div class="col-md-4 text-center">
            <img class="img-fluid" src="img/wall-panel/galeria-wall-panel-3.jpg" alt="Imagen de wall panel instalado 3">
          </div>

        </div>

        <div class="row">

          <div class="col-md-4 text-center">
            <img class="img-fluid" src="img/wall-panel/galeria-wall-panel-4.jpg" alt="Imagen de wall panel instalado 4">
          </div>

          <div class="col-md-4 text-center">
            <img class="img-fluid" src="img/wall-panel/galeria-wall-panel-5.jpg" alt="Imagen de wall panel instalado 5">
          </div>

          <div class="col-md-4 text-center">
            <img class="img-fluid" src="img/wall-panel/galeria-wall-panel-6.jpg" alt="Imagen de wall panel instalado 6">
          </div>

        </div>
      </div>
    </section>
    <!-- Imagenes de wall panel instalados end -->

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
                    Contamos con personal altamente capacitado para orientar a Profesionales de la Arquitectura y
                    Consumidores Finales en la elección del producto ideal para su obra.
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
              Comercializamos productos fabricados con materiales nobles priorizando la calidad, durabilidad y la
              facilidad en su colocación.
            </p>

            <a href="#formulario" class="btn btn-primary transition btn_to_form">COTIZAR AHORA</a>
          </div>
        </div>
      </div>
    </section>
    <!-- Comerzialización end -->

  </section>

  <!-- Footer -->
  <footer>
    <div class="container-fluid">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <a class="transition btn_to_form" href="#formulario"><i class="fa fa-envelope"
                aria-hidden="true"></i>info@moldurama.com.ar</a>
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