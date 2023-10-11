<?php
  require_once( __DIR__ . '/vendor/autoload.php' );
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
  $dotenv->safeLoad();
  
  include_once('includes/validaciones-proyects.inc'); 
  include_once('includes/validaciones-newsletter.inc');
?>

<!doctype html>
<html lang="es">

<head>
  <!-- Tag Manager Head -->
  <?php include_once("includes/tag_manager_head.inc"); ?>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description"
    content="Proyectos en instalacion. zócalos y contramarcos permiten ahorrar tiempo y dinero ya que vienen listos para colocar. Descubrí nuestra línea de contramarcos y dale a tus ambientes un toque de distinción.">

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

  <title>Proyectos - Zocalos, molduras y contramarcos de madera.</title>
</head>

<body>
  <!-- Tag Manager Body -->
  <?php include_once("includes/tag_manager_body.inc"); ?>

  <?php $current = 'proyectos'; ?>

  <!-- WhatsApp -->
  <?php include_once("includes/wapp.inc"); ?>

  <!-- Header -->
  <?php include_once('includes/header.inc'); ?>

  <!-- Slider Estático -->
  <section class="proyectos container-fluid bg-azul text-white text-center p-0 mb-5">

    <div class="text-right">
      <div class="header_faja">
        <h1>PROYECTOS</h1>
        <h2>
          Contamos con personal altamente capacitado para orientar a nuestros clientes en la elección del producto ideal
          para su obra.
        </h2>
      </div>
    </div>

  </section>
  <!-- Slider Estático end -->


  <!-- Titulo y textos -->
  <section class="container mb-3">

    <div class="row">

      <div class="col-md-8 offset-md-2 text-center mb-3">
        <h2 class="color-azul wow fadeInUp">Asistencia y asesoramiento en obra</h2>
      </div>

      <div class="col-md-6 offset-md-3 text-center mb-5">
        <p class="wow fadeInUp">
          Contactanos para recibir asesoramiento personalizado y realizar las consultas que necesites.
        </p>
      </div>

    </div>
  </section>
  <!-- Titulo y textos end -->

  <!-- Formulario -->
  <section class="contacto container mb-5">

    <div class="row">
      <div class="col-md-12">

        <form method="post" action="">
          <div class="form-row">

            <div class="col-md-6">

              <input type="hidden" name="origin" value='Formulario de Proyectos'>

              <div class="form-group col-md-12">
                <label for="name">Nombre</label>
                <input required type="text" class="form-control" name="name" placeholder="Nombre"
                  value='<?php echo $name_proyects; ?>'>
              </div>

              <div class="form-group col-md-12">
                <label for="email">Email</label>
                <input required type="email" class="form-control" name="email" placeholder="Email"
                  value='<?php echo $email_proyects; ?>'>
              </div>

            </div>

            <div class="col-md-6">
              <div class="form-group col-md-12">
                <label for="comments">Comentarios...</label>
                <textarea required class="form-control" id="comments" name="comments"
                  rows="5"><?php echo $comments_proyects; ?></textarea>
              </div>

              <div class="form-group col-md-12">
                <div class="error">
                  <ul>
                    <?php foreach ($errors_proyect as $error_proyect) { ?>
                    <li><?php echo $error_proyect; ?></li>
                    <?php } ?>
                  </ul>
                </div>
              </div>

              <!-- reCAPTCHA  -->
              <div class="form-group">
                <div id="recaptcha" class="g-recaptcha" data-sitekey="<?= $_ENV['RECAPTCHA_SITE_KEY'] ?>"></div>
              </div>

              <div class="form-group col-md-12 text-right">
                <button id="proyectos" name="proyectos" type="submit" class="btn btn_site font_1em">Enviar</button>
              </div>
            </div>


          </div>

        </form>

      </div>

  </section>
  <!-- Formulario end -->

  <!-- Imagenes -->
  <section class="container-fluid mb-5">

    <div class="row">
      <div class="col-lg-6 p-0">
        <img class="img-fluid" src="img/proyectos/zocalos-construccion-viviendas.jpg"
          alt="zocales para viviendas en construccion">
        <p class="proyectos_imagenes_parrafo">Asesoramiento en la instalación de zócalos y contramarcos en vivienda
          familiar</p>
      </div>

      <div class="col-lg-6 p-0">
        <img class="img-fluid" src="img/proyectos/zocalos-instalados-viviendas.jpg"
          alt="zocales para viviendas terminadas">
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6 p-0">
        <img class="img-fluid" src="img/proyectos/contramarco-construccion-locales.jpg"
          alt="contramarcos para locales en construccion">
        <p class="proyectos_imagenes_parrafo">Asesoramiento en la instalación de zócalos en local comercial</p>
      </div>

      <div class="col-lg-6 p-0">
        <img class="img-fluid" src="img/proyectos/contramarco-instalado-locales.jpg"
          alt="contramarcos para locales en terminados">
      </div>
    </div>

  </section>
  <!-- Imagenes end -->

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