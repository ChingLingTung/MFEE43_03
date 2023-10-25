<?php
// 資料庫連線
require './parts/connect_db.php';
$pageName='edit';
$title='編輯';
$partName='ride';
$formName='ride';
$formTitle='設施介紹';
// 取得資料的主鍵，若此資料主鍵存在則轉成整數，沒有則將值設定為0
$amusement_ride_id = isset($_GET['amusement_ride_id']) ? intval($_GET['amusement_ride_id']) : 0;
// 若資料不存在跳轉回資料清單頁面
if (empty($amusement_ride_id)) {
  header('Location: ride_list.php');
  // 直接結束這個程式
  exit;
  }
  // SQL語法撈出這筆資料並以JSON格式顯示
  $sql = "SELECT * FROM amusement_ride WHERE amusement_ride_id={$amusement_ride_id}";
  $row = $pdo->query($sql)->fetch();
  // 如果這個主鍵存在但資料沒有內容
  if (empty($row)) {
    // 跳轉回資料清單頁面
    header('Location: ride_list.php');
    // 直接結束這個程式
    exit;
    }
    

    $sql1 = "SELECT ride_category_id,ride_category_name FROM ride_category";
    $sql2 = "SELECT ride_support_id,ride_support_name FROM ride_support";
    $sql3 = "SELECT theme_id,theme_name FROM theme";

    $rows = $pdo->query($sql1)->fetchAll();
    $rows2 = $pdo->query($sql2)->fetchAll();
    $rows3 = $pdo->query($sql3)->fetchAll();

    enum ThrillerRating:string{
        case 一星 = "1";
        case 二星 = "2";
        case 三星 = "3";
        case 四星 = "4";
        case 五星 = "5";
    }
?>

<?php include "./parts/html_head.php"?>
<?php include "./parts/four_part_navbar.php"?>
<?php include "./parts/main_navbar.php"?>
<?php include "./parts/navbar.php"?>

