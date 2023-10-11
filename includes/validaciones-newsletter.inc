<!-- Validaciones newsletter -->
<?php

	require_once( __DIR__ . '/../vendor/autoload.php' );
	require_once( __DIR__ . '/../clases/app.php' );
	$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
	$dotenv->safeLoad();

	$errors_news=array();
	$email_news="";
	$origin_news="";

	if (isset($_POST['newsletter'])){
		include ('includes/funciones_validar.inc');

		if (!comprobar_email($_POST['email'])){
			$errors_news['email']='Ingresa un email valido';
		} else {
			$email_news = $_POST['email'];
		}

		if (count($errors_news) === 0){
				$app = new App;
					// Registramos en Mailchimp el contacto
					$app->registerEmailInMailchimp($_ENV['API_KEY_MAILCHIMP'], $_ENV['LIST_ID'], $_POST);
					
					// Grabar en la base de datos
					$app->saveInBDD($_ENV['DSN'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_POST, 'newsletters');

					// Enviamos los correos:
					// $send = $app->sendEmail($_POST, 'cliente', 'Nueva suscripción al Newsletter');
					// $app->sendEmail($_POST, 'usuario', 'Gracias por tu suscripción');

					?>
<script type="text/javascript">
window.location = 'gracias.php';
</script>
<?php
			}

	}

?>
<!-- Validaciones newsletter end-->