<?php
/**
 * Created by PhpStorm.
 * User: IT-XIA-PC
 * Date: 2017/3/25
 * Time: 23:52
 */
require_once '../include.php';
$mid=$_POST['id'];
$user=$_POST['user'];
$title=$_POST['title'];
$neirong=$_POST['neirong'];
//判断checkbox是否被选中
$sql_insert = "insert into reply (id,user,content,title,date) values('{$mid}','{$user}','{$neirong}','{$title}',now())";
$res_insert = mysql_query($sql_insert);
$sql_update="update message set state='1' where mid='{$mid}'";
$res_update = mysql_query($sql_update);
//$num_insert = mysql_num_rows($res_insert);
if ($res_insert) {
    alertMes("回复成功", "reply_list.php");

} else {
    alertMes("回复失败!", "reply.php");
}




