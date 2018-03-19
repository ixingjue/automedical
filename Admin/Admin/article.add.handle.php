<?php
/**
 * Created by PhpStorm.
 * User: IT-XIA-PC
 * Date: 2017/3/25
 * Time: 10:11
 */
require_once ('../include.php');
//把传递过来的信息入库，在入库之前对所有的信息进行校验
if(!(isset($_POST['title'])&&(!empty($_POST['title'])))){
    echo " <script>alert('标题不能为空');window.location.href='article.add.php';</script>";
}
$title=$_POST['title'];
$author=$_POST['author'];
$description=$_POST['description'];
$content=$_POST['content'];
$dateline=time();
$insertsql="insert into article (title,author,description,content,dateline) values('$title','$author','$description','$content',$dateline)";
//echo $insertsql;
if (mysql_query($insertsql)){
    echo "<script>alert('文章发布成功');window.location.href='listNews.php';</script>";
}
else{
    echo "<script>alert('文章发布失败!');window.location.href='article.add.handle.php';</script>";
}