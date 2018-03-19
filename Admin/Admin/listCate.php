<?php
require_once '../include.php';
/*
$pageSize=3;
$rows=getAdminByPage($pageSize);
*/
$sql="select id,type  from izmu_cate";
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
$sql="select id,type from izmu_cate limit {$offset},{$pageSize}";
$rows=fetchAll($sql);
if(!$rows){
    alertMes("sorry,没有分类,请添加!","addCate.php");
    exit;
}
?>
<html>
<head>
    <title>分类列表</title>
    <link rel="stylesheet" href="styles/backstage.css">
</head>
<body>
<div class="details">
    <div class="details_operation clearfix">
        <div class="bui_select">
            <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addCate()">
        </div>
    </div>
    <!--表格-->
    <table class="table" cellspacing="0" cellpadding="0">
        <thread>
    <tr>
        <th>编号</th>
        <th>名称</th>
        <th>操作</th>
    </tr>
        </thread>
        <tbody>
        <?php  foreach($rows as $row):?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['type']; ?></td>
            <td align="center">
                <input type="button" value="修改" class="btn" onclick="editCate(<?php echo  $row['id'];?>)">
                <input type="button" value="删除" class="btn" onclick="delCate(<?php echo $row['id'];?>)">
            </td>
        </tr>
        <?php endforeach;?>
        <?php if ($totalRows>$pageSize):?>
            <tr>
                <td colspan="4"><?php echo showPage($page,$totalPage);?> </td>
            </tr>
        <?php endif;?>
        </tbody>
</table>
</body>
<script type="text/javascript">

    function editCate(id){
        window.location="editCate.php?id="+id;
    }
    function addCate() {
        window.location="addCate.php";
    }
    function delCate(id){
        if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
            window.location="doAdminAction.php?act=delCate&id="+id;
        }
    }
</script>
</html>