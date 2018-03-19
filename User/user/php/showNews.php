<?php 
 require_once '../../configs/configs.php';
 $sql="select * from reply";
    function getResultNum($sql){
        $result=mysql_query($sql);
        return mysql_num_rows($result);
    }
function showPage($page,$totalPage,$where=null,$sep="&nbsp;")
{
    $where=($where==null)?null:"&".$where;
    $url = $_SERVER['PHP_SELF'];
    $index = ($page == 1) ? "首页" : "<a href='{$url}?page=1{$where}'>首页</a>";
    $last = ($page == $totalPage) ? "尾页" : "<a href='{$url}?page={$totalPage}{$where}'>尾页</a>";
    $prev = ($page == 1) ? "上一页" : "<a href='{$url}?page=" . ($page - 1) . "{$where}'>上一页</a>";
    $next = ($page == $totalPage) ? "下一页" : "<a href='{$url}?page=" . ($page + 1) . "{$where}'>下一页</a>";
    $str = "总共{$totalPage}页/当前是第{$page}页";
    $p = '';
    for ($i = 1; $i <= $totalPage; $i++) {
        //当前页无连接
        if ($page == $i) {
            $p .= "[{$i}]";
        } else {
            $p .= "<a href='{$url}?page={$i}'>[{$i}]</a>";
        }
    }
    echo "<hr/>";
    $pageStr= $str .$sep . $index .$sep. $prev.$sep . $p .$sep. $next.$sep . $last;
    return $pageStr;
}
$totalRows=getResultNum($sql);
$pageSize=4;
$totalPage=ceil($totalRows/$pageSize);
@$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if ($page<1 || $page==null || !is_numeric($page)){
    $page=1;
}
if ($page>=$totalPage) $page=$totalPage;
 $offset=($page-1)*$pageSize;
 $uname=$_SESSION['uname'];
 $sql_1="select * from reply where user ='{$uname}'limit {$offset},{$pageSize}";
 $result_1=mysql_query($sql_1);
 while(@$row=mysql_fetch_assoc($result_1))
 {
	 $rows[]=$row;
 }
 
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/showNews.css">
</head>

<body>
<div class="details">
    <!--表格-->
    <table class="table-out" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th >编号</th>
            <th >病症</th>
            <th >时间</th>
        </tr>
        </thead>
        <tbody>
        <?php  foreach($rows as $row):?>
            <tr class="table-in">
                <!--这里的id和for里面的c1 需要循环出来-->
                <td><label for="c1" class="label" ><?php echo $row['rid'];?></label></td>
                <td><?php echo $row['title'];?></td>
                <td><?php echo $row['date'];?></td>
                <td align="center"><input type="button" value="查看" class="btn"  onclick="myReply(<?php echo $row['rid'];?>)">	<input type="button" value="删除" class="btn"  onclick="delReply(<?php echo $row['rid'];?>)">				
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
</div>
</body>
<script type="text/javascript">
    function myReply(rid){
        window.location="myReply.php?rid="+rid;
    }
	    function delReply(rid){
        if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
            window.location="delete_a.php?rid="+rid;
        }
    }
	
</script>
</html>
