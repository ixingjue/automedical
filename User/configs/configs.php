<?php
/**
 * Created by PhpStorm.
 * User: tete
 * Date: 2017/2/10
 * Time: 23:19
 */
header("content-type:text/html;charset=utf-8");
session_start();
define("DB_HOST","127.0.0.1");
define("DB_USER","root");
define("DB_PWD","");
define("DB_DBNAME","automedicine");
define("DB_CHARSET","utf8");
function connect(){
    $link= @mysql_connect(DB_HOST,DB_USER,DB_PWD) or die("数据库连接失败ERROR:".mysql_errno().":".mysql_error());
    mysql_set_charset(DB_CHARSET);
    mysql_select_db(DB_DBNAME) or die("指定数据库打开失败");
    return $link;
}
connect();
function alertMes($mes,$url){
    echo "<script>alert('{$mes}');</script>";
    echo "<script>window.location='{$url}';</script>";
}



