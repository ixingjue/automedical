<?php
 require_once '../../configs/configs.php';
 function fetchOne($sql,$result_type=MYSQL_ASSOC){
    $result=mysql_query($sql);
    $row=mysql_fetch_array($result,$result_type);
    return $row;
}
function checkAdmin($sql){
    return fetchOne($sql);
}
 $username=$_SESSION['uname'];
 $sql = "select * from data_user where uname='{$username}'";
    $row = checkAdmin($sql);
	 if ($row) {
	$_SESSION['usex'] = $row['usex'];
	$_SESSION['uage'] = $row['uage'];
	$_SESSION['ubloodType'] = $row['ubloodType'];
	$_SESSION['uallegicHistory'] = $row['uallegicHistory'];
	$_SESSION['umedicalHistory'] = $row['umedicalHistory'];
	 }
	 else{}
?>
<!DOCTYPE HTML>
<html>
   <head>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       <link rel="stylesheet" href="../css/personInfo.css">
   </head> 
   <body style="margin-left: 300px;margin-top: 20px;"> 
   <div id="head"><h3>个人档案</h3></div>
<div id="usermessage">
<form action="fileAdd.php" method="post">
<ul>
<li>姓名：&nbsp;&nbsp;<input type="text" value="<?php echo $_SESSION['uname'];?>" readonly="true";></li>
</ul>
<ul>
<li>性别：&nbsp;&nbsp;<input type="text" value="<?php echo $_SESSION['usex'];?>"></li>
</ul>
<ul>
<li>年龄：&nbsp;&nbsp;<input type="text" value="<?php echo $_SESSION['uage'];?>"></li>
</ul>
<ul>
<li>血型：&nbsp;&nbsp;<input type="text" value="<?php echo $_SESSION['ubloodType'];?>"></li>
</ul>
<ul>
<li>过敏史：&nbsp;<input type="text" value="<?php echo $_SESSION['uallegicHistory'];?>"></li>
</ul>
<ul>
<li>病史：&nbsp;&nbsp;<input type="text" value="<?php echo $_SESSION['umedicalHistory'];?>"></li>
</ul>
<ul>
<li><button id="revise-f" type="submit" name="revise";>完善个人档案</button></li>
</ul>
</form>
</div> 
 </body>
</html>

