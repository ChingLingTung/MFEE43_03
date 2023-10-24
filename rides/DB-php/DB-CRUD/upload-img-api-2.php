<?php
// 取得這支php檔案所在的位置並設定以$dir表示
$dir = __DIR__ . '/../upload_img/';
// 避免用戶傳垃圾檔案，只允許三種圖檔格式
$exts = [
  'image/jpeg' => '.jpg',
  'image/png' => '.png',
  'image/webp' => '.webp',
];
// 在檔頭告訴用戶端這支檔案是JSON格式
header('Content-Type: application/json');
// 當要上船多個圖檔時，設定一個$output陣列且陣列中預設success值是false，file值要從空字串改成陣列
$output = [
  'success' => false,
  'file' => []
];
// 如果檔案存在(有傳檔案)且檔案的內容也存在
if (!empty($_FILES) and !empty($_FILES['photos'])) {
  // 如果取得的這個資料是陣列才繼續執行下面的程式
  if (is_array( $_FILES['photos']['name'])) {
    // 迴圈取得$i指向name的值
    foreach ($_FILES['photos']['name'] as $i => $name) {

      if (!empty($exts[$_FILES['photos']['type'][$i]])) {
        $ext = $exts[$_FILES['photos']['type'][$i]]; // 副檔名

        # 隨機的主檔名
        $f = sha1($name . uniqid() . rand());

        if (
          move_uploaded_file(
            $_FILES['photos']['tmp_name'][$i],
            $dir . $f . $ext
          )
        ) {
          // array push，將$f . $ext這個值(檔名)塞進files陣列中
          $output['files'][] = $f . $ext;  
        }
      }
    }
    //用count判斷是否為1，1才是true
    if (count($output['files'])) {
      $output['success'] = true;
    }
  }
}

header('Content-Type: application/json');
echo json_encode($output);
echo json_encode($_FILES);


