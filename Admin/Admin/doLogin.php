<?php
/**
 * Created by PhpStorm.
 * User: tete
 * Date: 2017/2/10
 * Time: 23:01
 */
//session_start();
//防止sql注入代码
function post_check($post)
{
    if (!get_magic_quotes_gpc()) // 判断magic_quotes_gpc是否为打开
    {
        $post = addslashes($post); // 进行magic_quotes_gpc没有打开的情况对提交数据的过滤
    }
    $post = str_replace("_", "＼_", $post); // 把 '_'过滤掉
    $post = str_replace("%", "＼%", $post); // 把' % '过滤掉
    $post = nl2br($post); // 回车转换
    $post= htmlspecialchars($post); // html标记转换
    return $post;
}
//防止sql注入结束
post_check($post);
require_once '../include.php';
$username=$_POST['username'];
$password=md5(($_POST['password']));
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
$autoFlag=$_POST['autoFlag'];
if ($verify==$verify1){
$sql="select * from izmu_admin where username='{$username}' and password='{$password}'";
@$row1=mysql_fetch_assoc($sql);
$row=checkAdmin($sql);
//$row=mysql_fetch_assoc($sql);
    if ($row){
        if ($row['state']==1){
    //如果选了一周中自动登录
    if ($autoFlag){
        setcookie("adminId",$row['id'],time()+7*24*3600);
        setcookie("adminName",$row['username'],time()+7*24*3600);
    }
    $_SESSION['adminName']=$row['username'];
    $_SESSION['adminId']=$row['id'];
    $_SESSION['permission']=$row['permission'];
    //header("location:index.php");
    //echo "<script>layer.alert('77');</script>";
    //var_dump($row);
    alertMes("登陆成功","index.php");
}
else{
    alertMes("该账号未激活,请联系管理员","login.php");
}
    }
else {

    alertMes("用户名或密码错误,重新登陆！","login.php");
}
}
else{
    alertMes("验证码错误","login.php");
}