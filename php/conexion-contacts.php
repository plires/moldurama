<?php

$dsn = 'mysql:host=192.168.0.194;dbname=contacts;charset=utf8;port:3306';
$db_user = 'plires_moldurama';
$db_pass = 'Perezzs$7478';

$db = new PDO($dsn, $db_user, $db_pass);

$sql = "INSERT INTO contacts values(default, :name, :email, :comments, :origin, :date)";
$stmt = $db->prepare($sql);

$stmt->bindValue(":name", $name, PDO::PARAM_STR);
$stmt->bindValue(":email", $email, PDO::PARAM_STR);
$stmt->bindValue(":comments", $comments, PDO::PARAM_STR);
$stmt->bindValue(":origin", $origin, PDO::PARAM_STR);
$stmt->bindValue(":date", $date, PDO::PARAM_STR);

$stmt->execute();

$db = null;

?>