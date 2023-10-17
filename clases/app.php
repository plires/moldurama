<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use \DrewM\MailChimp\MailChimp;

require_once( __DIR__ . '/../vendor/autoload.php' );

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

  class App 
  {

    public function saveInBDD($dsn, $db_user, $db_pass, $post, $table)
    {

      try {
        $db = new PDO($dsn, $db_user, $db_pass);
        $date = date("d-M-y H:i");

        if ($table === 'contacts' || $table === 'proyects') {

          $sql = "INSERT INTO $table values(default, :name, :email, :comments, :origin, :date)";
          $stmt = $db->prepare($sql);

          $stmt->bindValue(":name", $_POST['name'], PDO::PARAM_STR);
          $stmt->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
          $stmt->bindValue(":comments", $_POST['comments'], PDO::PARAM_STR);
          $stmt->bindValue(":origin", $_POST['origin'], PDO::PARAM_STR);
          $stmt->bindValue(":date", $date, PDO::PARAM_STR);
            
        } else {

          $sql = "INSERT INTO $table values(default, :email, :origin, :date)";
          $stmt = $db->prepare($sql);

          $stmt->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
          $stmt->bindValue(":origin", $_POST['origin'], PDO::PARAM_STR);
          $stmt->bindValue(":date", $date, PDO::PARAM_STR);
          
        }

        $stmt->execute();

        $db = null;

      } catch (\Throwable $th) {
        throw $th;
      }
      
    }

    public function registerEmailInMailchimp($api, $listId, $data)
    {

      $MailChimp = new MailChimp($api);

      $result = $MailChimp->post("lists/$listId/members", [
        'email_address' => $data['email'],
        'status'        => 'subscribed',
        'merge_fields'    => [
            'MMERGE6'         => $data['origin'],
            'MMERGE7'         => 'Newsletter del sitio - ' . date("F j, Y, g:i a")
        ]
      ]);

      return $result;
    }
    
    public function sendEmail($post, $sendTo, $subject)
    {

      $date = date("d-M-y H:i");

      if(isset($post["name"])) {
        $name = $post["name"];
      } else {
        $name = 'usuario';
      }

      $email = $post["email"];

      if(isset($post["comments"])) {
        $comments = $post["comments"];
      } else {
        $comments = '-';
      }
      
      $origin = $post["origin"];

      $mail = new PHPMailer(true);

      if ($sendTo === 'cliente') {
        $template = file_get_contents( __DIR__ . '/../includes/emails/email-to-client.php');
        //Recipients
        $mail->setFrom($_ENV['EMAIL_CLIENT'], $name);
        $mail->addAddress($_ENV['EMAIL_CLIENT'], $_ENV['NAME_CLIENT']);
        $mail->addReplyTo($email, $name);

        if ($_ENV['CC_USER'] != '') {
          $mail->addCC($_ENV['CC_USER']);
        }
      } else {
        $template = file_get_contents( __DIR__ . '/../includes/emails/email-to-user.php');
        //Recipients
        $mail->setFrom($_ENV['EMAIL_CLIENT'], $_ENV['NAME_CLIENT']);
        $mail->addAddress($email, $name);
        $mail->addReplyTo($_ENV['EMAIL_CLIENT'], $_ENV['NAME_CLIENT']);
      }

      //configuro las variables a remplazar en el template
      $vars = array(
        '{name_client}',
        '{email_client}',
        '{whatsapp_client}',
        '{whatsapp_show_client}',
        '{origin}',
        '{name_user}',
        '{email_user}',
        '{comments_user}',
        '{date}',
        '{base}',
      );

      $values = array( 
        $_ENV['NAME_CLIENT'],
        $_ENV['EMAIL_CLIENT'],
        $_ENV['WHATSAPP_CLIENT'],
        $_ENV['WHATSAPP_SHOW_CLIENT'],
        $origin,
        $name,
        $email,
        $comments,
        $date,
        $_ENV['ROOT'],
      );

      //Remplazamos las variables por las marcas en los templates
      $template_final = str_replace($vars, $values, $template);

      try {

        if ($_ENV['ENVIRONMENT'] === 'local') {
          $mail->isSendmail();
        } else {
          $mail->isSMTP();
        }
        
        //Server settings
        // $mail->SMTPDebug = 4;
        $mail->Host       = $_ENV['SMTP'];
        $mail->SMTPAuth   = true;             
        $mail->Username   = $_ENV['USERNAME'];
        $mail->Password   = $_ENV['PASSWORD'];
        $mail->CharSet    = $_ENV['EMAIL_CHARSET'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       =  $_ENV['EMAIL_PORT'];

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        // content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $template_final;
        
        return $mail->send();
      } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
      }
    }

  }

?>