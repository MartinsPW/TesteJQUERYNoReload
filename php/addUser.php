<?php
require("pdo.php");

$user = $_POST['user'];
$password = $_POST['password'];


$comando = $pdo->prepare("INSERT INTO users (name, password) VALUES (:u, :p)");
$comando->bindValue(':u', $_POST['user'], PDO::PARAM_STR);
$comando->bindValue(':p', $_POST['password'], PDO::PARAM_STR);
$comando->execute();
ob_clean();

echo "Registo inserido com sucesso!";

 ?>
