<?php
session_start();
unset($_SESSION['admin']); #session_destroy 清除所有session資料
#轉向 redirect
header('Location: whole_login.php');