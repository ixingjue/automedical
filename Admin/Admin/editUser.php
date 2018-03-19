<?php
require_once '../include.php';
$uid=$_REQUEST['uid'];
$sql="select * from data_user where uid='{$uid}'";
$row=fetchOne($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Insert title here</title>
</head>
<body>
<h3>编辑用户</h3>
<form action="doAdminAction.php?act=editUser&uid=<?php echo $uid;?>" method="post" enctype="multipart/form-data">
    <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
        <tr>
            <td align="right">用户名</td>
            <td><input type="text" name="username" autofocus="autofocus" placeholder="<?php echo $row['uname'];?>"/></td>
        </tr>
        <tr>
            <td align="right">密码</td>
            <td><input type="password" name="password" required="required" /></td>
        </tr>
        <tr>
            <td align="right">电话</td>
            <td><input type="text" name="telphone"  required="required" placeholder="<?php echo $row['utelphone'];?>"/></td>

        </tr>
        <tr>
            <td align="right">性别</td>
            <td><input type="text" name="sex" required="required" placeholder="<?php echo $row['usex'];?>"/></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" required="required" value="编辑用户" /></td>
        </tr>

    </table>
</form>
</body>
</html>