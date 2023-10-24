<?php
// 資料庫連線
require './parts/connect_db.php';
// 取得資料的主鍵，若此資料主鍵存在則轉成整數，沒有則將值設定為0
$pageName='edit';
$title='編輯';
$partName='ride';
$formName='ride_support';
$formTitle='支援種類';

$ride_support_id = isset($_GET['ride_support_id']) ? intval($_GET['ride_support_id']) : 0;
// 若資料不存在跳轉回資料清單頁面
if (empty($ride_support_id)) {
  header('Location: ride_support_list.php');
  // 直接結束這個程式
  exit;
  }
  // SQL語法撈出這筆資料並以JSON格式顯示
  $sql = "SELECT * FROM ride_support WHERE ride_support_id={$ride_support_id}";
  $row = $pdo->query($sql)->fetch();
  // 如果這個主鍵存在但資料沒有內容
  if (empty($row)) {
    // 跳轉回資料清單頁面
    header('Location: ride_support_list.php');
    // 直接結束這個程式
    exit;
    }

?>

<?php include "./parts/html_head.php"?>
<?php include "./parts/four_part_navbar.php"?>
<?php include "./parts/main_navbar.php"?>
<?php include "./parts/navbar.php"?>

<div class="container">
    <div class="border border-primary-subtle border-4 rounded p-3 mb-3 border-opacity-50 h-100">
        <h5 class="mb-5">編輯支援種類資料</h5>
        <!-- 下方script內重設定表單傳送方式，因此不用在form標籤內加action="add-api.php"、method="post"，會被下方的設定覆蓋
        為了要設定目標表單，要給表單加一個名字name="form1"，設定送出時要執行sendData()的方法 -->
        <form name="form1" id="form1" class="needs-validation" data-toggle="validator" novalidate onsubmit="sendData(event)" >
        <!-- 設定隱藏表單取得主鍵才知道要修改哪筆資料 -->
        <input type="hidden" name="ride_support_id" value="<?= $row['ride_support_id'] ?>">
            <!-- form標籤裡要加上enctype="multipart/form-data"的設定資料才能傳送出去，這邊透過下方script內設定 -->
            <div class="mb-3 form-group">
            <label for="ride_support_name" class="form-label">支援種類名稱</label>
            <input type="text" class="form-control" id="ride_support_name" name="ride_support_name" required="required" data-error="請輸入支援種類名稱"
            value="<?= htmlentities($row['ride_support_name']) ?>">
            <div class="help-block with-errors text-danger"></div>
            </div>            
            <div class="mb-3 form-group">
            <label for="ride_support_description" class="form-label">支援種類簡介</label>
            <textarea class="form-control" name="ride_support_description" id="ride_support_description" required="required" data-error="請輸入支援種類簡介" cols="30" rows="3"><?= $row['ride_support_description'] ?></textarea>
            <div class="help-block with-errors text-danger"></div>
            </div>

            <button type="submit" class="btn btn-primary">修改</button>
        </form>
    </div>
</div>

<?php include "./parts/scripts.php"?>
<script>
    // 定義方法sendData()，e等於上方的event
    function sendData(e) {
        // 取消表單預設的傳統的送出方式，相當於在form標籤內設定onsubmit="return false" 
        e.preventDefault();
        
        let isPass = true; 

        if (!isPass) {
            return;
        }
        // 建立只有資料的表單
        const fd = new FormData(document.form1);
        // 設定ajax的送出方式fetch('資料運送的目的地', {送出方式}
        fetch('ride_support_edit-api.php', {
            method: 'POST',
            // 送出的格式會自動是 multipart/form-data
            body: fd, 
            // 因在add-api.php的檔案中設定資料檔案形式是JSON因此要求response傳回的JSON檔轉回原始的data資料
        }).then(r => r.json())
        // 取得轉譯後的原始data資料
        .then(data => {
            console.log({
            data
            });
            // 如果資料新增成功給予提示
            if (data.success) {
                alert('資料編輯成功');
                // 後端的php程式不做跳轉
                location.href = "./ride_support_list.php"
                }else {
                  // 若資料和原本的一樣沒有更動
                  alert('資料沒有修改');
                }
          })
        // 設定若有錯誤會透過log記錄
        .catch(ex => console.log(ex))
    }
</script>
<?php include "./parts/html_foot.php"?>
