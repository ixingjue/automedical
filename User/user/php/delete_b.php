<?php 
 require_once '../../configs/configs.php';
 $rid=$_REQUEST['rid'];
 $sql="DELETE FROM `user_notice` WHERE id='{$rid}'";
    if (mysql_query($sql)) {
		alertMes("删除成功!","systemNews.php");
    } else {
		alertMes("删除失败!","systemNews.php");
    }

?>
