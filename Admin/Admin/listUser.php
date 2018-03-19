<?php
require_once '../include.php';
$sql="select * from data_user";
$totalRows=getResultNum($sql);
$pageSize=3;
$totalPage=ceil($totalRows/$pageSize);
$pageSize=3;
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if ($page<1 || $page==null || !is_numeric($page)){
    $page=1;
}
if ($page>=$totalPage) $page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select * from data_user limit {$offset},{$pageSize}";
$rows=fetchAll($sql);
if(!$rows){
    alertMes("sorry,没有用户,请添加!","");
    exit;
}

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>-.-</title>
    <link rel="stylesheet" href="styles/backstage.css">
</head>

<body>
<div class="details">
    <div class="details_operation clearfix">
    </div>
    <!--表格-->
    <table class="table" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th >编号</th>
            <th >用户名称</th>
            <th >联系方式</th>
            <th >性别</th>
            <th >年龄</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php  foreach($rows as $row):?>
            <tr>
                <!--这里的id和for里面的c1 需要循环出来-->
                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $row['uid'];?></label></td>
                <td><?php echo $row['uname'];?></td>
                <td><?php echo $row['utelphone'];?></td>
                <td><?php echo $row['usex'];?></td>
                <td><?php echo $row['uage'];?></td>
                <td align="center"><input type="button" value="修改" class="btn" onclick="editUser(<?php echo $row['uid'];?>)"><input type="button" value="删除" class="btn"  onclick="delUser(<?php echo $row['uid'];?>)"><?php if ($row['state']==1){  $uid=$row['uid'];echo "<button class='btn' onclick='fobUser($uid)'>"."禁用</button>";} else{  $uid=$row['uid'];echo "<button class='btn' onclick='actUser($uid)'>"."激活</button>";}  ?>
            </tr>
        <?php endforeach;?>
        <?php if ($totalRows>$pageSize):?>
            <tr>
                <td colspan="6"><?php echo showPage($page,$totalPage);?> </td>
            </tr>
        <?php endif;?>
        </tbody>
    </table>
</div>
</body>
<script type="text/javascript">
    function fobUser(uid){
        if(window.confirm("禁用后不可登录")){
            window.location="doAdminAction.php?act=fobUser&uid="+uid;
        }
    }
    function actUser(uid){
        if(window.confirm("激活后可正常使用")){
            window.location="doAdminAction.php?act=actUser&uid="+uid;
        }
    }
    function editUser(uid){
        window.location="editUser.php?uid="+uid;
    }
    function delUser(uid){
        if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
            window.location="doAdminAction.php?act=delUser&uid="+uid;
        }
    }
</script>
</html>