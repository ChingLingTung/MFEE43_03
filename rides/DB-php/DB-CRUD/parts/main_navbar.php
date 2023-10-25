<?php
if(!isset($formName)){
$formName='';
}
?>
<style>
  nav.navbar ul.navbar-nav .nav-link.active {
    background-color: skyblue;
    font-weight: 900;
    color: blue;
    border-radius: 30px 5px 30px 5px;
  }
</style>
<div class="container">
    <nav class="navbar navbar-expand-lg text-bg-info p-3">
      <div class="container-fluid">
        <a class="navbar-brand fs-3" href="#"><?= $formTitle?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link fs-5 ms-3 <?= $formName=='ride'? 'badge text-bg-primary mt-1':'' ?>" href="./ride_list.php">設施介紹</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-5 ms-3 <?= $formName=='theme'? 'badge text-bg-primary mt-1':'' ?>" href="./theme_list.php">設施主題</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-5 ms-3 <?= $formName=='ride_category'? 'badge text-bg-primary mt-1':'' ?>" href="./ride_category_list.php">設施種類</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-5 ms-3 <?= $formName=='ride_support'? 'badge text-bg-primary mt-1':'' ?>" href="./ride_support_list.php">支援種類</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-5 ms-3 <?= $formName=='maintenance'? 'badge text-bg-primary mt-1':'' ?>" href="./maintenance_list.php">維護細項</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-5 ms-3 <?= $formName=='maintenance_category'? 'badge text-bg-primary mt-1':'' ?>" href="./maintenance_category_list.php">維護類型</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-5 ms-3 <?= $formName=='shop'? 'badge text-bg-primary mt-1':'' ?>" href="./shop_list.php">商店</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-5 ms-3 <?= $formName=='shop_opentime'? 'badge text-bg-primary mt-1':'' ?>" href="./shop_opentime_list.php">商店營業時間</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-5 ms-3 <?= $formName=='restaurant_reservation'? 'badge text-bg-primary mt-1':'' ?>" href="./restaurant_reservation_list.php">餐廳預約</a>
            </li>
          </ul>
          
        </div>
      </div>
    </nav>

  </div>