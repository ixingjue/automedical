<?php
require_once '../include.php';
?>
<!DOCTYPE>
<html>
<head>
    <title>找回密码</title>
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
    <center><h3>找回密码</h3></center>
    <form action="doFindPwd.php" method="post" name="myForm" id="">
        <fieldset>
            <legend>找回密码</legend>
            <div>
                <label for="#">请选择条件找回密码</label>
                <select name="query">
                    <option  value= "1"> 按账号查找</option>
                    <option  value= "2"> 按邮箱查找</option>
                </select>
                <input type="text" name="tiaojian" class="input" id="#" size="18" maxlength="15"/>
                *<br>
            </div>
            <div>
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