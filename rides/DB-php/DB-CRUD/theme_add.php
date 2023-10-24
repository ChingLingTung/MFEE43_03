<?php
require './parts/connect_db.php';
$pageName='add';
$title='新增資料';
$partName='ride';
$formName='theme';
$formTitle='設施主題';
?>

<?php include "./parts/html_head.php"?>
<?php include "./parts/four_part_navbar.php"?>
<?php include "./parts/main_navbar.php"?>
<?php include "./parts/navbar.php"?>

<div class="container">
    <div class="border border-primary-subtle border-4 rounded p-3 mb-3 border-opacity-50 h-100">
        <h5 class="mb-5">新增設施主題資料</h5>
        <!-- 下方script內重設定表單傳送方式，因此不用在form標籤內加action="add-api.php"、method="post"，會被下方的設定覆蓋
        為了要設定目標表單，要給表單加一個名字name="form1"，設定送出時要執行sendData()的方法 -->
        <form name="form1" id="form1" class="needs-validation" data-toggle="validator" onsubmit="sendData(event)" >
            <!-- form標籤裡要加上enctype="multipart/form-data"的設定資料才能傳送出去，這邊透過下方script內設定 -->

            <div class="mb-3 form-group">
            <label for="theme_name" class="form-label">設施主題名稱</label>
            <input type="text" class="form-control" id="theme_name" name="theme_name" required="required" data-error="請輸入設施主題名稱">
            <div class="help-block with-errors text-danger"></div>
            </div>

            <button type="submit" class="btn btn-primary">送出</button>
            </div>
        </form>
    </div>
</div>


<?php include "./parts/scripts.php"?>
<script>
    
    $('#form1').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) { // 未驗證通過 則不處理
        return;
        } else { // 通過後送出表單
            const fd = new FormData(document.form1);
            // 設定ajax的送出方式fetch('資料運送的目的地', {送出方式}
            fetch('theme_add-api.php', {
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
                e.preventDefault(); // 防止原始 form 提交表單
                alert('資料新增成功');
                // 提示後跳轉至表格清單頁面
                location.href = "./theme_list.php"
                }
            });
        }
    })
</script>
<?php include "./parts/html_foot.php"?>
