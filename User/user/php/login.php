<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>欢迎登陆</title>
        <link rel="stylesheet" href="../css/login.css">  
    </head>
    <body>
    <div class="main">
    <div class="main-container ">
        <div class="container">
            <div class="info-all">
                <form action="doLogin.php" method="post">
              <ul class="info">
                  <li><span class="err" style="font-size:15px;color:red;"></span></li>
               <li>&nbsp;</li>
      <li><span class="tit">用户名：</span><span class="input">
             &nbsp;&nbsp;&nbsp;<input type="text" name="username" placeholder="请输入用户名" class="user-name"  style="font-size:17px;" required="required"  ></span></li>
             <li>&nbsp;</li>
      <li><span class="tit">密码：&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="input">
             &nbsp;&nbsp;&nbsp;<input type="password" name="password"  placeholder="请输入密码" class="pwd-password"  style="font-size:17px;" required="required" >
             </span></li>
             <li>&nbsp;</li>
       <li class ="vcode"><span class="tit">图片验证码：</span><span class="input">
          <input type="text" name="verify" id="validateCode" style="font-size:17px; width:95px; " placeholder="验证码" class="code"/></span>
          <img src="getVerify.php" id="yanzheng" class="code-img" onClick="this.src='getVerify.php'"/>
		  <!--<a href="">点击图片刷新</a>-->
                  </li>
				   <li>&nbsp;</li>
				  <li><a href="findKey.php" style="margin-left:215px;text-decoration:none;">忘记密码</a></li>
                   <li>&nbsp;</li>
     <li>
      &nbsp;<button id="login" type="submit" name="utelphone"; >登录</button>
     </li>
              </ul>
                </form>
            </div>
        </div>
        </div>
    </div>
    </body>
</html>