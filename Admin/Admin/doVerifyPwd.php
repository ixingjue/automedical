<?php
/**
 * Created by PhpStorm.
 * User: IT-XIA-PC
 * Date: 2017/5/26
 * Time: 18:25
 */
require_once '../include.php';
$name=$_SESSION['username'];
$answer=$_POST['answer1'];
$sql="select * from izmu_admin where username='{$name}'";
$result=mysql_query($sql);
$row=mysql_fetch_assoc($result);
//print_r($answer);
if ($row['answer']==$answer){
    alertMes("密保问题输入成功,请重置密码！","findpwd2.php");
}
else{
    alertMes("Error","findpwd1.php");
}

