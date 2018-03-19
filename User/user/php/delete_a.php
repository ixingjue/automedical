<?php 
 require_once '../../configs/configs.php';
 $rid=$_REQUEST['rid'];
 $sql="DELETE FROM `reply` WHERE rid='{$rid}'";
    if (mysql_query($sql)) {
		alertMes("删除成功!","showNews.php");
    } else {
		alertMes("删除失败!","showNews.php");
    }

?>
