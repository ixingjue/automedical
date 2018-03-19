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
   <div id="head"><h3>修改密码</h3></div>
<div id="usermessage">
<form action="keyRevise.php" method="post">
<ul>
     <li>旧密码：<input type="password" name="oldPwd" placeholder="请输入旧密码"   required="required" ></li>
</ul>
<ul>
     <li>新密码：<input type="password" name="newPwd" placeholder="请输入新密码"   required="required" ></li>
</ul>
<ul>
<li><button id="revise-f" type="submit" name="revise";>修改密码</button></li>
</ul>
</form>
</div> 
 </body>
</html>
