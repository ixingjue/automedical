<?php
require_once '../include.php';
$row_jibing=getAlldiseasetype();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Insert title here</title>
</head>
<body>
<h3>阈值设置</h3>
<form action="doAdminAction.php?act=editYuzhi" method="post">
    <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">

        <tr>
            <td align="right"></td>
            <td>
                <select name="did">
                    <?php foreach($row_jibing as $row):?>
                        <option value="<?php echo $row['did'];?>"><?php echo $row['dname'];?></option>
                    <?php endforeach;?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right">阈值</td>
            <td><input type="text" name="yuzhi"  placeholder="0.000到0.250之间"/></td>
        </tr>

        <tr>
            <td colspan="2"><input type="submit" required="required" value="修改阈值" /></td>
        </tr>

    </table>
</form>
</body>
</html>