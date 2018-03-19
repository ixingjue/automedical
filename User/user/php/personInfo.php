<?php
 require_once '../../configs/configs.php'; 
?>
<!DOCTYPE HTML>
<html>
   <head>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       <link rel="stylesheet" href="../css/personInfo.css">
   </head> 
   <body style="margin-left: 300px;margin-top: 20px;"> 
   <div id="head"><h3>个人信息</h3></div>
<div id="usermessage">
<form action="personInfoRevise.php" method="post">
<ul >
  <li>用户名：<input type="text" value="<?php echo $_SESSION['uname'];?>" readonly="true";></li>
</ul>
<ul>
     <li>手机号：<input type="text" value="<?php echo $_SESSION['utelphone'] ;?>"readonly="true";></li>
</ul>
<ul>
<li><button id="revise-f" type="submit" name="revise";>修改个人信息</button></li>
</ul>
</form>
</div> 
 </body>
</html>
