<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Zocalos en MDF blanco, negro y de varios colores. Contramarcos de madera.">
  <meta name="author" content="Librecomunicacion">
  <!-- Favicons -->
  <?php include('includes/favicon.inc.php'); ?>
  <title>Gracias por tu contacto. - Zócalos y Contramarcos de Madera y MDF</title>

  <link rel="stylesheet" href="node_modules/normalize.css/normalize.css">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="stylesheet" href="css/app.css">
  <?php include('includes/tag_manager_head.inc') ?>
</head>

<body>
  <?php include('includes/tag_manager_body.inc') ?>

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

  <!-- Gracias -->
  <section class="gracias container-fluid">
    <div class="row">
      <div class="col-md-12">

        <img src="img/wall-panel/header-wall-panel.jpg" class="d-block w-100" alt="wall panel en mdf">

        <div class="mensaje wow fadeInUp">
          <h1>ENVIO EXITOSO!</h1>
          <p>Gracias por tu contacto. <br>Te responderemos a la brevedad.</p>
          <a href="https://moldurama.com.ar/" class="btn btn-primary transition">SEGUIR NAVEGANDO</a>
        </div>

      </div>
    </div>

  </section>
  <!-- Gracias end -->

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

  <!-- Footer -->
  <footer>
    <div class="container-fluid">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <a class="transition" href="https://moldurama.com.ar/contacto.php"><i class="fa fa-envelope"
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