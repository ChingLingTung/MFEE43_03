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
];

// 在檔頭告訴用戶端,傳送的這份資料格式為 JSON
header('Content-Type: application/json');
// 設定若姓名和信箱的欄位沒有填寫(包含填寫空白)
$isPass = true;
  if(empty($_POST['ride_category_name']))
    {// {檢查不通過
      $isPass = false;
    // 輸出錯誤訊息error{'form':''}
      $output['errors']['ride_category_name'] = '請輸入設施種類名稱';
    }
    if(empty($_POST['ride_category_description']))
    {// {檢查不通過
      $isPass = false;
    // 輸出錯誤訊息error{'form':''}
      $output['errors']['ride_category_description'] = '請輸入設施種類簡述';
    }if(empty($_POST['height_requirement']))
    {// {檢查不通過
      $isPass = false;
    // 輸出錯誤訊息error{'form':''}
      $output['errors']['height_requirement'] = '請輸入身高限制';
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
$sql = "INSERT INTO `ride_category`(
  `ride_category_name`, `ride_category_description`, `height_requirement`
  ) VALUES (
    ?, ?, ?
  )";
// 因上述的sql內容不完整(有問號)，因此這邊不能使用query，要改用prepare讓資料"準備"，資料會檢查
$stmt = $pdo->prepare($sql);
// 真正執行上述的sql指令，對應的所有欄位名稱都要列出
$stmt->execute([

  $_POST['ride_category_name'],
  $_POST['ride_category_description'],
  $_POST['height_requirement'],
]);

// 資料送出後會轉成JSON格式供檢查內容，若沒有成功執行(新增資料失敗)，
// rowCount()的值會顯示0，新增資料成功的話rowCount()的值會顯示1
// 檢查輸出是否成功，並將回傳(rowCount()轉換而成)的布林值
$output['success'] = boolval($stmt->rowCount());
// 轉成JSON檔檢視
echo json_encode($output);
?>