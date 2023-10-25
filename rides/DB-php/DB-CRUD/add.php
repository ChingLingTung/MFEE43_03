<?php
require './parts/connect_db.php';
$pageName='add';
$title='新增資料';
?>

<?php include "./parts/html_head.php"?>
<?php include "./parts/main_navbar.php"?>
<?php include "./parts/navbar.php"?>

<div class="container">
    <div class="border border-primary-subtle border-4 rounded p-3 mb-3 border-opacity-50 h-100">
        <h5 class="mb-5">新增設施資料</h5>
        <!-- 下方script內重設定表單傳送方式，因此不用在form標籤內加action="add-api.php"、method="post"，會被下方的設定覆蓋
        為了要設定目標表單，要給表單加一個名字name="form1"，設定送出時要執行sendData()的方法 -->
        <form name="form1" onsubmit="sendData(event)" >
            <!-- form標籤裡要加上enctype="multipart/form-data"的設定資料才能傳送出去，這邊透過下方script內設定 -->

            <div class="mb-3">
            <label for="amusement_ride_name" class="form-label">設施名稱</label>
            <input type="text" class="form-control" id="amusement_ride_name" name="amusement_ride_name">
            <div class="form-text"></div>
            </div>
            <div class="mb-3">
            <label for="amusement_ride_img" class="form-label">設施圖片</label>
            <br>            
            <!-- 設定顯示圖片的長寬 -->
            <div style="width: 300px">
                <img src="" alt="" id="myimg" width="100%" />
            </div>
            <!--要加hidden表單才會隱藏-->
            <!-- <form name="imgform" style="display:none"> -->
                <input type="file" id="amusement_ride_img" name="amusement_ride_img" />
            <!-- </form> -->
            <!-- 如果想改樣式，可以將原始的表單隱藏，另外用div設置按鈕(可以是文字也可以是圖片) -->
            <div class="mt-2" style="cursor: pointer;" onclick="uploadFile()"><i class="fa-solid fa-arrow-up-from-bracket"></i>上傳檔案</div>
            <div class="form-text"></div>
            </div>            
            <div class="mb-3">
            <label for="amusement_ride_longitude" class="form-label">設施所在經度</label>
            <input type="text" class="form-control" id="amusement_ride_longitude" name="amusement_ride_longitude">
            <div class="form-text"></div>
            </div>            
            <div class="mb-3">
            <label for="amusement_ride_latitude" class="form-label">設施所在緯度</label>
            <input type="text" class="form-control" id="amusement_ride_latitude" name="amusement_ride_latitude">
            <div class="form-text"></div>
            </div> 
            <label for="ride_category_id" class="form-label">設施所屬種類</label>
            <input type="number" class="form-control" id="ride_category_id" name="ride_category_id">
            <div class="form-text"></div>
            <label for="thriller_rating" class="form-label">設施刺激程度</label>
            <input type="number" class="form-control" id="thriller_rating" name="thriller_rating">
            <div class="form-text"></div>
            <label for="theme_id" class="form-label">設施所屬主題編號</label>
            <input type="number" class="form-control" id="theme_id" name="theme_id">
            <div class="form-text"></div>
            <label for="theme_name" class="form-label">設施所屬主題名稱</label>
            <input type="text" class="form-control" id="theme_name" name="theme_name">
            <div class="mb-3">
            <label for="amusement_ride_description" class="form-label">設施簡介</label>
            <textarea class="form-control" name="amusement_ride_description" id="amusement_ride_description" cols="30" rows="3"></textarea>
            <div class="form-text"></div>
            </div>
            <button type="submit" class="btn btn-primary">送出</button>
            </div>
        </form>
    </div>
</div>


<?php include "./parts/scripts.php"?>
<script>
    // // 設定各欄位表格內容(input)的參照
    // const amusement_ride_name_in = document.form1.amusement_ride_name;
    // const amusement_ride_img_in = document.form1.amusement_ride_img;
    // const amusement_ride_longitude_in = document.form1.amusement_ride_longitude;
    // // 用陣列方式方便處理多個欄位
    // const fields = [amusement_ride_name_in, amusement_ride_img_in, amusement_ride_longitude_in];
    // // 設定amusement_ride_img的圖片檢查通過格式並回傳布林值
    // function validate(amusement_ride_img) {
    //     // const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    //     // return re.test(amusement_ride_img);
    // }
    // // 設定經度的檢查通過格式並回傳布林值
    // function validate(amusement_ride_longitude) {
    //     // const re = /^09\d{2}-?\d{3}-?\d{3}$/;
    //     // return re.test(amusement_ride_longitude);
    // }

    // // 定義方法sendData()，e等於上方的event
    function sendData(e) {
    //     // 取消表單預設的傳統的送出方式，相當於在form標籤內設定onsubmit="return false" 
    //     e.preventDefault();
    //     // amusement_ride_name_in.style.border = '1px solid #CCCCCC';
    //     // amusement_ride_name_in.nextElementSibling.innerHTML = ''; 
    //     // 用迴圈重置表格的外觀
    //     fields.forEach(field => {
    //         field.style.border = '1px solid #CCCCCC';
    //         field.nextElementSibling.innerHTML = '';
    //     })

    //     // TODO: 資料在送出之前, 要檢查格式
    //     // 預設檢查通過(任一不通過即為false)
    //     let isPass = true; 
    //     // 設定若姓名欄位內容長度小於二不通過檢查
    //     if (amusement_ride_name_in.value.length < 2) {
    //         isPass = false;
    //         // 將名稱欄位輸入框標示為紅色
    //         amusement_ride_name_in.style.border = '2px solid red';
    //         // 設定名稱欄位框下方提示文字
    //         amusement_ride_name_in.nextElementSibling.innerHTML = '請填寫設施名稱';
    //     }
    //     // 如果輸入圖檔不符合格式，標示紅框及提示文字
    //     if (!validateamusement_ride_img(amusement_ride_img_in.value)) {
    //         isPass = false;
    //         amusement_ride_img_in.style.border = '2px solid red';
    //         amusement_ride_img_in.nextElementSibling.innerHTML = '請上傳正確的圖檔格式';
    //     }
    //     // 如果手機內容有輸入但內容不符合格式，標示紅框及提示文字，若未填則不判斷
    //     if (amusement_ride_longitude_in.value && !validateamusement_ride_longitude(amusement_ride_longitude_in.value)) {
    //         isPass = false;
    //         amusement_ride_longitude_in.style.border = '2px solid red';
    //         amusement_ride_longitude_in.nextElementSibling.innerHTML = '請填寫正確的手機號碼';
    //     }
    //     // 如果以上任一檢查不通過則不發送資料
    //     if (!isPass) {
    //         return;
    //     }
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
    // 定義uploadFile()
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
              // 將這張圖片myimg的src設定為路徑(/php/uploads/)+完整檔名(data.file)
                myimg.src = data.file;
            }
            });
        }
</script>
<?php include "./parts/html_foot.php"?>
