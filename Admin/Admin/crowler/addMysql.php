<?php
/**
 * Created by PhpStorm.
 * User: IT-XIA-PC
 * Date: 2017/6/27
 * Time: 13:25
 *
 *
 */
$con = mysql_connect("localhost","root","");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("automedicine", $con);
mysql_query("set names 'utf8'");
session_start();
//$id=$_REQUEST['id'];
$title=$_SESSION['title'];
$time=$_SESSION['time'];
$description=$_SESSION['content'];
$content=$_SESSION['content'];
$sql="insert into article(title,content,dateline,description) values('$title','$content','$time','$description')";
//var_dump($sql);
$result=mysql_query($sql);
//var_dump($result);
if($result){
    echo "添加成功";
}
else{
    echo "失败";
}
mysql_close($con);