<?php
require './parts/connect_db.php';

$PDcategory_id = isset($_GET['PDcategory_id']) ? intval($_GET['PDcategory_id']) : 0;
if(! empty($PDcategory_id)){
  $sql = "DELETE FROM product_category WHERE PDcategory_id={$PDcategory_id}";
  $pdo->query($sql);
}

$come_from = 'product_cate2_list.php';
if(! empty($_SERVER['HTTP_REFERER'])){
    //如果不是空的 資料
  $come_from = $_SERVER['HTTP_REFERER'];
}

header("Location: $come_from");