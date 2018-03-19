<?php
require_once('../include.php');
$sql = "select * from article order by dateline desc";
$query  = mysql_query($sql);
if($query&&mysql_num_rows($query)){
    while($row =mysql_fetch_assoc($query)){
        $data[] = $row;
    }
}else{
    $data = array();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link rel="stylesheet" href="styles/backstage.css">
</head>

<body>
<div class="details">
    <div class="details_operation clearfix">
        <div class="bui_select">
            <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addNews()">
        </div>

    </div>
    <table class="table" cellspacing="0" cellpadding="0">
                <tr>
                    <td colspan="3" align="center" >文章管理列表</td>
                </tr>
                <thread>
                <tr>
                    <td width="15%" >编号</td>
                    <td width="25%" >标题</td>
                    <td width="35%" >操作</td>
                </tr>
                </thread>
                <?php
                if(!empty($data)){
                    foreach($data as $value){
                        ?>
                        <tr>
                            <td bgcolor="#FFFFFF">&nbsp;<?php echo $value['id']?></td>
                            <td bgcolor="#FFFFFF">&nbsp;<?php echo $value['title']?></td>
                            <td bgcolor="#FFFFFF"><a href="article.del.handle.php?id=<?php echo $value['id']?>">删除</a> &nbsp;&nbsp;<a href="article.modify.php?id=<?php echo $value['id']?>">修改</a></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
    <script type="text/javascript">
        function addNews() {
            window.location="addNews.php";

        }
      </script>
</body>
</html>
