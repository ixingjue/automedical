<?php
/**
 * Created by PhpStorm.
 * User: IT-XIA-PC
 * Date: 2017/3/25
 * Time: 23:46
 */
require_once '../../configs/configs.php';
//session_start();
function fetchOne($sql,$result_type=MYSQL_ASSOC){
    $result=mysql_query($sql);
    $row=mysql_fetch_array($result,$result_type);
    return $row;
}
function checkAdmin($sql){
    return fetchOne($sql);
}
$username=$_POST['username'];
$password=$_POST['password'];
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
if ($verify==$verify1) {
    $sql = "select * from data_user where uname='{$username}' and upwd='{$password}'";
    $row = checkAdmin($sql); 
    if ($row) {
		$_SESSION['id']=$row['id'];
		$_SESSION['uid'] = $row['uid'];
        $_SESSION['uname'] = $row['uname'];
        $_SESSION['password'] = $row['upwd'];
		$_SESSION['utelphone']=$row['utelphone'];
        alertMes("登录成功！", "../index_1.php");
	}
       else{
		    alertMes("用户名或密码错误！", "login.php");
     }

}
else {
    alertMes("验证码错误！","login.php");
}


