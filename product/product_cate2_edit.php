<?php

require './parts/connect_db.php';

// 取得資料的 PK
$PDcategory_id = isset($_GET['PDcategory_id']) ? intval($_GET['PDcategory_id']) : 0;

if (empty($PDcategory_id)) {
    header('Location: product_cate2_list.php');
    exit; // 結束程式
}

$sql = "SELECT * FROM product_category
WHERE PDcategory_id={$PDcategory_id}";

$row = $pdo->query($sql)->fetch();
if (empty($row)) {
    header('Location: product_cate2_list.php');
    exit; // 結束程式
}

$sql1 = "SELECT * FROM product_category";
$rows = $pdo->query($sql1)->fetchAll();



$partName ='product';
$title = '編輯資料';

?>
<?php include './parts/html-head.php' ?>
<?php include './parts/main_part1.php' ?>
<?php include './parts/navbar.php' ?>
<style>
    form .form-text {
        color: red;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">編輯資料</h5>
                    <form name="form1" onsubmit="sendData(event)">
                        <div class="card-title">商品類別</div>
                        <div>
                            <input type="text" name='PDcategory_id' value="<?= $PDcategory_id ?>" hidden>
                        </div>
                        <div class="mb-3">編輯產品類別</div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">主分類</span>
                            <select class="form-select" name="parent_PDcategory_id" id="cate1" onchange="generateCate2List()">
                                <?php foreach ($rows as $r) : ?>
                                    <?php if ($r['parent_PDcategory_id'] == 0) : ?>
                                        <option value="<?= $r['PDcategory_id'] ?>" <?php if ($r['PDcategory_id'] == $row['parent_PDcategory_id']) : ?> selected<?php endif; ?>><?= $r['PDcategory_name'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="PDcategory_name" class="form-label">類別名稱</label>
                            <input type="text" class="form-control" id="PDcategory_name" name="PDcategory_name" value="<?= $row['PDcategory_name']?>">
                            <div class="form-text"></div>
                        </div>
                        <button type="submit" class="btn btn-primary">確定</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>

<?php include './parts/scripts.php' ?>
<script>
    // const product_name_in = document.form1.product_name;
    // const email_in = document.form1.email;
    // const mobile_in = document.form1.mobile;
    // const fields = [name_in, email_in, mobile_in];

    // function validateEmail(email) {
    //     const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    //     return re.test(email);
    // }

    // function validateMobile(mobile) {
    //     const re = /^09\d{2}-?\d{3}-?\d{3}$/;
    //     return re.test(mobile);
    // }


    function sendData(e) {
        e.preventDefault(); // 不要讓表單以傳統的方式送出

        // 外觀要回復原來的狀態
        // fields.forEach(field => {
        //     field.style.border = '1px solid #CCCCCC';
        //     field.nextElementSibling.innerHTML = '';
        // })

        // TODO: 資料在送出之前, 要檢查格式
        let isPass = true; // 有沒有通過檢查

        // if (name_in.value.length < 2) {
        //     isPass = false;
        //     name_in.style.border = '2px solid red';
        //     name_in.nextElementSibling.innerHTML = '請填寫正確的姓名';
        // }

        // if (!validateEmail(email_in.value)) {
        //     isPass = false;
        //     email_in.style.border = '2px solid red';
        //     email_in.nextElementSibling.innerHTML = '請填寫正確的 Email';
        // }

        // // 非必填
        // if (mobile_in.value && !validateMobile(mobile_in.value)) {
        //     isPass = false;
        //     mobile_in.style.border = '2px solid red';
        //     mobile_in.nextElementSibling.innerHTML = '請填寫正確的手機號碼';
        // }


        if (!isPass) {
            return; // 沒有通過就不要發送資料
        }
        // 建立只有資料的表單
        const fd = new FormData(document.form1);

        fetch('product_cate2_edit-api.php', {
                method: 'POST',
                body: fd, // 送出的格式會自動是 multipart/form-data
            }).then(r => r.json())
            .then(data => {
                console.log({
                    data
                });
                if (data.success) {
                    alert('資料編輯成功');
                    location.href = "./product_cate2_list.php"
                } else {
                    alert('資料沒有修改');
                    for (let n in data.errors) {
                        console.log(`n: ${n}`);
                        if (document.form1[n]) {
                            const input = document.form1[n];
                            input.style.border = '2px solid red';
                            input.nextElementSibling.innerHTML = data.errors[n];
                        }
                    }
                }

            })
            .catch(ex => console.log(ex))
    }

    // 新增商品類別選單
    // 假設我希望第一層初始值為第二個
    // const initVals = {
    //     // cate1: 1,
    //     // cate2: 11
    // };

    const cates = <?= json_encode($rows, JSON_UNESCAPED_UNICODE) ?>;

    const cate1 = document.querySelector('#cate1')
    const cate2 = document.querySelector('#cate2')

    function generateCate2List() { //呼叫generateCate2List()
        const cate1Val1 = cate1.value; // 主分類的值

        let str = "";
        //b;
        for (let item of cates) {
            if (+item.parent_PDcategory_id === +cate1Val1) { //+ cate1轉成字串
                str += `<option value="${item.PDcategory_id}">${item.PDcategory_name}</option>`;
                //a;
            }
        }

        cate2.innerHTML = str;

    }
    // cate1.value = initVals.cate1; // 設定第一層的初始值
    // generateCate2List(); // 生第二層
    // cate2.value = initVals.cate2; // 設定第二層的初始值

    let uploadFieldId; // 欄位 Id
    // 中轉站
    function triggerUpload(fid) {
        uploadFieldId = fid;
        document.picform.avatar.click();
    }

    function uploadFile() {
        const fd = new FormData(document.picform);
        fetch("upload-img-api.php", {
                method: "POST",
                body: fd, // enctype="multipart/form-data"
            })
            .then((r) => r.json())
            .then((data) => {
                if (data.success) {
                    if (uploadFieldId) {
                        document.form1[uploadFieldId].value = data.file;
                        document.querySelector(`#${uploadFieldId}_img`).src =
                            "/my-proj/add+cate-HTML-1/uploads/" + data.file;
                    }
                }
                uploadFieldId = null;
            });
    }
</script>
<?php include './parts/html-foot.php' ?>