<?php
// 資料庫連線
require './parts/connect_db.php';



// 設定資料輸出格式
$output = [
  'postData' => $_POST,
  // 設定是否成功輸出
  'success' => false,
  // 設定若有錯誤，報錯格式為何，可以是字串('error' => ''),也可以是陣列(如下所示)
  'errors' => [],
  'response' => []
];

// 在檔頭告訴用戶端,傳送的這份資料格式為 JSON
header('Content-Type: application/json');
// 設定若姓名和信箱的欄位沒有填寫(包含填寫空白)
$isPass = true;
  
// TODO: 資料在寫入之前, 要檢查格式
// 可以用的方法
// trim(): 去除內容頭尾的空白
// strlen(): 查看字串的長度(英數字)
// mb_strlen(): 查看字串的長度(中文韓文日文等非英系字)


// 如果沒有通過檢查不傳送資料
if(! $isPass){
  echo json_encode($output);
  exit;
}

$ride_category_id = $_POST['ride_category_id'];
$thriller_rating = $_POST['thriller_rating'];
$ride_support_id = $_POST['ride_support_id'];
$theme_id = $_POST['theme_id'];

$conditions = [];
$parameters = [];

if (!empty($ride_category_id)) {
    $conditions[] = 'ride_category_id = ?';
    $parameters[] = $ride_category_id;
    $output['response']['ride_category_id'] = "沒有篩選";

}

if (!empty($thriller_rating)) {
  $conditions[] = 'thriller_rating = ?';
  $parameters[] = $thriller_rating;
}

if (!empty($ride_support_id)) {
  $conditions[] = 'ride_category_id = ?';
  $parameters[] = $ride_support_id;
}

if (!empty($theme_id)) {
  $conditions[] = 'theme_id = ?';
  $parameters[] = $theme_id;
}

// sql語法設定，一個欄位對應一個問號，NOW()是sql本身可以取得當下時間的方法，取得時間直接帶入欄位內容
$sql = "SELECT * FROM `amusement_ride` ";

$sql .= " where ".implode(" AND ", $conditions);

// 因上述的sql內容不完整(有問號)，因此這邊不能使用query，要改用prepare讓資料"準備"，資料會檢查
$stmt = $pdo->prepare($sql);
// 真正執行上述的sql指令，對應的所有欄位名稱都要列出
$stmt->execute($parameters);

// 資料送出後會轉成JSON格式供檢查內容，若沒有成功執行(新增資料失敗)，
// rowCount()的值會顯示0，新增資料成功的話rowCount()的值會顯示1
// 檢查輸出是否成功，並將回傳(rowCount()轉換而成)的布林值
$output['success'] = boolval($stmt->rowCount());
$output['sql']= $sql;
$output['resultData'] = $stmt->fetchAll();
// 轉成JSON檔檢視
echo json_encode($output);
?>