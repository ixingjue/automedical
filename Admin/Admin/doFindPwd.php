<?php
/**
 * Created by PhpStorm.
 * User: IT-XIA-PC
 * Date: 2017/5/26
 * Time: 16:35
 */
require_once '../include.php';
$query=$_POST['query'];
$find=$_POST['tiaojian'];
if ($query==1){
    $sql = "select username from izmu_admin where username = '{$find}'"; //SQL语句
    $result = mysql_query($sql);    //执行SQL语句
    //$row = mysql_fetch_assoc($result);
    $row=mysql_fetch_assoc($result);
    $num = mysql_num_rows($result); //统计执行结果影响的行数
    if ($num)    //如果已经存在该用户
    {
        $_SESSION['username']=$row['username'];
        alertMes("正在跳转请稍后","findpwd1.php");
    }
    else
    {
        alertMes("不存在此管理员!","findpwd.php");
    }

}
else if($query==2){
    // print_r($query);
    $sql = "select * from izmu_admin where email = '{$find}'"; //SQL语句
    $result = mysql_query($sql);    //执行SQL语句
    //$row = mysql_fetch_assoc($result);
    $row=mysql_fetch_assoc($result);
    $num = mysql_num_rows($result); //统计执行结果影响的行数
    if ($num)    //如果已经存在该用户
    {
        $_SESSION['username']=$row['username'];
        alertMes("正在跳转请稍后，请点击确定","findpwd1.php");
    }
    else
    {
        alertMes("不存在此邮箱!","findpwd.php");
    }

}