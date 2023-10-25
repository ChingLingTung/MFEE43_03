<?php
require './parts/connect_db.php';

$pageName = 'login';
$formtitle = '登入';


?>
<?php


$users = [

  '123456' => [
    'hash' => '$2y$10$nFQ6d.SgqFcujeQY6Swq6eQCGEigPV46BZYvs9JjJK4at7vc92kjG',
    'nickname' => '123456',
  ],
];

# 先判斷是否有表單資料
if (isset($_POST['account'])) {
  $errInfo = "帳號或密碼錯誤";

  # 帳號是否正確
  if (isset($users[$_POST['account']])) {
    $item = $users[$_POST['account']];

    
    if (password_verify($_POST['password'], $item['hash'])) {
      unset($errInfo);  # 取消設定
      $_SESSION['admin'] = [
        'id' => $_POST['account'],
        'nickname' => $item['nickname'],
      ];
    } else {
      # 密碼是錯的
    }
  } else {
    # 帳號是錯的
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- 設定標題跟著改變 -->
  <title>登入</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  
</head>
<body>


  <?php if (isset($_SESSION['admin'])) : ?>
    <h2 class="ms-3"><?= $_SESSION['admin']['nickname'] ?> 您好</h2>
    <p><a href="whole_logout.php">登出</a></p>
  <?php else : ?>
    <div style="color:red"><?= $errInfo ?? '' ?></div>
    <div class="container">
      <h1 class="text-center mt-3 mb-3">遊樂園後台系統</h1>
    <div class="border border-primary-subtle border-4 rounded p-3 mb-3 border-opacity-50 h-100 mt-3">
        <h5 class="mb-5">管理員登入</h5>
          <form method="post">
            <input type="text" name="account" class="form-control" placeholder="帳號" value="<?= htmlentities($_POST['account'] ?? '') ?>">
            <br>
            <input type="password" name="password" class="form-control" placeholder="密碼" value="<?= htmlentities($_POST['password'] ?? '') ?>">
            <br>
          <button class='btn btn-primary'>登入</button>
      </form>
    </div>
  </div>
  <?php endif; ?>

</body>

</html>