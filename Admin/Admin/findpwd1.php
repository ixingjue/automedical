<?php
require_once '../include.php';
$name=$_SESSION['username'];
$sql="select * from izmu_admin where username='{$name}'";
$result=mysql_query($sql);
$row=mysql_fetch_assoc($result);
//print_r($row);
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
    <form action="doVerifyPwd.php" method="post" name="myForm" id="#" >
        <fieldset>
            <legend>找回管理员密码</legend>
            <div>
                <label for="Name">用户名</label>
                <input type="text" name="Name" class="input" id="Name" size="20" maxlength="30" value="<?php echo $row['username'];?>" required="required"/>
                *(可输入字母数组下划线)<br>
            </div>
            <div>
                <label for="Email">email</label>
                <input type="text" name="Email" class="input" id="Email" size="20" maxlength="150" required="required" value="<?php echo $row['email'];?>"/>
                *<br>
            </div>
            <div>
                <label for="question">请回答密保问题</label>
                <select name="question">
                    <option  value= "1"><?php echo $row['question'];?></option>
                </select>
                <br/>
                <label></label>
                <input type="text" name="answer1" class="input" id="#" size="18" maxlength="15"/>
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