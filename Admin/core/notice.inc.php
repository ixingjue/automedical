<?php
/**
 * Created by PhpStorm.
 * User: IT-XIA-PC
 * Date: 2017/6/28
 * Time: 9:08
 */
require_once '../lib/mysql.func.php';
function addUsernotice(){
        $title=$_POST['title'];
        $uname=$_POST['cId'];
        $content=$_POST['content'];
        $dateline=time();
        $sql="insert into user_notice(title,pid,content,dateline) values('$title','$uname','$content','$dateline')";
        if (mysql_query($sql)) {
            $mes = "添加成功！<br/><a href='../fabu/tongzhi.php'>继续添加</a>";
        } else {
            $mes = "添加失败!<br/><a href='../fabu/tongzhi.php'>重新添加</a>";
        }
        return $mes;
}
function addAdminnotice(){
    $title=$_POST['title'];
    $content=$_POST['content'];
    $sql="insert into admin_notice(title,content) values('$title','$content')";
    if (mysql_query($sql)) {
        $mes = "添加成功！<br/><a href=''>继续添加</a>";
    } else {
        $mes = "添加失败!<br/><a href='../fabu/gonggao.php'>重新添加</a>";
    }
    return $mes;
}
function delGonggao($id)
{
    $sql="delete from admin_notice where id='$id'";
    //var_dump($sql);
    if( mysql_query($sql)){
        $mes="删除成功!<br/><a href='../Admin/listAdminGonggao.php'>查看列表</a>";
    }
    else{
        $mes="删除失败<br/><a href='../Admin/listAdminGonggao.php'>重新删除</a>";

    }
    return $mes;
}

function readGonggao($id)
{
    $sql="update admin_notice set state='1' where id='{$id}'";
    if( mysql_query($sql)){
        $mes="查看成功!<br/><a href='../Admin/listAdminGonggao.php'>查看列表</a>";
    }
    else{
        $mes="查看失败<br/><a href='../Admin/listAdminGonggao.php'>重新删除</a>";
    }
    return $mes;

}
