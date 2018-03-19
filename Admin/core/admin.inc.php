<?php
/**
 * 检查管理员是否存在
 * Created by PhpStorm.
 * User: tete
 * Date: 2017/2/11
 * Time: 14:34
 */
require_once '../lib/mysql.func.php';
function checkAdmin($sql){
    return fetchOne($sql);
}
//检查是否有管理员登录
function checkLogined(){
    if ($_SESSION['adminId']=="" && $_COOKIE['adminId']==""){
        alertMes("请先登录","login.php");
    }
}
//注销管理员
function logout(){
    $_SESSION=array();
    if (isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);
    }
    if(isset($_COOKIE['adminId'])){
        setcookie("adminId","",time()-1);
    }
    if (isset($_COOKIE['adminName'])){
        setcookie("adminName","",time()-1);
    }
    session_destroy();
    header("location:login.php");
}
//添加管理员
function addAdmin()
{
    $arr = $_POST;
    $arr['password']=md5($_POST['password']);
    if (insert("izmu_admin", $arr)) {
        $mes = "添加成功！<br/><a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>查看管理员列表</a>";
    } else {
        $mes = "添加失败!<br/><a href='addAdmin.php'>重新添加</a>";
    }
    return $mes;
}
//得到管理员列表
function getAllAdmin(){
    $sql="select id,username,email from izmu_admin";
    $rows=fetchAll($sql);
    return $rows;
}
//编辑管理员
function editAdmin($id){
    $arr=$_POST;
    $arr['password']=md5($_POST['password']);
    if (update("izmu_admin",$arr,"id={$id}")){
        $mes="编辑成功!<a href='listAdmin.php'>查看管理员列表</a>";

    }else{
        $mes="编辑失败!<a href='listAdmin.php'>请重新修改</a>";
    }
    return $mes;
}
//删除管理员
function delAdmin($id){

    if(delete("izmu_admin","id={$id}")){
        $mes="删除成功!<br/><a href='listAdmin.php'>查看管理员列表</a>";
    }else{
        $mes="删除失败!<br/><a href='listAdmin.php'>请重新删除</a>";
    }
    return $mes;
}
/*
function getAdminByPage($pageSize=2){
    $sql="select * from imooc_admin";
    $totalRows=getResultNum($sql);
    global $totalPage;
    $totalPage=ceil($totalRows/$pageSize);
    $page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
    if ($page<1 || $page==null || !is_numeric($page)){
        $page=1;
    }
    if ($page>=$totalPage) $page=$totalPage;
    $offset=($page-1)*$pageSize;
    $sql="select id,username,email from imooc_admin limit {$offset},{$pageSize}";
    $rows=fetchAll($sql);
    return $rows;
}
*/
//添加用户
/*
function addUser(){
    $arr=$_POST;
    $arr['password']=md5($_POST['password']);
    $arr['regTime']=time();
    $uploadFile=uploadFile("../uploads");

    //print_r($uploadFile);
    if($uploadFile&&is_array($uploadFile)){
        $arr['face']=$uploadFile[0]['name'];
    }else{
        return "添加失败<a href='addUser.php'>重新添加</a>";
    }
//	print_r($arr);exit;
    if(insert("izmu_user", $arr)){
        $mes="添加成功!<br/><a href='addUser.php'>继续添加</a>|<a href='listUser.php'>查看列表</a>";
    }else{
        $filename="../uploads/".$uploadFile[0]['name'];
        if(file_exists($filename)){
            unlink($filename);
        }
        $mes="添加失败!<br/><a href='addUser.php'>重新添加</a>|<a href='listUser.php'>查看列表</a>";
    }
    return $mes;
}
*/
//删除用户
function delUser($uid){
    $sql="DELETE FROM `data_user` WHERE uid='{$uid}'";
    if(mysql_query($sql)){
        $mes="删除成功!<br/><a href='listUser.php'>查看用户列表</a>";
    }else{
        $mes="删除失败!<br/><a href='listUser.php'>请重新删除</a>";
    }
    return $mes;
}
//编辑用户
function editUser($uid){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $telphone=$_POST['telphone'];
    $sex=$_POST['sex'];
    $sql_user="update data_user set uname='{$username}',utelphone='{$telphone}',upwd='{$password}',usex='{sex}' where uid='{$uid}'";
    if (mysql_query($sql_user)){
        $mes="编辑成功!<a href='listUser.php'>查看用户列表</a>";

    }else{
        $mes="编辑失败!<a href='listUser.php'>请重新修改</a>";
    }
    return $mes;
}
//删除回复
function delReply($rid){
    $sql="DELETE FROM `reply` WHERE rid='{$rid}'";
    //var_dump($sql);
    if (mysql_query($sql)) {
        $mes = "删除成功!<br/><a href='reply_list.php'>查看回复</a>";
    } else {
        $mes = "删除失败!<br/><a href='reply_list.php'>请重新操作</a>";
    }
    return $mes;


}
//删除留言
function delMessage($mid){
    $sql="DELETE FROM `message` WHERE mid='{$mid}'";
    //var_dump($sql);
    if (mysql_query($sql)) {
        $mes = "删除成功!<br/><a href='message_list.php'>查看回复</a>";
    } else {
        $mes = "删除失败!<br/><a href='message_list.php'>请重新操作</a>";
    }
    return $mes;

}

//激活管理员
function actAdmin($id){
    $sql="update izmu_admin set state='1' where id='{$id}'";
    if (mysql_query($sql)) {
        $mes = "激活成功!<br/><a href='listAdmin.php'>查看管理员</a>";
    } else {
        $mes = "激活失败!<br/><a href='listAdmin.php'>请重新操作</a>";
    }
    return $mes;

}
//激活用户
function actUser($uid){
    $sql="update data_user set state='1' where uid='{$uid}'";
    //var_dump($sql);
    if (mysql_query($sql)) {
        $mes = "激活成功!<br/><a href='listUser.php'>查看用户</a>";
    } else {
        $mes = "激活失败!<br/><a href='listUser.php'>请重新操作</a>";
    }
    return $mes;
}
//禁用用户
function fobUser($uid){
    $sql="update data_user set state='0' where uid='{$uid}'";
    if (mysql_query($sql)) {
        $mes = "禁用成功!<br/><a href='listUser.php'>查看用户</a>";
    } else {
        $mes = "禁用失败!<br/><a href='listUser.php'>请重新操作</a>";
    }
    return $mes;
}
