 <?php
require_once '../../configs/configs.php';
$user_id=$_SESSION['uid'];
$pwd=$_POST['oldPwd'];
$repwd=$_POST['newPwd']; 
     if ($pwd==$_SESSION['password']){
     $sql="update data_user set upwd='$repwd' where uid='$user_id'";
     mysql_query($sql);
    //echo "<script>alert('修改成功!');parent.location.reload(); </script>";
	echo "<script>alert('修改成功!请重新登陆');</script>";
    }
     else{
        alertMes("旧密码不正确！","key.php");
    }	
 ?>
 <script type="text/javascript"> 
if (top.location !== self.location) {
    top.location = "login.php";//跳出框架，并回到登录页面
}
</script>