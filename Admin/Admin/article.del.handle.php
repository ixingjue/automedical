<?php
/**
 * Created by PhpStorm.
 * User: IT-XIA-PC
 * Date: 2017/3/29
 * Time: 12:31
 */
require_once ('../include.php');
$id=$_GET['id'];
$deleteaql="delete from article where id=$id";
if (mysql_query($deleteaql)){
    echo "<script>alert('删除修改文章成功');window.location.href='listNews.php';</script>";
}else {
    echo "<script>alert('删除文章失败');window.location.href='listNews.php';</script>";
}