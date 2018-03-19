<?php
require_once '../include.php';
$rid=$_REQUEST['rid'];
$sql="SELECT rid, recipe, dname, TYPE,recipe.did FROM diseasetype JOIN recipe WHERE diseasetype.did = recipe.did and rid='{$rid}'";
$row=fetchOne($sql);
$row_cate=getAllCate();
$did=$row['recipe.did'];
$rid=$row['rid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Insert title here</title>
</head>
<body>
<h3>编辑处方</h3>
<form action="doAdminAction.php?act=editrecipelist&did=<?php echo $did;?>&rid=<?php echo $rid;?>" method="post">
    <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
        <tr>
            <td align="right">疾病</td>
            <td><input type="text" name="dname" readonly="true" placeholder="<?php echo $row['dname'];?>"/></td>
        </tr>
        <tr>
            <td align="right">处方方案</td>
            <td><input type="text" name="recipe" required="required" autofocus="autofocus"  placeholder="<?php echo $row['recipe'];?>"/></td>
        </tr>
        <tr>
            <td align="right">疾病类型</td>
            <td>
                <select name="cid">
                    <?php foreach($row_cate as $row):?>
                        <option value="<?php echo $row['id'];?>"><?php echo $row['type'];?></option>
                    <?php endforeach;?>
                </select>
            </td>
        </tr>

        <tr>
            <td colspan="2"><input type="submit" required="required" value="编辑处方" /></td>
        </tr>

    </table>
</form>
</body>
</html>