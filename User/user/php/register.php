W<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>注册账号</title>
        <link rel="stylesheet" href="../css/register.css">
        <!-- 验证注册情况 -->
         <script>
function Checklogin()
{
 if ( reg.username.value=="")
 {
  alert("请填写用户名");
reg.username.focus();
  return false;
 }
 if ( reg.utelphone.value=="")
 {
  alert("请填写手机号");
  reg.utelphone.focus();
  return false;
 }

 }

</script>
    </head>
    <body>
    <div class="main">
        <div class="container">
            <div class="info-all">
                <form action="doReg.php" method="post" name="reg">
                <ul id="info">
                  <li><span class="err" style="font-size:14px;color:red;"></span></li>
               <li>&nbsp;</li>
      <li><span class="tit">用户名：</span><span class="input">
             &nbsp;&nbsp;&nbsp;<input type="text" name="username" placeholder="请输入用户名" class="user-name" id="uname"  style="font-size:17px;" required="required" ></span></li>
     <li>&nbsp;</li>
      <li><span class="tit">手机号：</span><span class="input">
            &nbsp;&nbsp;&nbsp;<input type="text" name="utelphone" placeholder="请输入手机号" class="mobile-num" id="number"   style="font-size:17px;" required="required" ></span></li>
     <li>&nbsp;</li>
      <li><span class="tit">密码： &nbsp;&nbsp;&nbsp;</span><span class="input">
          &nbsp;&nbsp;&nbsp;<input type="password" name="pwd" placeholder="请输入密码" class="pwd-password"    style="font-size:17px;" required="required" ></span></li>
     <li>&nbsp;</li>
     <li><span class="tit">确认密码：</span><span class="input">
            <input type="password" name="repwd" placeholder="请确认密码" class="re-pwd-sure" style="font-size:17px;" required="required" ></span></li>
     <li>&nbsp;</li>
       <li class ="vcode"><span class="tit">图片验证码：</span><span class="input">
                    <input type="text"  name="verify" style="font-size:17px; width:100px; " placeholder="验证码"></span>
                    <img src="getVerify.php" alt="验证码无法显示？" onClick="this.src='getVerify.php'" />
					<!--<a href="javascript:history.go(0);">看不清?换一张</a>--> 
       </li>
                   <li>&nbsp;</li>
    <li>
       &nbsp; <input type="submit" class="enrol" value="立即注册" onclick="Checklogin()">
    </li>
       </ul>
       </form>
            </div>
        </div>
    </div>

    </body>
</html>