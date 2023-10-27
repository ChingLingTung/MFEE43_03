<?php

$db_host = "localhost";
<<<<<<< HEAD
// $db_name = "product_db";
$db_name = "ride";
$db_user = "root";
// $db_pass = "root";
$db_pass = "123456";
=======
$db_name = "rides";
$db_user = "root";
$db_pass = "";
>>>>>>> 97c496920cbd5f3fca98ce38f21823e2352e56eb

# data source name
$dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4";

$pdo_options = [
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

$pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options);


if(!isset($_SESSION)){
  session_start();
}




