<!-- Validaciones formulario de contacto -->
<?php

	require_once( __DIR__ . '/../vendor/autoload.php' );
	require_once( __DIR__ . '/../clases/app.php' );
	$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
	$dotenv->safeLoad();

	$errors_contacto=array();
	$name_contacto="";
	$email_contacto="";
	$comments_contacto="";
	$origin_contacto="";

	if (isset($_POST['contacto'])){
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
				$errors_contacto['name']='Ingresa tu nombre';
			} else {
				$name_contacto = $_POST['name'];
			}

			if(campoVacio($_POST['comments'])){
				$errors_contacto['comments']='Ingresa tu consulta';
			} else {
				$comments_contacto = $_POST['comments'];
			}

			if (!comprobar_email($_POST['email'])){
				$errors_contacto['email_contacto']='Ingresa un email valido';
			} else {
				$email_contacto = $_POST['email'];
			}

		} else {
			$errors_contacto['recaptcha'] = 'Error al validar el recaptcha';
		}

		if (count($errors_contacto) === 0){
			$app = new App;
				// Registramos en Perfit el contacto
				// $app->registerEmailContactsInPerfit($_ENV['PERFIT_APY_KEY'], $_ENV['PERFIT_LIST'], $_POST);
				
				// Grabar en la base de datos
				$app->saveInBDD($_ENV['DSN'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_POST, 'contacts');

				// Enviamos los correos:
				$send = $app->sendEmail($_POST, 'cliente', 'Consulta desde el Formulario de Contactos');
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
<!-- Validaciones formulario de contacto end-->