<?php
require './parts/connect_db.php';
$pageName='list';
$title='資料清單';
$partName='ride';
$formName='ride';
$formTitle='設施介紹';

// 設定一頁最多幾筆資料
$perPage = 25;
// 若page值已被設定，轉成整數，若沒設定，則將其設為1
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
// 避免因為get方法致使get的值被從網址修改，設定若get到的值小於一直接轉回第一頁的頁面
if ($page < 1) {
    header('Location: ?page=1'); # 頁面轉向
    exit; # 直接結束這支 php
}
$t_sql = "SELECT COUNT(1) FROM amusement_ride";
// 資料總筆數
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
# 設定變數預設值
$totalPages = 0;
$rows = [];
// 有資料時
if ($totalRows > 0) {
    # 用無條件進位的方法設定總頁數
    $totalPages = ceil($totalRows / $perPage);
    // 如果頁數值大於總頁數返回最後一頁
    if ($page > $totalPages) {
        header('Location: ?page=' . $totalPages); # 頁面轉向最後一頁
        exit; # 直接結束這支 php
    }
    
    $sql = sprintf(
    "SELECT * FROM amusement_ride ORDER BY amusement_ride_id DESC LIMIT %s, %s",
    ($page - 1) * $perPage,
    $perPage

    );
    $rows = $pdo->query($sql)->fetchAll();
}

$sql1 = "SELECT ride_category_id,ride_category_name FROM ride_category";
$sql2 = "SELECT ride_support_id,ride_support_name FROM ride_support";
$sql3 = "SELECT theme_id,theme_name FROM theme";

$category_rows = $pdo->query($sql1)->fetchAll();
$support_rows = $pdo->query($sql2)->fetchAll();
$theme_rows = $pdo->query($sql3)->fetchAll();

enum ThrillerRating:string{
    case 一星 = "1";
    case 二星 = "2";
    case 三星 = "3";
    case 四星 = "4";
    case 五星 = "5";
}

// sql語法
// $sql = "SELECT * FROM amusement_ride ORDER BY amusement_ride_id DESC LIMIT %s, %s";
// 用php物件變數
// $rows = $pdo->query($sql)->fetchAll();
?>

<?php include "./parts/html_head.php"?>
<?php include "./parts/four_part_navbar.php"?>
<?php include "./parts/main_navbar.php"?>
<?php include "./parts/navbar.php"?>

<div class="container">
    <div>
        <h5 class="mt-4 mb-4">進階搜尋</h5>
        <form action="" class="row gx-3 gy-2 mb-4" name="ride_form" id="ride_form">
            <div class="col-sm-3">
                <label for="ride_category_id" class="form-label" >設施所屬種類</label>
                <select class="form-select" id="ride_category_id" name="ride_category_id"  >
                    <option selected  value="">全部種類</option>
                    <?php foreach ($category_rows as $r) :?>
                    <option value="<?= $r['ride_category_id'] ?>"><?= $r['ride_category_name'] ?></option>
                    <?php
                endforeach ?>
                </select>
            </div> 
            <div class="col-sm-3">
            <label for="thriller_rating" class="form-label" >設施刺激程度</label>
            <select class="form-select" id="thriller_rating" name="thriller_rating" value="<?= htmlentities($row['thriller_rating']) ?>" > 
            <option selected  value="">全部刺激程度</option>
            <?php foreach (ThrillerRating::cases() as $thrillerRating) :?>
                <option value="<?= $thrillerRating->value ?>"><?= $thrillerRating->name ?></option>
            <?php endforeach ?>
            </select>
            </div>
            <div class="col-sm-3">
            <label for="ride_support_id" class="form-label" >設施支援種類</label>
            <select class="form-select" id="ride_support_id" name="ride_support_id"  >
                <option selected value="">全部支援種類</option>
                <?php foreach ($support_rows as $r) : ?>
                  <option value="<?= $r['ride_support_id'] ?>"><?= $r['ride_support_name'] ?></option>
                <?php
                endforeach ?>
            </select>
            </div>
            <div class="col-sm-3">
            <label for="theme_id" class="form-label" >設施所屬主題名稱</label>
            <select class="form-select" id="theme_id" name="theme_id" >
                <option selected value="">全部主題名稱</option>
                <?php foreach ($theme_rows as $r) : ?>
                  <option value="<?= $r['theme_id'] ?>"><?= $r['theme_name'] ?></option>
                <?php
                endforeach ?>
            </select>
            </div>
            <div class="col-12 d-flex justify-content-end"><button type="submit" class="btn btn-outline-primary">搜尋</button></div>
        </form>
    </div>
