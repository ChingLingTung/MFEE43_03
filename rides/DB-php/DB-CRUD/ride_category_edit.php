<?php
// 資料庫連線
require './parts/connect_db.php';
$pageName='edit';
$title='修改資料';
$partName='ride';
$formName='ride_category';
$formTitle='設施種類';
// 取得資料的主鍵，若此資料主鍵存在則轉成整數，沒有則將值設定為0
$ride_category_id = isset($_GET['ride_category_id']) ? intval($_GET['ride_category_id']) : 0;
// 若資料不存在跳轉回資料清單頁面
if (empty($ride_category_id)) {
  header('Location: ride_category_list.php');
  // 直接結束這個程式
  exit;
  }
  // SQL語法撈出這筆資料並以JSON格式顯示
  $sql = "SELECT * FROM ride_category WHERE ride_category_id={$ride_category_id}";
  $row = $pdo->query($sql)->fetch();
  // 如果這個主鍵存在但資料沒有內容
  if (empty($row)) {
    // 跳轉回資料清單頁面
    header('Location: ride_category_list.php');
    // 直接結束這個程式
    exit;
    }
    $title='編輯';


?>

<?php include "./parts/html_head.php"?>
<?php include "./parts/four_part_navbar.php"?>
<?php include "./parts/main_navbar.php"?>
<?php include "./parts/navbar.php"?>

<div class="container">
    <div class="border border-primary-subtle border-4 rounded p-3 mb-3 border-opacity-50 h-100">
        <h5 class="mb-5">修改設施種類資料</h5>
        <!-- 下方script內重設定表單傳送方式，因此不用在form標籤內加action="add-api.php"、method="post"，會被下方的設定覆蓋
        為了要設定目標表單，要給表單加一個名字name="ride_form"，設定送出時要執行sendData()的方法 -->
        <form class="needs-validation" id="form1" name="form1" data-toggle="validator" novalidate onsubmit="sendData(event)">
        <!-- 設定隱藏表單取得主鍵才知道要修改哪筆資料 -->
          <input type="hidden" name="ride_category_id" id="ride_category_id" value="<?= $row['ride_category_id'] ?>">
            
            <div class="mb-3 form-group">
            <label for="ride_category_name" class="form-label">設施種類名稱</label>
            <input type="text" class="form-control " id="ride_category_name" name="ride_category_name" value="<?= htmlentities($row['ride_category_name']) ?>" required="required" data-error="請輸入設施種類名稱">
            <div class="help-block with-errors text-danger"></div>
            </div>
            <div class="mb-3 form-group">
            <label for="ride_category_name" class="form-label">設施簡介</label>
            <textarea class="form-control" name="ride_category_description" id="ride_category_description" required="required" data-error="請輸入設施簡介" cols="30" rows="3"><?= htmlentities($row['ride_category_description']) ?></textarea>
            <div class="help-block with-errors text-danger"></div>
            </div>
            <div class="mb-3 form-group">
            <label for="height_requirement" class="form-label">身高限制</label>
            <input type="text" class="form-control " id="height_requirement" name="height_requirement" value="<?= htmlentities($row['height_requirement']) ?>" required="required" data-error="請輸入身高限制">
            <div class="help-block with-errors text-danger"></div>
            </div>
            
            
            <button type="submit" class="btn btn-primary">送出</button>
            </div>
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
        fetch('ride_category_edit-api.php', {
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
                location.href = "./ride_category_list.php"
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
