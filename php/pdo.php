<?php
/*
  @TODO: This is all functions
*/
global $pdo,$options;

$host = 'localhost';
$user = 'root';
$db = 'localhost';
$pass = '';


$options = array();
$options = [
      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

define('DATABASE_HOST', 'localhost');
define('DATABASE_NAME', 'test');
define('DATABASE_USER', 'root');
define('DATABASE_PASS', '');
  try {
    $pdo = new PDO('mysql:host=' . DATABASE_HOST . ';dbname=' . DATABASE_NAME, DATABASE_USER, DATABASE_PASS, $options);
  } catch (PDOException $exeption) {
    echo 'PDO Error: <br>';
    echo $exeption->getMessage();
    exit;
  }

 ?>
