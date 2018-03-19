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
<h3>添加管理员</h3>
<form action="doAdminAction.php?act=addAdmin" method="post">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">管理员名称</td>
		<td><input type="text" name="username"  placeholder="请输入管理员名称" autofocus="autofocus" required="required"/></td>
	</tr>
	<tr>
		<td align="right">管理员密码</td>
		<td><input type="password" name="password" placeholder="密码" required="required"/></td>
	</tr>
	<tr>
		<td align="right">管理员邮箱</td>
        <td><input type="text" name="email" id="email" required="required" placeholder="请输入管理员邮箱"/></td><td><span id=myspan style="text-size:18pt;color:red;"></span></td></tr>

    </tr>
    <tr>
        <td align="right">锁屏密码</td>
        <td><input type="text" name="lockPwd" placeholder="锁屏密码" /></td>
    </tr>
	<tr>
        <td colspan="2"><input type="submit" required="required" value="添加管理员" onclick="return checkEmail()"/></td>
	</tr>

</table>
</form>
</body>
</html>