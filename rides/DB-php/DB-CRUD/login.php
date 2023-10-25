<?php
require './parts/connect_db.php';
$pageName='add';
$title='新增';

?>

<?php include "./parts/html_head.php"?>
<?php include "./parts/navbar.php"?>

<div class="container">
    <div class="row">
        <div class="col-6">
        <!-- 從bootstrap抓取Forms的overview和cards做修改 -->
        <div class="card">
        <div class="card-body">
        <h5 class="card-title">會員登入</h5>
        <!-- 下方script內重設定表單傳送方式，因此不用在form標籤內加action="add-api.php"、method="post"，會被下方的設定覆蓋
        為了要設定目標表單，要給表單加一個名字name="form1"，設定送出時要執行sendData()的方法 -->
        <form name="form1" onsubmit="sendData(event)" >
            <!-- form標籤裡要加上enctype="multipart/form-data"的設定資料才能傳送出去，這邊透過下方script內設定 -->

            <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="text" class="form-control" id="email" name="email">
            <div class="form-text"></div>
            </div>            
            <div class="mb-3">
            <label for="password" class="form-label">password</label>
            <input type="text" class="form-control" id="password" name="password">
            <div class="form-text"></div>
            </div>            

            <button type="submit" class="btn btn-primary">登入</button>
        </form>
    </div>
</div>
        </div>
    </div>
</div>

<?php include "./parts/scripts.php"?>
<script>
    // 設定各欄位表格內容(input)的參照
    const name_in = document.form1.name;
    const email_in = document.form1.email;
    const mobile_in = document.form1.mobile;
    // 用陣列方式方便處理多個欄位
    const fields = [name_in, email_in, mobile_in];
    // 設定email的檢查通過格式並回傳布林值
    function validateEmail(email) {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
    // 設定手機號碼的檢查通過格式並回傳布林值
    function validateMobile(mobile) {
        const re = /^09\d{2}-?\d{3}-?\d{3}$/;
        return re.test(mobile);
    }

    // 定義方法sendData()，e等於上方的event
    function sendData(e) {
        // 取消表單預設的傳統的送出方式，相當於在form標籤內設定onsubmit="return false" 
        e.preventDefault();
        // name_in.style.border = '1px solid #CCCCCC';
        // name_in.nextElementSibling.innerHTML = ''; 
        // 用迴圈重置表格的外觀
        fields.forEach(field => {
            field.style.border = '1px solid #CCCCCC';
            field.nextElementSibling.innerHTML = '';
        })

        // TODO: 資料在送出之前, 要檢查格式
        // 預設檢查通過(任一不通過即為false)
        let isPass = true; 
        // 設定若姓名欄位內容長度小於二不通過檢查
        if (name_in.value.length < 2) {
            isPass = false;
            // 將姓名欄位輸入框標示為紅色
            name_in.style.border = '2px solid red';
            // 設定姓名欄位框下方提示文字
            name_in.nextElementSibling.innerHTML = '請填寫正確的姓名';
        }
        // 如果信箱輸入內容不符合格式，標示紅框及提示文字
        if (!validateEmail(email_in.value)) {
            isPass = false;
            email_in.style.border = '2px solid red';
            email_in.nextElementSibling.innerHTML = '請填寫正確的Email';
        }
        // 如果手機內容有輸入但內容不符合格式，標示紅框及提示文字，若未填則不判斷
        if (mobile_in.value && !validateMobile(mobile_in.value)) {
            isPass = false;
            mobile_in.style.border = '2px solid red';
            mobile_in.nextElementSibling.innerHTML = '請填寫正確的手機號碼';
        }
        // 如果以上任一檢查不通過則不發送資料
        if (!isPass) {
            return;
        }
        // 建立只有資料的表單
        const fd = new FormData(document.form1);
        // 設定ajax的送出方式fetch('資料運送的目的地', {送出方式}
        fetch('add-api.php', {
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
                alert('資料新增成功');
                // 提示後跳轉至表格清單頁面
                location.href = "./list.php"
                }else {
                // 如果沒有新增成功要提示
                for(let n in data.errors){
                    // 設定n是沒有通過檢查的input欄位名稱
                    console.log(`n: ${n}`);
                    // 取得form1裡的欄位名稱n以物件表示(因欄位不只一個)
                    if(document.form1[n]){
                        const input = document.form1[n];
                        // 設定n(該欄位)的css樣式
                        input.style.border = '2px solid red';
                        // 設定欄位下方的提示文字為errors的錯誤提示內容(以物件表示)
                        input.nextElementSibling.innerHTML = data.errors[n];
                    }
                }
                }
        })
        // 設定若有錯誤會透過log記錄
        .catch(ex => console.log(ex))
    }
</script>
<?php include "./parts/html_foot.php"?>
