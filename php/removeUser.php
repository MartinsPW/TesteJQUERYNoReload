<?php
require("pdo.php");


$comando = $pdo->prepare("DELETE FROM users WHERE id = :cod");
$comando->bindValue(':cod', $_POST['e'], PDO::PARAM_STR);
$comando->execute();
echo 'Registo apagado com sucesso!';
 ?>
