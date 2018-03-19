<?php
/**
 * Created by PhpStorm.
 * User: IT-XIA-PC
 * Date: 2017/5/26
 * Time: 18:51
 */
require_once '../include.php';
$pwd=md5($_POST['pwd']);
$repwd=md5($_POST['repwd']);
$name=$_POST['Name'];
if ($repwd==$pwd){
    $sql_insert="update izmu_admin set password='{$pwd}' where username='{$name}'";
    //$sql_insert = "insert into izmu_admin (username,password,email,question,answer) values('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]')";
    $res_insert = mysql_query($sql_insert);
    //$num_insert = mysql_num_rows($res_insert);
    if ($res_insert) {
        alertMes("密码修改成功,请登录!", "login.php");
    } else {
        //alertMes("密码修改失败!", "reg.php");
        alertMes("密码修改失败！","findpwd.php");

    }
}
else {
    alertMes("密码输入不一致，请重新输入","findpwd2.php");
}
