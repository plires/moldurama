<?php 

////////////////////////
///Valores de DB Local
////////////////////////
// define('DSN', 'mysql:host=localhost;dbname=lc_dellabitta;charset=utf8;port:3306');
// define('DB_USER', 'root');
// define('DB_PASS', 'root');

////////////////////////
///Valores de DB Remota
////////////////////////
define('DSN', 'mysql:host=190.228.29.65;dbname=contacts;charset=utf8;port:3306');
define('DB_USER', 'plires_moldurama');
define('DB_PASS', 'Perezzs$7478');

//////////////////////////////
///Valores de Envio de emails
//////////////////////////////
define('SMTP', 'smtp.moldurama.com.ar');
define('EMAIL_SENDER', 'envios@moldurama.com.ar');
define('EMAIL_SENDER_SHOW', 'info@moldurama.com.ar');
define('NAME_SENDER_SHOW', 'Moldurama');
define('EMAIL_RECIPIENT', 'info@moldurama.com.ar');
define('EMAIL_BCC', 'pablo@librecomunicacion.net');
define('EMAIL_PASS', '4uucIzhi8JI0');
define('EMAIL_PORT', 587);
define('EMAIL_NAME', 'Moldurama');
define('EMAIL_SUBJECT', 'Gracias por tu contacto');
define('EMAIL_CHARSET', 'utf-8');
define('EMAIL_ENCODING', 'quoted­printable');

////////////////////////
///API KEY RECAPTCHA
////////////////////////
define("RECAPTCHA_PUBLIC_KEY","6LcYmHUUAAAAAHZJjJ9SHb0EBWFm_jdW6GPtyCf3");
define("RECAPTCHA_SECRET_KEY","6LcYmHUUAAAAAF0jXteeFtfqrtUZ76C8cm3fzazT");

////////////////////////
///Mailchimp
////////////////////////
define('API_KEY_MAILCHIMP', '70db151f81dab9080f21ff0b5670e736-us7');
define('LIST_ID', '1b9d60ae05');

?>