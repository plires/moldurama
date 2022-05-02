<!-- Validaciones newsletter -->
<?php

$errors_news=array();
$email_news="";
$origin_news="";

if (isset($_POST['newsletter'])){
	include ('includes/funciones_validar.inc');

	if (!comprobar_email($_POST['email_news'])){
	  $errors_news['email_news']='Ingresa un email valido';
	} else {
	  $email_news = $_POST['email_news'];
	}

	if (count($errors_news) === 0){
		include_once("php/envio-newsletter.php");
	}

}

?>
<!-- Validaciones newsletter end-->