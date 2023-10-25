<?php
// 資料庫連線
require './parts/connect_db.php';
// 在檔頭告訴用戶端,傳送的這份資料格式為 JSON
header('Content-Type: application/json');



// 設定資料輸出格式
$output = [
  'postData' => $_POST,
  // 設定是否成功輸出
  'success' => false,
  // 設定若有錯誤，報錯格式為何，可以是字串('error' => ''),也可以是陣列(如下所示)
  'errors' => [],
];

// 取得資料的主鍵
$ride_category_id = isset($_POST['ride_category_id']) ? intval($_POST['ride_category_id']) : 0;
if (empty($ride_category_id)) {
  $output['errors']['ride_category_id'] = "沒有主鍵";
  echo json_encode($output);
  exit; // 結束程式
}

$ride_category_name = $_POST['ride_category_name'];
$ride_category_description = $_POST['ride_category_description'];
$height_requirement = $_POST['height_requirement'];

// TODO: 資料在寫入之前, 要檢查格式
// 可以用的方法
// trim(): 去除內容頭尾的空白
// strlen(): 查看字串的長度(英數字)
// mb_strlen(): 查看字串的長度(中文韓文日文等非英系字)
$isPass = true;
// 檢查資料格式，如果格式錯誤，回報格式錯誤
if(empty($ride_category_name)){
  $isPass=false;
}
if(empty($ride_category_description)){
  $isPass=false;
}
if(empty($height_requirement)){
  $isPass=false;
}
// 如果沒有通過檢查不傳送資料
if(! $isPass){
  echo json_encode($output);
  exit;
}
// sql語法設定
$sql = "UPDATE `ride_category` SET 
`ride_category_name`=?,
`ride_category_description`=?,
`height_requirement`=?
WHERE `ride_category_id`=? ";
// 因上述的sql內容不完整(有問號)，因此這邊不能使用query，要改用prepare讓資料"準備"，資料會檢查
$stmt = $pdo->prepare($sql);
// 真正執行上述的sql指令，對應的所有欄位名稱都要列出
$stmt->execute([
  $ride_category_id,
  $ride_category_name,
  $ride_category_description,
  $height_requirement
]);

$output['rowCount'] = $stmt->rowCount();
// 資料送出後會轉成JSON格式供檢查內容，若沒有成功執行(新增資料失敗)，
// rowCount()的值會顯示0，新增資料成功的話rowCount()的值會顯示1
// 檢查輸出是否成功，並將回傳(rowCount()轉換而成)的布林值
$output['success'] = boolval($stmt->rowCount());
// 轉成JSON檔檢視
echo json_encode($output);
?>