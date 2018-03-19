<?php
/**
 * Created by PhpStorm.
 * User: IT-XIA-PC
 * Date: 2017/3/25
 * Time: 23:52
 */
require_once '../../configs/configs.php';
$username=$_POST['username'];
$telphone=$_POST['utelphone'];
$pwd=$_POST['pwd'];
$repwd=$_POST['repwd'];
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
    if ($repwd==$pwd) {
        if ($verify == $verify1) {
            $sql = "select uname from datauser where uname = '{$username}'"; //SQL语句
            $result = mysql_query($sql);    //执行SQL语句
            @$num = mysql_num_rows($result); //统计执行结果影响的行数
            if ($num)    //如果已经存在该用户
            {
                alertMes("已经存在该用户", "register.php");
            } 
			else {
                $sql_insert = "insert into data_user (uname,utelphone,upwd) values('{$username}','{$telphone}','{$pwd}')";
                $res_insert = mysql_query($sql_insert);
                //$num_insert = mysql_num_rows($res_insert);
                if ($res_insert) {
                    alertMes("注册成功,请登录!", "login.php");
                } 
				else {
                    alertMes("注册失败!", "reg.php");
                }
            }
        } 
		else {
            alertMes("验证码错误", "reg.php");
        }

    }
    else{
        alertMes("密码不一致","reg.php");
    }
