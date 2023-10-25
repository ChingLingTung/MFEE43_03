<?php
// 先和資料庫連線
require './parts/connect_db.php';
// 如果表格的主鍵欄位有值，轉成整數，沒有值，賦予它0的值
$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
// 如果表格的主鍵欄位有值才執行
if(! empty($sid)){
  // sql語法將address_book表格中的sid欄位刪除
  $sql = "DELETE FROM address_book WHERE sid={$sid}";
  // 執行上面設定的方法
  $pdo->query($sql);
}
// 刪除資料後再次導回原本所在那頁
$come_from = 'list.php';
if(! empty($_SERVER['HTTP_REFERER'])){
  $come_from = $_SERVER['HTTP_REFERER'];
}
// 導回list那支php檔那頁(Location:後要空格)
header('Location: list.php');

// PHP $_SERVER[‘HTTP_REFERER’] 無效
// 需要注意的是，$_SERVER[‘HTTP_REFERER’] 完全來源於瀏覽器。並不是所有的用戶代理（瀏覽器）都會設置這個變量，而且有的還可以手工修改HTTP_REFERER。因此，$_SERVER[‘HTTP_REFERER’] 不總是真實正確的。

// 通常下面的一些方式，$_SERVER[‘HTTP_REFERER’] 會無效：

// 直接輸入網址訪問該網頁。
// Javascript 打開的網址。
// Javascript 重定向（window.location）網址。
// 使用meta refresh重定向的網址。
// 使用PHP header 重定向的網址。
// flash 中的鏈接。
// 瀏覽器未加設置或被用戶修改。
// 所以一般來說，只有通過<a></a>超鏈接以及POST或GET表單訪問的頁面，$_SERVER[‘HTTP_REFERER’]才有效。

// 由於$_SERVER[‘HTTP_REFERER’] 對POST 表單訪問也是有效的，因此在表單數據處理頁面一定程度上可以通過校驗$_SERVER[‘HTTP_REFERER’] 來防止表單數據的惡意提交。但該方法並不能保證表單數據的絕對正確，即對錶單數據的真實性檢測並不能完全依賴於$_SERVER[‘HTTP_REFERER’] 。