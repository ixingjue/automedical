<?php
require_once('../../include.php');
$sql = "select * from message order by lastdata desc";
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
    <link rel="stylesheet" href="../styles/backstage.css">
</head>

<body>
<div class="details">
    <div class="details_operation clearfix">
        <div class="bui_select">
        </div>

    </div>
    <table class="table" cellspacing="0" cellpadding="0">
        <tr>
            <td colspan="6" align="center" >留言</td>
        </tr>
        <thread>
            <tr>
                <td >编号</td>
                <td >用户</td>
                <td >标题</td>
                <td >内容</td>
                <td >评论时间</td>
                <td >操作</td>
            </tr>
        </thread>
        <?php
        if(!empty($data)){
            foreach($data as $value){
                ?>
                <tr>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo $value['id']?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo $value['user']?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo $value['title']?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo $value['content']?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo $value['lastdata']?></td>
                    <td bgcolor="#FFFFFF"><a href="#">删除</a> &nbsp;&nbsp;<a href="#">修改</a></td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
</body>
</html>
