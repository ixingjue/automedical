<?php
require_once '../include.php';
/*
$pageSize=3;
$rows=getAdminByPage($pageSize);
*/
$sql="SELECT rid,message.id,message.user,message.title,message.content,lastdate,state,date,reply.content as reply_content FROM message JOIN reply WHERE message.mid = reply.id";
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
$sql="SELECT rid,message.id,message.user,message.title,message.content,lastdate,state,date,reply.content as reply_content FROM message JOIN reply WHERE message.mid = reply.id  limit {$offset},{$pageSize}";
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
            <th >咨询内容</th>
            <th >评论时间</th>
            <th >回复状态</th>
            <th >回复内容</th>
            <th >回复时间</th>
            <th >操作</th>
        </tr>
        </thead>
        <tbody>
        <?php  foreach($rows as $row):?>
            <tr>
                <!--这里的id和for里面的c1 需要循环出来-->
                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $row['rid'];?></label></td>
                <td><?php echo $row['user'];?></td>
                <td><?php echo $row['title'];?></td>
                <td><?php echo $row['content'];?></td>
                <td><?php echo $row['lastdate'];?></td>
                <td><?php
                    echo $row['state']==0?"未回复×":"已回复√";
                    ?></td>
                <td><?php echo $row['reply_content'];?></td>
                <td><?php echo $row['date'];?></td>
                <td align="center"><input type="button" value="删除" class="btn" name="k" onclick="delReply(<?php echo $row['rid'];?>)"></td>
            </tr>
        <?php endforeach;?>
        <?php if ($totalRows>$pageSize):?>
            <tr>
                <td colspan="9"><?php echo showPage($page,$totalPage);?> </td>
            </tr>
        <?php endif;?>
        </tbody>
    </table>
</div>
</body>
<script type="text/javascript">
    function delReply(rid){
        if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
            window.location="doAdminAction.php?act=delReply&rid="+rid;
        }
    }

</script>
</html>