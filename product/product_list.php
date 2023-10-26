<?php
require './parts/connect_db.php';
$partName ='product';
$pageName = 'list';
$title = '列表';

$perPage = 20; # 一頁最多有幾筆

$page=isset($_GET['page'])?intval($_GET['page']):1;
if($page<1){
    header('Location: ?page=1'); # 頁面轉向
    exit; # 直接結束這支 php
}


$t_sql = "SELECT COUNT(1) FROM product_list";

# 總筆數
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];



# 預設值 預設=0
$totalPages = 0;
$rows = [];


// 有資料時 => 總筆數totalRows不是0
if ($totalRows > 0) {
    # 總頁數
    $totalPages = ceil($totalRows / $perPage);
        if ($page > $totalPages) {
          header('Location: ?page=' . $totalPages); # 頁面轉向最後一頁
          exit; # 直接結束這支 php
        }
    
    // select * from ((product_list join product_style on product_list.PDstyle_id = product_style.PDstyle_id)
    // join product_color on product_list.PDcolor_id = product_color.PDcolor_id)
    // join product_category on product_list.PDcategory_id = Product_category.PDcategory_id;
    
    
  //   $sql = sprintf(
  //     "SELECT * FROM product_list ORDER BY product_id DESC LIMIT %s, %s",
  //     ($page - 1) * $perPage,
  //     $perPage

  // $sql = sprintf(
  //   "SELECT * FROM (((product_list 
  //   join product_style on product_list.PDstyle_id = product_style.PDstyle_id)
  //   join product_color on product_list.PDcolor_id = product_color.PDcolor_id)
  //   join product_category on product_list.PDcategory_id = Product_category.PDcategory_id)
  //   join product_picture on product_list.PDpicture_id = Product_picture.PDpicture_id ORDER BY product_id 
  //   DESC LIMIT %s, %s",
  //   ($page - 1) * $perPage,
  //   $perPage
  // );
    $sql = sprintf(
        "SELECT * FROM ((product_list 
        join product_style on product_list.PDstyle_id = product_style.PDstyle_id)
        join product_color on product_list.PDcolor_id = product_color.PDcolor_id)
        join product_category on product_list.PDcategory_id = Product_category.PDcategory_id
        ORDER BY product_id 
        DESC LIMIT %s, %s",
        ($page - 1) * $perPage,
        $perPage

    );
    $rows = $pdo->query($sql)->fetchAll();
}

$sql1 = "SELECT * FROM product_category";
$rows1 = $pdo->query($sql1)->fetchAll();

// 預設主分類 透過 $row 中記錄已選擇的id 抓出 $rows中的 parent_id
// foreach($rows1 as $r1){
//   if($r1['parent_PDcategory_id'] == 0){
//     $mainCategory_id = $r1['parent_PDcategory_id'];
//   }else{
//     // $subCategory_id = $r1['parent_PDcategory_id'];
//   }
// };


// 預設子分類 透過 mainCagetory 抓出同 主分類的子分類
// $subCategory_id_array = [];
// foreach($rows1 as $r2){
//     if($r2['parent_PDcategory_id'] == $mainCategory_id){
//        array_push($subCategory_id_array,$r2['PDcategory_id']);
//     }
// }


?>
<?php include './parts/html-head.php' ?>
<?php include './parts/main_part1.php' ?>
<?php include './parts/navbar.php' ?>

<div class="container">
  <div class="row">
    <div class="col">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <!-- 左按鈕 -->
            <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
            <!-- if page=第一頁 則功能消失 -->
                <a class="page-link" href="?page=1">
                    <i class="fa-solid fa-angles-left">
                    </i>
                </a>
            </li>


            <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> -->


            <!--  for($i=1; $i<= $totalPages; $i++):   -->
            <?php for($i = $page-5; $i <= $page+5; $i++):  

            if($i>=1 and $i<=$totalPages):?>

                <li class="page-item <?= $i==$page ? 'active' : '' ?>">
                <!-- 加上active  點了會反白 -->

                    <a class="page-link" href=" ?page= <?= $i ?>">
                        <?= $i ?>
                    </a>
                </li>
            <?php endif?>
            <?php endfor ?>
          
          <!-- <li class="page-item"><a class="page-link" href="#">Next</a></li> -->

          <!-- 右按鈕 -->
            <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>"> 
            <!-- if page=最後一頁 則功能消失 -->
                <a class="page-link" href="?page=<?= $totalPages ?>">
                    <i class="fa-solid fa-angles-right">
                    </i>
                </a>
            </li>
        </ul>
      </nav>
    </div>
  </div>

  <!-- 總筆數/總頁數 -->
  <div><?= "$totalRows / $totalPages" ?></div>

  <h2><?= $_SESSION['admin']['nickname'] ?> 您好</h2>
  
  <div class="row">
    <div class="col">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th ><i class="fa-solid fa-trash-can"></i></th>
            <!-- <th scope="col">編號</th> -->
            <th scope="col">商品編號</th>
            <th scope="col">商品名稱</th>
            <th scope="col">商品主類別</th>
            <th scope="col">商品副類別</th>
            <th scope="col">商品造型</th>
            <th scope="col">商品顏色</th>
            <th scope="col">商品單價</th>
            <!-- <th scope="col">商品照片</th> -->
            <th scope="col">數量</th>
            <th scope="col">商品描述</th>
            <th ><i class="fa-solid fa-file-pen"></i></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($rows as $r): ?>
          <tr>
            <th ><a href="javascript: deleteItem(<?= $r['product_id'] ?>)">
                  <i class="fa-solid fa-trash-can"></i>
                </a></th>
            <!-- <td><?= $r['product_id'] ?></td> -->
            <td><?= $r['product_id'] ?></td>
            <td><?= $r['product_name'] ?></td>
            <!-- <td><?= $r['parent_PDcategory_id'] ?></td> -->
            <!--已經知道parent的id了，用category表格使用foreach迴圈，跑到第五筆後會顯示該筆名字-->
            <?php foreach($rows1 as $main):  ?>
            <?php if ($r['parent_PDcategory_id'] == $main['PDcategory_id']) :  ?>
            <td value="<?= $main['PDcategory_id'] ?>"><?= $main['PDcategory_name'] ?></td>
            <?php endif;?>
            <?php endforeach;?>
            <td><?= $r['PDcategory_name'] ?></td> 
            <td><?= $r['PDstyle_name'] ?></td>
            <td><?= $r['PDcolor_name'] ?></td>
            <td><?= $r['product_price'] ?></td>
            <!-- <td><img src="/my-proj/add+cate-HTML-1/uploads/<?= $r['PDpicture_name']  ?>" id="PDpicture_name_img" width="100px" /></td> -->
            <td><?= $r['product_inventory_quantity'] ?></td>
            <td><?= htmlentities($r['product_description']) ?>
            <!-- <?= strip_tags($r['product_description']) ?> -->
            <th ><a href="product_edit.php?product_id=<?= $r['product_id'] ?>">
                  <i class="fa-solid fa-file-pen"></i>
                </a></th>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>



<?php include './parts/scripts.php' ?>
<script>
  function deleteItem(product_id) {
    if (confirm(`確定要刪除編號為 ${product_id} 的資料嗎?`)) {
      location.href = 'product_delete.php?product_id=' + product_id;
    }
  }

</script>
<?php include './parts/html-foot.php' ?>