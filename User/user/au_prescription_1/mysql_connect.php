<?php
/***********************连接数据库****************************/
//常量参数
 define('DB_HOST','localhost');
 define('DB_USER','root'); 
 define('DB_PWD','');
 //define('YZ','0.125');
 
 
//一、连接到MySQL服务器：三个参数（服务器地址，服务器用户名，服务器密码）
 $link =mysql_connect(DB_HOST, DB_USER, DB_PWD) or die("Could not connect : " . mysql_error()); //die
 if(!$link){
       // echo '数据库连接失败...<br>';
        exit(-1);
           }
 else{
      // echo "数据库连接成功...<br>";
      }
 mysql_select_db("automedicine",$link) or die("Could not select database". mysql_error());
   if(mysql_error())   echo "连接数据出错";	
	else             //  echo"数据库连接正常<br />";
 mysql_query("set names utf8");//设置字符集编码  为了显示中文字符 

?>