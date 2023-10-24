<?php
// 主機名稱
$db_host = "localhost";
// 資料庫名稱
$db_name = "rides";#學校的

// 使用者名稱
$db_user = "root";
// 使用者密碼
$db_pass = "";#學校的
// $db_pass = "123456";#家裡的


# data source name
$dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4";

$pdo_options = [
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

// 在PDO的class底下新增單一個體
$pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options);
// 登入密碼驗證
if(!isset($_SESSION)){
  session_start();
}
