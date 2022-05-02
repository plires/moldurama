<?php

$name = $_POST['name'];
$email = $_POST['email'];
$comments = $_POST['comments'];
$origin = $_POST['origin'];
$date = date("d-M-y H:i");

//Confeccionamos el HTML con los datos del usuario
$content='
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Proyectos</title>

  <style type="text/css">
  </style>    
</head>
<body style="margin:0; padding:0; background-color:#fff;">
  <center>
    <table bgcolor="#fff" width="95%" border="0" cellpadding="0" cellspacing="0">
      <tr>
           <td height="40" style="font-size:10px; line-height:10px;">&nbsp;</td>
       </tr>
      <tr>
      <tr>
          <td align="center" valign="top">
            <img src="http://moldurama.com.ar/img/header/logo-moldurama.png" width="" height="" style="margin:0; padding:0; border:none; display:block;" border="0" alt="" /> 
          </td>
      </tr>
       <tr>
           <td height="40" style="font-size:10px; line-height:10px;">&nbsp;</td>
      </tr>
      <tr>
          <td align="center" valign="top" style="font-size:25px; line-height:10px;"><strong>Moldurama - '.$origin.'</strong></td>
      </tr>
      <tr>
           <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
      </tr>

      <tr>
          <td align="center" valign="top" style="font-size:16px; line-height:10px;"><p><strong>Nombre: </strong>'.$name.'</p></td>
      </tr>

      <tr>
           <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
      </tr>
      <tr>
          <td align="center" valign="top"><p><strong>Email: </strong>'.$email.'</p></td>
      </tr>

      <tr>
           <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
      </tr>
      <tr>
          <td align="center" valign="top" style="font-size:16px; line-height:10px;"><p><strong>Comentarios: '.$comments.'</strong></p></td>
      </tr>
    
      <tr>
           <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
      </tr>
      <tr>
          <td align="center" valign="top" style="font-size:16px; line-height:10px;"><p><strong>Fecha: </strong>'.$date.'</p></td>
      </tr>

      <tr>
           <td height="40" style="font-size:10px; line-height:10px;">&nbsp;</td>
      </tr>
      <tr>
          <td style="color: #666666;" align="center" valign="top">
            La Paz 4552 Villa Ballester. Buenos Aires - Argentina <br>Teléfonos: (+5411) 4767.5100
            <span style="font-family: Arial, sans-serif; font-size: 12px; color: #444444;">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
            <a href="mailto:info@moldurama.com.ar" style="color: #666666; text-decoration: none;">info@moldurama.com.ar</a>
          </td>
      </tr>

    </table>
  </center>
</body>
</html>
';

//preparamos el mensaje de confirmacion que le enviaremos al remitente.
$mensaje = '
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title></title>

  <style type="text/css">
  </style>    
</head>
<body style="margin:0; padding:0; background-color:#fff;">
  <center>
    <table bgcolor="#fff" width="95%" border="0" cellpadding="0" cellspacing="0">
      <tr>
           <td height="40" style="font-size:10px; line-height:10px;">&nbsp;</td>
       </tr>
      <tr>
      <tr>
          <td align="center" valign="top">
            <img src="http://moldurama.com.ar/img/header/logo-moldurama.png" width="" height="" style="margin:0; padding:0; border:none; display:block;" border="0" alt="" /> 
          </td>
      </tr>
       <tr>
           <td height="40" style="font-size:10px; line-height:10px;">&nbsp;</td>
       </tr>
      <tr>
          <td align="center" valign="top">
            <strong>Estimado usuario, <br> Moldurama agradece su contacto.</strong> <br>
            <p>
                Nuestro personal se comunicará con usted a la brevedad posible.
            </p>

            <p>
                Si tiene consultas puede escribirnos a <a href="mailto:info@moldurama.com.ar">info@moldurama.com.ar</a>
            </p>

            <p><strong>Atentamente, Moldurama</strong></p>
          </td>
      </tr>
      
      <tr>
           <td height="40" style="font-size:10px; line-height:10px;">&nbsp;</td>
       </tr>
      <tr>
          <td style="color: #666666;" align="center" valign="top">
            La Paz 4552 Villa Ballester. Buenos Aires - Argentina <br>Teléfonos: (+5411) 4767.5100
            <span style="font-family: Arial, sans-serif; font-size: 12px; color: #444444;">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
            <a href="mailto:info@moldurama.com.ar" style="color: #666666; text-decoration: none;">info@moldurama.com.ar</a>
          </td>
      </tr>

    </table>
  </center>
</body>
</html>

';

// Envio a la tienda
mail('info@moldurama.com.ar', 'Formulario Web Proyectos', $content,"MIME-Version: 1.0\nContent-type: text/html; charset=UTF-8\nFrom: $name < $email >");
mail('terminacionesnacionales@gmail.com', 'Formulario Web Proyectos', $content,"MIME-Version: 1.0\nContent-type: text/html; charset=UTF-8\nFrom: $name < $email >");

// Envio del mail al usuario
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
$cabeceras .= 'From: Moldurama < info@moldurama.com.ar >' . "\r\n";
mail ("$name < $email >", "Su correo ha sido recibido",$mensaje,$cabeceras);

// Registro la consulta en la bdd
include("conexion-proyects.php");

?>

<!-- Redirecciono a Page de Gracias -->
<script type="text/javascript">
window.location= 'gracias.php';
</script>