<div class="container">
    <div class="border border-primary-subtle border-4 rounded p-3 mb-3 border-opacity-50 h-100">
        <h5 class="mb-5">修改設施介紹資料</h5>
        <!-- 下方script內重設定表單傳送方式，因此不用在form標籤內加action="add-api.php"、method="post"，會被下方的設定覆蓋
        為了要設定目標表單，要給表單加一個名字name="ride_form"，設定送出時要執行sendData()的方法 -->
        <form class="needs-validation" id="ride_form" name="ride_form" data-toggle="validator" novalidate onsubmit="sendData(event)">
        <!-- 設定隱藏表單取得主鍵才知道要修改哪筆資料 -->
          <input type="hidden" name="amusement_ride_id" value="<?= $row['amusement_ride_id'] ?>">
            
            <div class="mb-3 form-group">
            <label for="amusement_ride_name" class="form-label">設施名稱</label>
            <input type="text" class="form-control " id="amusement_ride_name" name="amusement_ride_name" value="<?= htmlentities($row['amusement_ride_name']) ?>" required="required" data-error="請填寫此欄位">
            <div class="help-block with-errors text-danger"></div>
            </div>
            
            <div class="mb-3 form-group">
            <label for="amusement_ride_img" class="form-label" >設施圖片</label>
            <br>            
            <!-- 設定顯示圖片的長寬 -->
            <div style="width: 300px">
                <img src="<?= htmlentities($row['amusement_ride_img']) ?>" alt="" id="ride_img" width="100%" />
            </div>
            <!--要加hidden表單才會隱藏-->
            <!-- <form name="imgform" style="display:none"> -->
                <input type="file" id="amusement_ride_img"   />
                <input type="text" name="amusement_ride_img" id="amusement_ride_img_text" required="required" data-error="請選擇圖片" value="<?= htmlentities($row['amusement_ride_img']) ?>" hidden>
            <!-- </form>  -->
            <!-- 如果想改樣式，可以將原始的表單隱藏，另外用div設置按鈕(可以是文字也可以是圖片)  -->
            <div class="mt-2" style="cursor: pointer;" onclick="uploadFile()"><i class="fa-solid fa-arrow-up-from-bracket"></i>上傳檔案</div>
            <div class="help-block with-errors text-danger"></div>
            </div>            
            <div class="mb-3 form-group">
            <label for="amusement_ride_longitude" class="form-label">設施所在經度</label>
            <input type="text" class="form-control" id="amusement_ride_longitude" name="amusement_ride_longitude" value="<?= htmlentities($row['amusement_ride_longitude']) ?>" required="required" data-error="請填寫此欄位">
            <div class="help-block with-errors text-danger"></div>

            </div>            
            <div class="mb-3 form-group">
            <label for="amusement_ride_latitude" class="form-label">設施所在緯度</label>
            <input type="text" class="form-control" id="amusement_ride_latitude" name="amusement_ride_latitude" value="<?= htmlentities($row['amusement_ride_latitude']) ?>" required="required" data-error="請填寫此欄位">
            <div class="help-block with-errors text-danger"></div>

            </div>
            <div class="input-group form-group mb-3">
                <label for="ride_category_id" class="form-label" >設施所屬種類</label>
                <select class="form-select ms-3" id="ride_category_id" name="ride_category_id" value="<?= htmlentities($row['ride_category_id']) ?>" required="required" data-error="請選擇設施種類" >
                    <?php foreach ($rows as $r) :?>
                    <option value="<?= $r['ride_category_id'] ?>" <?= $r['ride_category_id'] == $row['ride_category_id'] ? 'selected' : "" ?>><?= $r['ride_category_name'] ?></option>
                    <?php
                endforeach ?>
                </select>
                <div class="help-block with-errors text-danger w-100"></div>

            </div> 
            <div class="input-group form-group mb-3">
            <label for="thriller_rating" class="form-label" >設施刺激程度</label>
            <select class="form-select ms-3" id="thriller_rating" name="thriller_rating" value="<?= htmlentities($row['thriller_rating']) ?>" required="required" data-error="請選擇設施刺激程度">                
            <?php foreach (ThrillerRating::cases() as $thrillerRating) :?>
                <option value="<?= $thrillerRating->value ?>" <?= $row['thriller_rating'] == $thrillerRating->value ? 'selected' : "" ?>><?= $thrillerRating->name ?></option>
            <?php endforeach ?>
            
                
            </select>
            <div class="help-block with-errors text-danger w-100"></div>
            </div>
            <div class="input-group form-group mb-3">
            <label for="ride_support_id" class="form-label" >支援種類</label>
            <select class="form-select ms-3" id="ride_support_id" name="ride_support_id" value="<?= htmlentities($row['ride_support_id']) ?>" required="required" data-error="請選擇設施所屬支援種類" >
                <?php foreach ($rows2 as $r) : ?>
                  <option value="<?= $r['ride_support_id'] ?>" <?= $r['ride_support_id'] == $row['ride_support_id'] ? 'selected' : "" ?>><?= $r['ride_support_name'] ?></option>
                <?php
                endforeach ?>
            </select>
            <div class="help-block with-errors text-danger w-100"></div>
            </div>
            <div class="input-group form-group mb-3">
            <label for="theme_id" class="form-label" >設施所屬主題名稱</label>
            <select class="form-select ms-3" id="theme_id" name="theme_id" value="<?= htmlentities($row['theme_id']) ?>" required="required" data-error="請選擇設施所屬主題名稱" >
                <?php foreach ($rows3 as $r) : ?>
                  <option value="<?= $r['theme_id'] ?>" <?= $r['theme_id'] == $row['theme_id'] ? 'selected' : "" ?>><?= $r['theme_name'] ?></option>
                <?php
                endforeach ?>
            </select>
            <div class="help-block with-errors text-danger w-100"></div>
            </div>
            <div class="mb-3 form-group">
            <label for="amusement_ride_description" class="form-label">設施簡介</label>
            <textarea class="form-control" name="amusement_ride_description" id="amusement_ride_description" cols="30" rows="3" required="required" data-error="請輸入設施簡介"><?= htmlentities($row['amusement_ride_description']) ?></textarea>
            <div class="help-block with-errors text-danger"></div>

            </div>
            <button type="submit" class="btn btn-primary">送出</button>
            </div>
        </form>
    </div>
