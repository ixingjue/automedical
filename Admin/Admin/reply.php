<?php
require_once '../include.php';
$mid=$_REQUEST['mid'];
$sql="select * from message where mid='{$mid}'";
$row=fetchOne($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Insert title here</title>
    <script type="text/javascript">
        //判断用户输入的电子邮箱格式是否正确
        function checkEmail(){
            var myforms=document.forms;
            var myemail=myforms[0].email.value;
            var myReg=/^[a-zA-Z0-9_-]+@([a-zA-Z0-9]+\.)+(com|cn|net|org)$/;

            if(myReg.test(myemail)){
                return true;
            }else{
                myspan.innerText="邮箱格式不对!";
                return false;
            }
        }
    </script>
</head>
<body>
<h3>回复反馈</h3>
<form action="doReply.php" method="post">
    <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
        <input type="hidden" name="id" value="<?php echo $row['mid'];?>">
        <tr>
            <td align="right">病人名</td>
            <td><input type="text" name="user"  required="required" readonly="readonly" value="<?php echo $row['user'];?>"/></td>
        </tr>
        <tr>
            <td align="right">咨询标题</td>
            <td><input type="text" name="title" required="required"  readonly="readonly" value="<?php echo $row['title'];?>"/></td></tr>

        </tr>
        <tr>
            <td align="right">咨询内容</td>
            <td><input type="text" name="content" required="required"  readonly="readonly" value="<?php echo $row['content'];?>"/></td>
        </tr>
        <tr>
            <td align="right">反馈内容</td>
            <td><input type="text" name="neirong" autofocus="autofocus" required="required" placeholder=""/></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" required="required" value="确认反馈" onclick="return checkEmail()"/></td>
        </tr>

    </table>
</form>
</body>
</html>