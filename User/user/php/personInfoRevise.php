<?php
require_once '../../configs/configs.php';
 ?>
<html>
   <head>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       <link rel="stylesheet" href="../css/personInfo.css">
   </head> 
   <body style="margin-left: 300px;margin-top: 20px;"> 
   <div id="head"><h3>个人信息</h3></div>
<div id="usermessage">
<form action="reviseInfo.php" method="post">
<ul>
  <li>用户名：<input type="text" name="user_name" placeholder="请输入用户名" required="required"></li>
</ul>
<ul>
     <li>手机号：<input type="text" name="user_telphone" placeholder="请输入手机号"   required="required" ></li>
</ul>
<ul>
<li><input type="submit" id="revise" name="revise" value="修改"/></li>
</ul>
</form>
</div> 
 </body>
</html>