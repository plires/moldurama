<!-- Validaciones formulario de proyectos -->
<?php

	require_once( __DIR__ . '/../vendor/autoload.php' );
	require_once( __DIR__ . '/../clases/app.php' );
	$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
	$dotenv->safeLoad();

	$errors_proyect=array();
	$name_proyects="";
	$email_proyects="";
	$comments_proyects="";
	$origin_proyects="";

	if (isset($_POST['proyectos'])){
		include ('includes/funciones_validar.inc');

		if(isset($_POST['g-recaptcha-response'])){
			$captcha=$_POST['g-recaptcha-response'];
		}

		$secretKey = $_ENV['RECAPTCHA_SECRET_KEY'];
		
		$ip = $_SERVER['REMOTE_ADDR'];
		$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
		$responseKeys = json_decode($response,true);

		if ($responseKeys['success']) {

			if(campoVacio($_POST['name'])){
				$errors_proyect['name']='Ingresa tu nombre';
			} else {
				$name_proyects = $_POST['name'];
			}

			if(campoVacio($_POST['comments'])){
				$errors_proyect['comments']='Ingresa tu consulta';
			} else {
				$comments_proyects = $_POST['comments'];
			}

			if (!comprobar_email($_POST['email'])){
				$errors_proyect['email_proyects']='Ingresa un email valido';
			} else {
				$email_proyects = $_POST['email'];
			}

		} else {
			$errors_proyect['recaptcha'] = 'Error al validar el recaptcha';
		}

		if (count($errors_proyect) === 0){
			$app = new App;
				// Registramos en Perfit el contacto
				// $app->registerEmailContactsInPerfit($_ENV['PERFIT_APY_KEY'], $_ENV['PERFIT_LIST'], $_POST);
				
				// Grabar en la base de datos
				$app->saveInBDD($_ENV['DSN'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_POST, 'proyects');

				// Enviamos los correos:
				$send = $app->sendEmail($_POST, 'cliente', 'Consulta desde el Formulario de Proyectos');
				$app->sendEmail($_POST, 'usuario', 'Gracias por tu contacto');

				if ($send) {
				?>
<script type="text/javascript">
window.location = 'gracias.php';
</script>
<?php
				}
		}

	}

?>
<!-- Validaciones formulario de proyectos end-->