</div>


<?php include "./parts/scripts.php"?>
<script>
    function uploadFile() {
        // 將圖片的值設定給FormData沒有外觀的表單
        // const img = new uploadFile(document.amusement_ride_img);
        // const fd = new FormData(document.imgform);
        let fd = new FormData();
        fd.append('amusement_ride_img', document.getElementById('amusement_ride_img').files[0]);
        // 用post的方法把表單內容傳給upload-img-api-1.php這支php檔
        fetch("upload-img-api-1.php", {
            method: "POST",
          // 等同於enctype="multipart/form-data"的效果
            body: fd, 
        })
        // 因為這邊是JSON格式因此.json()取得data
            .then((r) => r.json())
            .then((data) => {
            // 如果data取得success值
            if (data.success) {
              // 將這張圖片ride_img的src設定為路徑(/php/uploads/)+完整檔名(data.file)
                ride_img.src = data.file;
                // $($('#amusement_ride_img_text')[0]).val(data.file);
                document.getElementById('amusement_ride_img_text').value = data.file;
            }
            });
        }
    // 定義方法sendData()，e等於上方的event
    function sendData(e) {
        // 取消表單預設的傳統的送出方式，相當於在form標籤內設定onsubmit="return false" 
        e.preventDefault();
        // name_in.style.border = '1px solid #CCCCCC';
        // name_in.nextElementSibling.innerHTML = ''; 
        // 用迴圈重置表格的外觀
        // fields.forEach(field => {
        //     field.style.border = '1px solid #CCCCCC';
        //     field.nextElementSibling.innerHTML = '';
        // })

        // TODO: 資料在送出之前, 要檢查格式
        // 預設檢查通過(任一不通過即為false)
        let isPass = true; 
        // 設定若姓名欄位內容長度小於二不通過檢查
        // if (name_in.value.length < 2) {
        //     isPass = false;
        //     // 將姓名欄位輸入框標示為紅色
        //     name_in.style.border = '2px solid red';
        //     // 設定姓名欄位框下方提示文字
        //     name_in.nextElementSibling.innerHTML = '請填寫正確的姓名';
        // }
        // // 如果信箱輸入內容不符合格式，標示紅框及提示文字
        // if (!validateEmail(email_in.value)) {
        //     isPass = false;
        //     email_in.style.border = '2px solid red';
        //     email_in.nextElementSibling.innerHTML = '請填寫正確的Email';
        // }
        // // 如果手機內容有輸入但內容不符合格式，標示紅框及提示文字，若未填則不判斷
        // if (mobile_in.value && !validateMobile(mobile_in.value)) {
        //     isPass = false;
        //     mobile_in.style.border = '2px solid red';
        //     mobile_in.nextElementSibling.innerHTML = '請填寫正確的手機號碼';
        // }
        // // 如果以上任一檢查不通過則不發送資料
        if (!isPass) {
            return;
        }
        // 建立只有資料的表單
        const fd = new FormData(document.ride_form);
        // 設定ajax的送出方式fetch('資料運送的目的地', {送出方式}
        fetch('ride_edit-api.php', {
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
                location.href = "./ride_list.php"
                }else {
                  // 若資料和原本的一樣沒有更動
                  alert('資料沒有修改');
    //               for(let n in data.errors){
    //                 console.log(`n: ${n}`);
    //                 // 設定css樣式提示是哪個欄位
    //                 if(document.form1[n]){
    //                   const input = document.form1[n];
    //                   input.style.border = '2px solid red';
    //                   // 欄位下方文字提示
    //                   input.nextElementSibling.innerHTML = data.errors[n];
    //                 }
                  }
    //             }
          })
    //     // 設定若有錯誤會透過log記錄
    //     .catch(ex => console.log(ex))
    }
</script>
<?php include "./parts/html_foot.php"?>
