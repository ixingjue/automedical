<?php
/**
 * Created by PhpStorm.
 * User: IT-XIA-PC
 * Date: 2017/3/25
 * Time: 23:52
 */
require_once '../include.php';
$username=$_POST['Name'];
$email=$_POST['Email'];
$pwd=md5(($_POST['pwd']));
$repwd=md5(($_POST['repwd']));
$question=$_POST['question'];
$answer=$_POST['answer'];
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
//判断checkbox是否被选中
if ($_POST['AgreeToTerms']==1){
    if ($repwd==$pwd) {
    if ($verify == $verify1) {
        $sql = "select username from izmu_admin where username = '{$username}'"; //SQL语句
        $result = mysql_query($sql);    //执行SQL语句
        $num = mysql_num_rows($result); //统计执行结果影响的行数
        if ($num)    //如果已经存在该用户
        {
            alertMes("已经存在该用户", "reg.php");
        } else {
            $sql_insert = "insert into izmu_admin (username,password,email,question,answer) values('{$username}','{$pwd}','{$email}','{$question}','{$answer}')";
            $res_insert = mysql_query($sql_insert);
            //$num_insert = mysql_num_rows($res_insert);
            if ($res_insert) {
                alertMes("注册成功,审核通过后即可登录!", "login.php");
            } else {
                alertMes("注册失败!", "reg.php");
            }
        }
    } else {
        alertMes("验证码错误", "reg.php");
    }

}
else{
    alertMes("密码不一致","reg.php");
}
}
else
{
    alertMes("未同意用户条款","reg.php");
}
