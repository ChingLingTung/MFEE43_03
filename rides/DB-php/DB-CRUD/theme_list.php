<?php
require './parts/connect_db.php';
$pageName='list';
$title='資料清單';
$formName='theme';
$formTitle='設施主題';
// 若page值已被設定，轉成整數，若沒設定，則將其設為1
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
// 避免因為get方法致使get的值被從網址修改，設定若get到的值小於一直接轉回第一頁的頁面
if ($page < 1) {
    header('Location: ?page=1'); # 頁面轉向
    exit; # 直接結束這支 php
}
// 設定一頁最多幾筆資料
$perPage = 25;
$t_sql = "SELECT COUNT(1) FROM theme";
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
    "SELECT * FROM theme ORDER BY theme_id DESC LIMIT %s, %s",
    ($page - 1) * $perPage,
    $perPage

    );
    $rows = $pdo->query($sql)->fetchAll();
}



// sql語法
// $sql = "SELECT * FROM theme ORDER BY theme_id DESC LIMIT 0, 20";
// 用php物件變數
$rows = $pdo->query($sql)->fetchAll();
?>

<?php include "./parts/html_head.php"?>
<?php include "./parts/main_navbar.php"?>
<?php include "./parts/navbar.php"?>

<div class="container">
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
            <th scope="col">設施主題id</th>
            <th scope="col">設施主題名稱</th>
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
                <a href="javascript: deleteItem(<?= $r['theme_id'] ?>)"><i class="fa-solid fa-trash-can"></i></a>
            </td>
            <td><?= $r['theme_id'] ?></td>
            <td><?= htmlentities($r['theme_name']) ?></td>

            <td>
                <a href="theme_edit.php?theme_id=<?= $r['theme_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
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
    // 設定刪除資料前的提示小視窗，按確定後才會刪除資料
function deleteItem(theme_id) {
    if (confirm(`確定要刪除編號為 ${theme_id} 的資料嗎?`)) {
        location.href = 'theme_delete.php?theme_id=' + theme_id;
    }
    }</script>
<?php include "./parts/html_foot.php"?>
