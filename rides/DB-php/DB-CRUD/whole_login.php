<?php
require './parts/connect_db.php';
$pageName = 'login';
$title = '登入';
$formTitle = '登入頁面'
?>

<?php include './parts/html_head.php' ?>
<?php include './whole_index_navbar.php' ?>
<?php
$users = [
  '123456' => [
    'hash' => '$2y$10$nFQ6d.SgqFcujeQY6Swq6eQCGEigPV46BZYvs9JjJK4at7vc92kjG',
    'nickname' => '管理員某某',
  ],
];

# 先判斷是否有表單資料
if (isset($_POST['account'])) {
  $errInfo = " ";

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


<body>
<?php if (isset($_SESSION['admin'])) : ?>
  <h2 class="text-center"><?= $_SESSION['admin']['nickname'] ?> 您好</h2>
    <p><a href="whole_logout.php">登出</a></p>
  <?php else : ?>
    <div style="color:red"><?= $errInfo ?? '' ?></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-4">
            <h1 class="text-center mt-3 mb-3">遊樂園後台系統</h1>
            <div class="card border border-primary-subtle border-4 rounded border-opacity-50 h-100 ">
                <div class="card-body">
                    <h5 class="card-title">管理員登入</h5>
                    <!-- 下方script內重設定表單傳送方式，因此不用在form標籤內加action="add-api.php"、method="post"，會被下方的設定覆蓋
                    為了要設定目標表單，要給表單加一個名字name="form1"，設定送出時要執行sendData()的方法 -->
                    <form method="post" name="form1"  >
                    <!-- form標籤裡要加上enctype="multipart/form-data"的設定資料才能傳送出去，這邊透過下方script內設定 -->

                        <div class="mb-3">
                            <label for="account" class="form-label">帳號</label>
                            <input type="text" class="form-control" id="account" name="account" value="<?= htmlentities($_POST['account'] ?? '') ?>">
                            
                        </div>            
                        <div class="mb-3">
                            <label for="password" class="form-label">密碼</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?= htmlentities($_POST['password'] ?? '') ?>">
                            
                        </div>            
                        <button type="submit" class="btn btn-primary">登入</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>



<?php include "./parts/scripts.php"?>
<script>



</script>
<?php include "./parts/html_foot.php"?>