<!-- Validaciones formulario de proyectos -->
<?php

include_once('includes/config.inc.php');

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

  $secretKey = RECAPTCHA_SECRET_KEY;
  
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
		include_once("php/envio-proyects.php");
	}	

}

?>
<!-- Validaciones formulario de proyectos end-->