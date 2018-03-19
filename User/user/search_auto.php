<?php
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
$v=$_POST['value'];
$re=mysql_query($sql="SELECT dname FROM diseasetype WHERE dname like '%{$v}%'");
if(mysql_num_rows($re)<=0) exit('0');
echo '<ul>';
while($ro=mysql_fetch_array($re))
echo '<li onClick="fill(\''.$ro['dname'].'\');"><p class="name">'.$ro['dname'].'</p></li>';
echo '<li class="cls"><a href="javascript:;" onclick="$(this).parent().parent().parent().fadeOut(100)">关闭</a& gt;</li>';
echo '</ul>';
?>
