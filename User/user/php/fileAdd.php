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
   <div id="head"><h3>个人档案</h3></div>
<div id="usermessage">
<form action="reviseFile.php" method="post">
<ul>
<li>姓名：&nbsp;&nbsp;<input type="text" name="user_name" value="<?php echo $_SESSION['uname'];?>" readonly="true";></li>
</ul>
<ul>
<li>性别：&nbsp;&nbsp;<input type="text" name="sex" required="true"></li>
</ul>
<ul>
<li>年龄：&nbsp;&nbsp;<input type="text" name="age" required="true"></li>
</ul>
<ul>
<li>血型：&nbsp;&nbsp;<input type="text" name="bloodType" required="true"></li>
</ul>
<ul>
<li>过敏史：&nbsp;<input type="text" name="allegicHistory" required="true"></li>
</ul>
<ul>
<li>病史：&nbsp;&nbsp;<input type="text" name="medicalHistory" required="true"></li>
</ul>
<ul>
<li><button id="revise-f" type="submit" name="revise";>完善个人档案</button></li>
</ul>
</form>
</div> 
 </body>
</html>


