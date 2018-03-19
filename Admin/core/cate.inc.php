<?php
/**
 * Created by PhpStorm.
 * User: tete
 * Date: 2017/2/16
 * Time: 8:53
 */
//添加分类的操作
/*
function addCate(){
    $arr=$_POST;
    if (insert("izmu_cate",$arr)){
        $mes="分类添加成功！<br/><a href='addCate.php'>继续添加</a>|<a href='listCate.php'>查看分类</a>";
    }else{
        $mes="分类添加失败！<br/><a href='addCate.php'>重新添加</a>|<a href='listCate.php'>查看分类</a>";
    }
    return $mes;
}
*/
//添加分类
function addCate(){
    $name=$_POST['cName'];
    $sql="insert into izmu_cate(type) values('$name')";
    if( mysql_query($sql)){
       $mes="分类添加成功！<br/><a href='addCate.php'>继续添加</a>|<a href='listCate.php'>查看分类</a>";
    }
    else{
       $mes="分类添加失败！<br/><a href='addCate.php'>重新添加</a>|<a href='listCate.php'>查看分类</a>";
    }
    return $mes;
}
//根据ID得到指定的分类信息
function getCateById($id){
    $sql="select id,type from izmu_cate where id={$id}";
    return fetchOne($sql);
}
//修改分类的操作
/*
function editCate($where){
    $arr=$_POST;
    if (update("izmu_cate",$arr,$where)){
        $mes="分类修改成功!<br/><a href='listCate.php'>查看分类</a>";
    }
    else{
        $mes="分类修改失败!<br/><a href='listCate.php'>重新修改</a>";
    }
    return $mes;
}
*/
//修改分类
function editCate($id){
    $name=$_POST['Name'];
    $sql="update izmu_cate set type='{$name}' where id='{$id}'";
    if( mysql_query($sql)){
        $mes="分类修改成功!<br/><a href='listCate.php'>查看分类</a>";
    }
    else{
        $mes="分类修改失败!<br/><a href='listCate.php'>重新修改</a>";
        // print_r($id_1);
    }
    return $mes;
}
//删除分类的操作
function delCate($id){
    $res=checkProExist($id);
    if(!$res) {
        $where = "id=" . $id;
        if (delete('izmu_cate', $where)) {
            $mes = "分类删除成功!<br/><a href='listCate.php'>查看分类</a>|<a href='addCate.php'>添加分类</a>";
        } else {
            $mes = "删除失败!<br/><a href='listCate.php'>请重新操作</a>";
        }
        return $mes;
    }else{
        alertMes("不能删除分类，请先删除该分类下的药品","listPro.php");
    }
}

//得到所有分类
function getAllCate(){
    $sql="select id,type from izmu_cate";
    $rows=fetchAll($sql);
    return $rows;
}
//得到所有用户通知
function getAllUserNotice()
{
    $sql="select * from data_user";
    $rows=fetchAll($sql);
    return $rows;
}
function getAlldiseasetype(){
    $sql="select * from diseasetype";
    $rows=fetchAll($sql);
    return $rows;
}
