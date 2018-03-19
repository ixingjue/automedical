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
@$username=$_POST['username'];
@$utelphone=$_POST['usertelphone'];
@$newpassword=$_POST['newpassword'];
@$repassword=$_POST['repassword'];
$sql = "select * from data_user where uname='$username'";
$row = checkAdmin($sql); 
if ($row['utelphone']==$utelphone) {
     if($newpassword==$repassword){
	 $sql="update data_user set upwd='$repassword' where uname='$username'";
	 mysql_query($sql);
	 alertMes("找回密码成功，请重新登录!","login.php");
}	
else{
	 alertMes("密码不一致!","findKey.php");
  } 
    }
    else{
        alertMes("电话号码不正确!","findKey.php");
    }

