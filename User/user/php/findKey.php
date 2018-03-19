<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>找回密码</title>
        <link rel="stylesheet" href="../css/login.css">		
    </head>
    <body>
    <div class="main">
    <div class="main-container ">
        <div class="container">
            <div class="info-all">
                <form action="findKey_a.php" method="post">
              <ul class="info">
                <li><span class="err" style="font-size:15px;color:red;"></span></li>
				<li>&nbsp;</li>
				<li><span class="tit">用户名：&nbsp;&nbsp;&nbsp;</span><span class="input">
             &nbsp;&nbsp;&nbsp;<input type="text" name="username" placeholder="请输入用户名"   style="font-size:17px;" required="required"  >
			 </span></li>
             <li>&nbsp;</li>
      <li><span class="tit">电话号码：</span><span class="input">
             &nbsp;&nbsp;&nbsp;<input type="text" name="usertelphone" placeholder="请输入电话号码"   style="font-size:17px;" required="required"  >
			 </span></li>
             <li>&nbsp;</li>
      <li><span class="tit">新密码：&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="input">
             &nbsp;&nbsp;&nbsp;<input type="password" name="newpassword"  placeholder="请输入新密码"  style="font-size:17px;" required="required" >
             </span></li>
             <li>&nbsp;</li>
			  <li><span class="tit">确认密码：</span><span class="input">
             &nbsp;&nbsp;&nbsp;<input type="password" name="repassword"  placeholder="请再次输入密码"  style="font-size:17px;" required="required" >
             </span></li>
             <li>&nbsp;</li>
     <li>
      &nbsp;<button id="login" type="submit" name="find"; >找回密码</button>
     </li>
              </ul>
                </form>
            </div>
        </div>
        </div>
    </div>
    </body>
</html>