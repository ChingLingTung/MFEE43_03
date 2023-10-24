<?php
// 先和資料庫連線
require './parts/connect_db.php';
// 如果表格的主鍵欄位有值，轉成整數，沒有值，賦予它0的值
$ride_support_id = isset($_GET['ride_support_id']) ? intval($_GET['ride_support_id']) : 0;
// 如果表格的主鍵欄位有值才執行
if(! empty($ride_support_id)){
  // sql語法將address_book表格中的sid欄位刪除
  $sql = "DELETE FROM ride_support WHERE ride_support_id={$ride_support_id}";
  // 執行上面設定的方法
  $pdo->query($sql);
}
// 刪除資料後再次導回原本所在那頁
$come_from = 'ride_support_list.php';
if(! empty($_SERVER['HTTP_REFERER'])){
  $come_from = $_SERVER['HTTP_REFERER'];
}
// 導回list那支php檔那頁(Location:後要空格)
header('Location: ride_support_list.php');

?>