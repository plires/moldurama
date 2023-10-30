<?php

require_once("repositorioContacts.php");

class RepositorioContactsSQL extends repositorioContacts
{
  protected $conexion;

  public function __construct($conexion) 
  {
    $this->conexion = $conexion;
  }

  public function saveInBDD($post)
  {

    if (isset($_POST['newsletter'])) {
      $newsletter = 'Si';
    } else {
      $newsletter = 'No';
    }

    $sql = "INSERT INTO landings values(default, :name, :email, :comments, :origin, :campaign, :newsletter, :date)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(":name", $post['name'], PDO::PARAM_STR);
        $stmt->bindValue(":email", $post['email'], PDO::PARAM_STR);
        $stmt->bindValue(":comments", $post['comments'], PDO::PARAM_STR);
        $stmt->bindValue(":origin", $post['origin'], PDO::PARAM_STR);
        $stmt->bindValue(":campaign", $post['campaign'], PDO::PARAM_STR);
        $stmt->bindValue(":newsletter", $newsletter, PDO::PARAM_STR);
        $stmt->bindValue(":date", date("F j, Y, g:i a"), PDO::PARAM_STR);
        
    $save = $stmt->execute();

    return $save;

  }

}

?>