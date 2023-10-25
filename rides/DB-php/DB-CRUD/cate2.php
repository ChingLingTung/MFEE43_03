<?php
// 資料庫連線
require './parts/connect_db.php';
$title = '分類資料';
// 選取叫做categories的資料庫
$sql = "SELECT * FROM categories";
// 以表格方式印出資料
$rows = $pdo->query($sql)->fetchAll();
// 資料以JSON格式呈現
// echo json_encode($rows, JSON_UNESCAPED_UNICODE);
?>
<?php include './parts/html-head.php' ?>
<?php include './parts/navbar.php' ?>

<div class="container">
  <div class="row">
    <div class="col-6">
      <div class="card">

        <div class="card-body">
          <h5 class="card-title">表單</h5>

          <form name="form1" onsubmit="return false">
            <div class="mb-3">
              <!-- 設定二層選單的表單 -->
              <label for="name" class="form-label">主分類</label>
              <!-- 下拉式選單設定，當資料更改的時候執行generateCate2List()這個方法重新生成選單 -->
              <select class="form-select" name="cate1" id="cate1" onchange="generateCate2List()">
                <?php foreach ($rows as $r) :
                // 設定某欄位(parent_sid)的值為多少(0)的資料顯示為下拉選單的選項
                  if ($r['parent_sid'] == '0') : ?>
                  <!-- 以迴圈的方式印出符合上述篩選範圍的資料 -->
                    <option value="<?= $r['sid'] ?>"><?= $r['name'] ?></option>
                <?php
                  endif;
                endforeach ?>
              </select>
            </div>
            <!-- 次選單設定 -->
            <div class="input-group mb-3">
              <span class="input-group-text">次分類</span>
              <select class="form-select" name="cate2" id="cate2"></select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>



<?php include './parts/scripts.php' ?>
<script>
  const cates = <?= json_encode($rows, JSON_UNESCAPED_UNICODE) ?>;
  const cate1 = document.querySelector('#cate1')
  const cate2 = document.querySelector('#cate2')
// 定義方法generateCate2List()
  function generateCate2List() {
    // 設定cate1Val為主分類的值
    const cate1Val = cate1.value;

    let str = "";
    // 設定迴圈
    for (let item of cates) {
      //"+"轉換成字串 
      if (+item.parent_sid === +cate1Val) {
        //設定str=選單標籤+選單的sid和name欄位的內容
        str += `<option value="${item.sid}">${item.name}</option>`;
      }
    }
    // 在次分類的下方印出上述的內容
    cate2.innerHTML = str;
  }
  cate1.value =initVals.cate1; // 設定第一層的初始值
  // 一進到這支檔案就呼叫這個方法
  generateCate2List();
  cate2.value =initVals.cate2; // 設定第二層的初始值
</script>
<?php include './parts/html-foot.php' ?>