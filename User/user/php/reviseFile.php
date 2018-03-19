<?php
require_once '../../configs/configs.php';
$sex=$_POST['sex'];
$age=$_POST['age'];
$user_id=$_SESSION['uid'];
$bloodType=$_POST['bloodType'];
$allegicHistory=$_POST['allegicHistory'];
$medicalHistory=$_POST['medicalHistory'];
	$sql="update data_user set usex='$sex',uage='$age',ubloodType='$bloodType',uallegicHistory='$allegicHistory',umedicalHistory='$medicalHistory' where uid='$user_id'";
	mysql_query($sql);
	//echo "<script>alert('修改成功!请重新登陆');window.location.href='login.php';</script>";
	echo "<script>alert('修改成功');parent.location.reload(); </script>";
	 
 ?>
