<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>欢迎登陆</title>
    <link type="text/css" rel="stylesheet" href="styles/reset.css">
    <link type="text/css" rel="stylesheet" href="styles/main.css">
    <!--[if IE 6]>
    <script type="text/javascript" src="../js/DD_belatedPNG_0.0.8a-min.js"></script>
    <script type="text/javascript" src="../js/ie6Fixpng.js"></script>
    <![endif]-->
</head>
<div>
<div class="headerBar">
    <div class="logoBar login_logo">
        <div class="comWidth">
            <div class="logo fl">
                <a href="#"><img src="images/logo.png" alt="自动药物专家系统"></a>
            </div>
            <h3 class="welcome_title">欢迎登陆</h3>
        </div>
    </div>
</div>
</div>
<div class="loginBg">
<div class="loginBox">
    <div class="login_cont">
        <form action="doLogin.php" method="post">
            <ul class="login">
                <li class="l_tit">管理员帐号</li>
                <li class="mb_10"><input type="text"  name="username" placeholder="请输入管理员帐号"class="login_input user_icon" autofocus="autofocus" required="required"></li>
                <li class="l_tit">密码</li>
                <li class="mb_10"><input type="password"  name="password" id="password" class="login_input password_icon" required="required" ><span style="display:none;color: red;">大写锁定键被按下，请注意大小写</span></li>
                <li class="l_tit">验证码</li>
                <li class="mb_10"><input type="text"  name="verify" class="login_input password_icon" required="required"></li>
                <img src="getVerify.php" alt="验证码无法显示？" >
                <a href="login.php">看不清,换一张</a>
                <li class="autoLogin"><input type="checkbox" id="a1" class="checked" name="autoFlag" value="1"><label for="a1">自动登陆(一周内自动登陆)</label></li>
                <li style="color: yellow">*<a href="findpwd.php" target="_blank" style="color: red" >忘记用户名或密码?<点击此处找回密码></a></li><br/>
                <li ><input type="submit" value="" class="login_btn" ></li>
            </ul>
        </form>
        <!-- <a href="reg.php" class="login_zhuce" width="100%" height="100%">注册管理员账号</a>-->
        <input type="button" value=""  class="login_zhuce" onclick="reg()">
        <!--注册管理员账号(待后台管理员审核，加入激活标志？-->
    </div>
</div>
</div>
<div class="footer">
    <p><a href="#">作者简介</a><i>|</i><a href="#">公告</a><i>|</i> <a href="#">加入我们</a><i>|</i>联系作者:18300926096</p>
    <p>Copyright @ 2016.12 - 2017.7 大数据中心版权所有</p>
</div>
<div class="footer1" style="margin: 1px auto">每日微语:
    <?php
        require_once '../include.php';
        $id=rand(1,5);
        $sql="select content from izmu_mingyan where id=$id";
        $result=mysql_query($sql);
        $row=mysql_fetch_assoc($result);
        echo $row['content'];
    ?>
</div>
//检测大小写键盘是否按下了
<script type="text/javascript">
    //<![CDATA[
    function  detectCapsLock(event){
        var e = event||window.event;
        var o = e.target||e.srcElement;
        var oTip = o.nextSibling;
        var keyCode  =  e.keyCode||e.which; // 按键的keyCode
        var isShift  =  e.shiftKey ||(keyCode  ==   16 ) || false ; // shift键是否按住
        if (
            ((keyCode >=   65   &&  keyCode  <=   90 )  &&   !isShift) // Caps Lock 打开，且没有按住shift键
            || ((keyCode >=   97   &&  keyCode  <=   122 )  &&  isShift)// Caps Lock 打开，且按住shift键
        ){oTip.style.display = '';}
        else{oTip.style.display  =  'none';}
    }
    document.getElementById('password').onkeypress = detectCapsLock;
    //]]>
    function reg() {
        window.location="reg.php";
    }
</script>
</body>
</html>
