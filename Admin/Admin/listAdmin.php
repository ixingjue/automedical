<?php 
require_once '../include.php';
/*
$pageSize=3;
$rows=getAdminByPage($pageSize);
*/
$sql="select * from izmu_admin";
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
$sql="select id,username,email,state from izmu_admin limit {$offset},{$pageSize}";
$rows=fetchAll($sql);
if(!$rows){
	alertMes("sorry,没有管理员,请添加!","addAdmin.php");
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
                            <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addAdmin()">
                        </div>
                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="15%">编号</th>
                                <th width="15%">管理员名称</th>
                                <th >管理员邮箱</th>
                                <th >激活状态</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($rows as $row):?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $row['id'];?></label></td>
                                <td><?php echo $row['username'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php if($row['state']==1){echo "已激活 √";}else {echo "未激活 ×"; };?></td>
                                <td align="left"><input type="button" value="修改" class="btn" onclick="editAdmin(<?php echo $row['id'];?>)"><input type="button" value="删除" class="btn"  onclick="delAdmin(<?php echo $row['id'];?>)"><?php if ($row['state']==0){  $id=$row['id'];echo "<button class='btn' onclick='actAdmin($id)'>"."激活"; echo "</button>";}?></td>
                            </tr>
                            <?php endforeach;?>
                            <?php if ($totalRows>$pageSize):?>
                            <tr>
                                <td colspan="5"><?php echo showPage($page,$totalPage);?> </td>
                            </tr>
                        <?php endif;?>
                        </tbody>
                    </table>
                </div>
</body>
<script type="text/javascript">

	function addAdmin(){
		window.location="addAdmin.php";	
	}
	function editAdmin(id){
			window.location="editAdmin.php?id="+id;
	}
	function delAdmin(id){
			if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
				window.location="doAdminAction.php?act=delAdmin&id="+id;
			}
    }
    function actAdmin(id){
        if(window.confirm("激活后可正常登录")){
            window.location="doAdminAction.php?act=actAdmin&id="+id;
        }
    }

</script>
</html>