<div class="row">
    <div class="col">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <!-- 設定可以直接返回第一頁的按鈕，設定按鈕在頁面呈現第一頁時會失效(用fontawesome的icon) -->
            <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="?page=1">
                <i class="fa-solid fa-angles-left"></i></a>
            </li>
            <!-- 設定只顯示當前頁數的前後五頁的按鈕 -->
        <?php for ($i = $page-5; $i <= $page+5; $i++) :
        // 頁數值介於有資料的頁面時才顯示
            if($i>=1 and $i<=$totalPages): ?>
            <!-- 設定當前頁數的按鈕要highlight -->
            <li class="page-item <?= $i==$page ? 'active' : '' ?>">
                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
            </li>
            <?php 
            endif;
        endfor; ?>
        <!-- 設定可以直接到最後一頁的按鈕，此按鈕在頁面已經呈現最後一頁時會失效 -->
            <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $totalPages ?>">
                <i class="fa-solid fa-angles-right"></i></a>
            </li>
        </ul>
    </nav>
    </div>
</div>
<!-- 讓總頁數顯示在資料表格上方 -->
<div><?= "$totalRows / $totalPages" ?></div>

<div class="row">
    <div class="col">
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th scope="col">
                <i class="fa-solid fa-trash-can"></i>
            </th>
            <th scope="col">設施id</th>
            <th scope="col">設施名稱</th>
            <th scope="col">設施圖片</th>
            <th scope="col">設施經度</th>
            <th scope="col">設施緯度</th>
            <th scope="col">設施種類id</th>
            <th scope="col">刺激程度</th>
            <th scope="col">創建時間</th>
            <th scope="col">支援id</th>
            <th scope="col">主題id</th>
            <th scope="col">設施簡述</th>
            <th scope="col">
                <i class="fa-solid fa-pen-to-square"></i>
            </th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($rows as $r): ?>
            <tr>
                <td>
                    <!-- 設定JS的假連結，將PHP變數嵌入方法中，使用者在點選此超連結時會執行deleteItem這個方法 -->
                    <a href="javascript: deleteItem(<?= $r['amusement_ride_id'] ?>)"><i class="fa-solid fa-trash-can"></i></a>
                </td>
                <td><?= $r['amusement_ride_id'] ?></td>
                <td><?= htmlentities($r['amusement_ride_name']) ?></td>
                <td><?= $r['amusement_ride_img'] ?></td>
                <td><?= $r['amusement_ride_longitude'] ?></td>
                <td><?= $r['amusement_ride_latitude'] ?></td>
                <td><?= $r['ride_category_id'] ?></td>
                <td><?= $r['thriller_rating'] ?></td>
                <td><?= $r['created_at'] ?></td>
                <td><?= $r['ride_support_id'] ?></td>
                <td><?= $r['theme_id'] ?></td>
                <td><?= htmlentities($r['amusement_ride_description']) ?></td>

                <!-- 避免XSS攻擊被惡意植入JS程式導致輸入的資料外洩，將輸入的文字"直接"呈現不做HTML的文字跳脫導致出現HTML標籤執行程式 -->
                <!-- <td><?= htmlentities($r['address']) ?> -->
                <!-- 直接去除所有HTML標籤只呈現沒有標籤的內容 -->
                    <!-- <?= strip_tags($r['address']) ?></td> -->
                <td>
                    <a href="ride_edit.php?amusement_ride_id=<?= $r['amusement_ride_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    </div>
</div>

</div>

<?php include "./parts/scripts.php"?>
<script>

$('#ride_form').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) { // 未驗證通過 則不處理
        return;
        } else { // 通過後送出表單
            e.preventDefault();
            const fd = new FormData(document.ride_form);
            // 設定ajax的送出方式fetch('資料運送的目的地', {送出方式}
            fetch('ride_search-api.php', {
                method: 'POST',
                // 送出的格式會自動是 multipart/form-data
                body: fd, 
                // 因在add-api.php的檔案中設定資料檔案形式是JSON因此要求response傳回的JSON檔轉回原始的data資料
            }).then(r => r.json())
            // 取得轉譯後的原始data資料
            .then(data => {
                console.log(data.postData);
                // 如果資料新增成功給予提示
                if (data.success) {
                e.preventDefault(); // 防止原始 form 提交表單
                alert('資料篩選成功');
                // 提示後跳轉至表格清單頁面
                // location.href = "./ride_list.php"
                }
            });
        }
    })
    // 設定刪除資料前的提示小視窗，按確定後才會刪除資料
function deleteItem(amusement_ride_id) {
    if (confirm(`確定要刪除編號為 ${amusement_ride_id} 的資料嗎?`)) {
        location.href = 'ride_delete.php?amusement_ride_id=' + amusement_ride_id ;
    }
    }
</script>
<?php include "./parts/html_foot.php"?>
