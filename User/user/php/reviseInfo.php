<?php
require_once '../../configs/configs.php';
$uname=$_POST['user_name'];
$utelphone=$_POST['user_telphone'];
$user_id=$_SESSION['uid'];
	$sql="update data_user set uname='$uname',utelphone='$utelphone' where uid='$user_id'";
	mysql_query($sql);
	// echo "<script>alert('修改成功!请重新登陆');window.location.href='login.php';</script>";
	// session_destroy();
echo "<script>alert('修改成功!请重新登陆');</script>";
 ?>
 <script type="text/javascript"> 
if (top.location !== self.location) {
    top.location = "login.php";//跳出框架，并回到登录页面
}
</script>