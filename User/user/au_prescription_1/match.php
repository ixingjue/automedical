<?php 
/*******************疾病匹配*****************/
include'mysql_connect.php';
//自定义匹配函数
function &dsum($did){
                    $result=mysql_query("SELECT dsum FROM `diseasetype`where did=$did");
                    $row=mysql_fetch_row($result); $dsum=$row[0];//echo  $dsum;
					return $dsum;
				   }

function &yz($did){
                    $result=mysql_query("SELECT yz FROM `diseasetype`where did=$did");
                    $row=mysql_fetch_row($result); $yz=$row[0];//echo  $dsum;
					return $yz;
				   }
 //$key="失眠";//从表单获取
  $key=$_GET['key'];
if ($key=="痔疮")   {$did=1;$dsum=&dsum ($did); define('YZ','&yz($did)'); 	}  //让函数返回引用,必须在函数申明和赋值时都带上&操作符.
else if($key=="禽流感")   {$did=2;$dsum=&dsum ($did); define('YZ','&yz($did)');		}
else if($key=="慢性胃炎") {$did=3;$dsum=&dsum ($did); define('YZ','&yz($did)');		}
else if($key=="胆结石")   {$did=4;$dsum=&dsum ($did); define('YZ','&yz($did)');		}
else if($key=="便秘")     {$did=5;$dsum=&dsum ($did);define('YZ','&yz($did)'); 		}
else if($key=="皮肤过敏") {$did=6;$dsum=&dsum ($did);define('YZ','&yz($did)'); 	    }
else if($key=="癫痫")     {$did=7;$dsum=&dsum ($did);define('YZ','&yz($did)');		}
else if($key=="失眠")     {$did=8;$dsum=&dsum ($did);define('YZ','&yz($did)'); 		}
//禁止非法调用
else exit("不支持该疾病的处方查询！");//{echo  "不支持该疾病的处方查询！"; }				   
 
?>

