<?php
// 資料庫連線
require './parts/connect_db.php';

// 以下這種寫法會有 SQL injection，可能會被用於鑽漏洞重新設定SQL指令
// 因為值包含SQL語法的符號，值如果包含單引號就會出錯
// $sql = sprintf("INSERT INTO `address_book`(
//   `name`, `email`, `mobile`, `birthday`, `address`, `created_at`
//   ) VALUES (
//     '%s', '%s', '%s', '%s', '%s', NOW()
//   )", 
//     $_POST['name'],
//     $_POST['email'],
//     $_POST['mobile'],
//     $_POST['birthday'],
//     $_POST['address']
// );
// $stmt = $pdo->query($sql);

// 設定資料輸出格式
$output = [
  'postData' => $_POST,
  // 設定是否成功輸出
  'success' => false,
  // 設定若有錯誤，報錯格式為何，可以是字串('error' => ''),也可以是陣列(如下所示)
  'errors' => [],
];

// 在檔頭告訴用戶端,傳送的這份資料格式為 JSON
header('Content-Type: application/json');
// 設定若姓名和信箱的欄位沒有填寫(包含填寫空白)
$isPass = true;
  if(empty($_POST['amusement_ride_name']))
    {// {檢查不通過
      $isPass = false;
    // 輸出錯誤訊息error{'form':''}
      $output['errors']['amusement_ride_name'] = '請填寫設施名稱';
    }
  if(empty($_POST['amusement_ride_img']))
    {
      $isPass = false;
      $output['errors']['img'] = '請上傳設施圖片';
    }
  if(empty($_POST['amusement_ride_longitude']))
    {
      $isPass = false;
      $output['errors']['longitude'] = '請填寫設施經度';
    }  
  if(empty($_POST['amusement_ride_latitude']))
    {
      $isPass = false;
      $output['errors']['latitude'] = '請填寫設施緯度';
    }  
  if(empty($_POST['ride_category_id']))
    {
      $isPass = false;
      $output['errors']['ride_category_id'] = '請選擇設施種類';
    }
  if(empty($_POST['thriller_rating']))
    {
      $isPass = false;
      $output['errors']['thriller_rating'] = '請選擇設施刺激程度';
    }
    if(empty($_POST['ride_support_id']))
    {
      $isPass = false;
      $output['errors']['ride_support_id'] = '請選擇設施支援類型';
    }
  if(empty($_POST['amusement_ride_description']))
    {
      $isPass = false;
      $output['errors']['amusement_ride_description'] = '請填寫設施相關敘述';
    }
  
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
// sql語法設定，一個欄位對應一個問號，NOW()是sql本身可以取得當下時間的方法，取得時間直接帶入欄位內容
$sql = "INSERT INTO `amusement_ride`(
  `amusement_ride_name`, `amusement_ride_img`, `amusement_ride_longitude`, `amusement_ride_latitude`, `ride_category_id`,`thriller_rating`,`ride_support_id`,`created_at`,`theme_id`,`amusement_ride_description`
  ) VALUES (
    ?, ?, ?, ?, ?, ?, ?, NOW(), ?, ?
  )";
// 因上述的sql內容不完整(有問號)，因此這邊不能使用query，要改用prepare讓資料"準備"，資料會檢查
$stmt = $pdo->prepare($sql);
// 真正執行上述的sql指令，對應的所有欄位名稱都要列出
$stmt->execute([

  $_POST['amusement_ride_name'],
  $_POST['amusement_ride_img'],
  $_POST['amusement_ride_longitude'],
  $_POST['amusement_ride_latitude'],
  $_POST['ride_category_id'],
  $_POST['thriller_rating'],
  $_POST['ride_support_id'],
  $_POST['theme_id'],
  $_POST['amusement_ride_description'],
]);

// 資料送出後會轉成JSON格式供檢查內容，若沒有成功執行(新增資料失敗)，
// rowCount()的值會顯示0，新增資料成功的話rowCount()的值會顯示1
// 檢查輸出是否成功，並將回傳(rowCount()轉換而成)的布林值
$output['success'] = boolval($stmt->rowCount());
// 轉成JSON檔檢視
echo json_encode($output);
?>