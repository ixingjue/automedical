<!DOCTYPE>
<html>
<head>
    <title>注册管理员</title>
    <meta http-equiv="Content-type" content="text/html" charset="utf8">
    <style type="text/CSS">
        body{
            font-family:Arial, Helvetica, sans-serif;
            font-size:12px;
            color:#666666;
            background:#fff;
            text-align:center;
        }
        *{
            margin:0;
            padding:0;
        }
        a{
            color:#1e7ace;
            text-decoration:none;
        }
        a:hover{
            color:#000;
            text-decoration:underline;
        }
        h3{
            font-size:14px;
            font-weight:bold;
        }
        PRe, p{
            color: #1e7ace;
            margin:4px;
        }
        input, select, textarea{
            padding:1px;
            margin:2px;
            font-size:11px;
        }
        #myform{
            width:450px;
            margin:15px auto;
            padding:20px;
            text-align:left;
            border:1px solid #a4cdf2;
        }
        fieldset{
            padding:10px;
            margin-top:5px;
            border:1px solid #a4cdf2;
            background:#fff;
        }
        fieldset legend{
            color:#1e7ace;
            font-weight:bold;
            padding:3px 20px 3px 20px;
            border:1px solid #a4cdf2;
            background:#fff;
        }
        fieldset label{
            float:left;
            width:120px;
            text-align:right;
            padding:4px;
            margin:1px;
        }
        fieldset div{
            clear:left;
            margin-bottom:2px;
        }
        .buttom{
            padding:1px 10px;
            font-size:12px;
            border:1px #1e7ace solid;
            background:#d0f0ff;
        }
        .input{
            width:120px;
        }
        .enter{
            text-align:center;
        }
        .clear{
            clear:both;
        }
    </style>
</head>
<body>
<div id="myform">
    <center><h3>创建新管理员</h3></center>
    <form action="doReg.php" method="post" name="myForm" id="#" >
        <fieldset>
            <legend>管理员注册</legend>
            <div>
                <label for="Name">用户名</label>
                <input type="text" name="Name" class="input" id="Name" size="20" maxlength="30" required="required"/>
                *(可输入字母数组下划线)<br>
            </div>
            <div>
                <label for="Email">email</label>
                <input type="text" name="Email" class="input" id="Email" size="20" maxlength="150" required="required"/>
                *<br>
            </div>
            <div>
                <label for="passWord">输入密码</label>
                <input type="password" name="pwd" class="input" id="password" size="18" maxlength="15" required="required"/>
                *(长度不能超过15个字符)<br>
            </div>
            <div>
                <label for="confirm_password">重复密码</label>
                <input type="password" name="repwd" class="input" id="confirm_password" size="18" maxlength="15" required="required"/>
                *<br>
            </div>
            <div>
                <label for="#">请选择密保问题</label>
                <select name="question">
                    <option  value= "你的父亲的名字？"> 你的父亲的名字？</option>
                    <option  value= "你的母亲的名字？"> 你的母亲的名字？</option>
                    <option  value= "你高一的班主任是？"> 你高一的班主任是？</option>
                    <option value="你大学辅导员的名字是?">你大学辅导员的名字是?</option>
                </select>
                <input type="text" name="answer" class="input" id="#" size="18" maxlength="15"/>
                *<br>
                <label>图片验证码</label><span class="input">
                    <input type="text"  name="verify" style="font-size:10px;color:red;"><img src="getVerify.php" alt="验证码无法显示？" /></span>
            </div>
            <div>
                <label for="AgreeToTerms">同意用户服务条款</label>
                <input style="height:22px;" type="checkbox" name="AgreeToTerms" id="AgreeToTerms" value="1"/>
                <a style="vertical-align:super;" href="#" title="您是否同意服务条款">点此查看用户条款</a>
                <i style="position:relative;top:-2px;"> *</i>
            </div>
            <div class="enter">
                <input name="create791" type="submit" class="buttom" value="提交"/>
                <input name="Submit" type="reset" class="buttom" value="重置"/>
            </div>
        </fieldset>
    </form>
    <br>
</div>
</body>
</html>