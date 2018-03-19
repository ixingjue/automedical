<?php
require_once '../../configs/configs.php';
$v=$_POST[value];
$re=mysql_query("select * from diseasetype where dname like '%$v%' order by did desc limit 10"); //根据客户端发送来的数据，到数据库中查询10条相关的结果
if(mysql_num_rows($re)<=0) exit('0');//判断查询结果，如果没有相关的结果，那么直接返回0
echo '<ul>';
while($ro=mysql_fetch_array($re)) echo '<li><a href="search_444.php">'.$ro[dname].'</a></li>'; //将查询得到的相关结果的标题输出
echo '<li class="cls"><a href="javascript:;" onclick="$(this).parent().parent().parent().fadeOut(100)">关闭</a& gt;</li>';//输入一个关闭按钮，让用户不想看到提示层时可以点击关闭，关闭按钮采用jQuery
echo '</ul>';
?>

