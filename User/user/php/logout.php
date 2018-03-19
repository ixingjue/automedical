<?php 
  require_once '../../configs/configs.php';
  session_destroy();
  header("location:index.php");//返回到主页面
?>