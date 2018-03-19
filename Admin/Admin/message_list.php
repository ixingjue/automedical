<?php
require_once '../include.php';
/*
$pageSize=3;
$rows=getAdminByPage($pageSize);
*/
$sql="select * from message";
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
$sql="select * from message limit {$offset},{$pageSize}";
$rows=fetchAll($sql);
if(!$rows){
    //alertMes('');
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
        <div class="bui_select">
        </div>
    </div>
    <!--表格-->
    <table class="table" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th >编号</th>
            <th >用户</th>
            <th >标题</th>
            <th >内容</th>
            <th >评论时间</th>
            <th >回复状态</th>
            <th >操作</th>
        </tr>
        </thead>
        <tbody>
        <?php  foreach($rows as $row):?>
            <tr>
                <!--这里的id和for里面的c1 需要循环出来-->
                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $row['mid'];?></label></td>
                <td><?php echo $row['user'];?></td>
                <td><?php echo $row['title'];?></td>
                <td><?php echo $row['content'];?></td>
                <td><?php echo $row['lastdate'];?></td>
                <td><?php echo $row['state']==0?"未回复×":"已回复√";?></td>
                <td align="center"><input type="button" value="删除" class="btn" name="y" onclick="delMessage(<?php echo $row['mid'];?>)"><input type="button" value="回复" class="btn"  onclick="reply(<?php echo $row['mid'];?>)"></td>
            </tr>
        <?php endforeach;?>
        <?php if ($totalRows>$pageSize):?>
            <tr>
                <td colspan="7"><?php echo showPage($page,$totalPage);?> </td>
            </tr>
        <?php endif;?>
        </tbody>
    </table>
</div>
</body>
<script type="text/javascript">
    function reply(mid){
        window.location="reply.php?mid="+mid;
    }
    function delMessage(mid){
        if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
            window.location="doAdminAction.php?act=delMessage&mid="+mid;
        }
    }
</script>
</html>