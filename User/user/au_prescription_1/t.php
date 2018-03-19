<?php 
include'match.php';
function &ridmin($did){//返回每种疾病的最大、最小处方号RID
                    $arr2=array(); 
                    $result=mysql_query("SELECT rid FROM `recipe` where did=$did");
                    while($row=mysql_fetch_assoc($result)) //$rid=$row[0];echo  $dsum;
					$arr[]=$row['rid'];
					//print_r($arr);
					foreach($arr as $value){
						$arr2[]=$value;    } 
						$ridmin=min($arr2);					
						//echo "rmin=".$ridmin."    ";
                           return $ridmin;				
                     }

function &ridmax($did){//返回每种疾病的最大、最小处方号RID
                    $arr2=array(); 
                    $result=mysql_query("SELECT rid FROM `recipe` where did=$did");
                    while($row=mysql_fetch_assoc($result)) //$rid=$row[0];echo  $dsum;
					$arr[]=$row['rid'];//print_r($arr);
					foreach($arr as $value){
						$arr2[]=$value;    } 
						$ridmax=max($arr2);
					    //echo "rmax=".$ridmax;//print_r($arr2);
                      return $ridmax;						
}
 
$tt=&ridmin($did);
$tt1=&ridmax($did); //echo "<br>" ;
$n="";$r1=array();// 动态获取并存放各个处方 ，如痔疮有4个处方方案，禽流感有3个
$a11=array();$a22=array();$a33=array();//有效级分别为1、2、3的检验值
for($tt;$tt<=$tt1;$tt++){

	  $recipe=mysql_query("SELECT recipe FROM `recipe` where did='$did' and rid='$tt'");
	  $row=mysql_fetch_assoc($recipe);
	  $r1[]= $row['recipe'];
      // array_push ($r1,$row );print_r($r1)."chufang";
	  
	  
/* #########################处方有效性计算模块############################### */
$result=mysql_query("SELECT effect1,effect2,effect3 FROM `recipe` where did='$did' and rid='$tt'");
while($row=mysql_fetch_assoc($result))
{
$p_1 =$row['effect1']/$dsum;//echo "<br>";
$p_11=round($p_1 ,3);
//echo "方案".$tt."（case1）在有效级为n=1时的有效性=".$p_11;  echo"有效级为：" .$n=1; echo "<br>" ;
$p_2=($row['effect1']+$row['effect2'])/$dsum;
$p_12=round($p_2 ,3);
//echo "方案".$tt."（case1）在有效级为n=2时的有效性=".$p_12 ;echo "有效级为：" .$n=2; echo "<br>" ;
$p_3=($row['effect1']+$row['effect2']+$row['effect3'])/$dsum;$p_13=round($p_3 ,3);
//echo "方案".$tt."（case1）在有效级为n=3时的有效性=".$p_13 ;echo"有效级为：" . $n=3;    echo "<br>"."<br>";
}
/* $a=array ($tt => array ($p_11,$p_12,$p_13 ));
   print_r($a);  echo "<br>" ;  
  // $a1=array(); 
   foreach ($a as $val) { 
  // $a1[]=$val;
  if($tt==1)
    print_r($val); 
else if ($tt==2)
print_r($val);           } // print_r($val);  var_dump($a1); */ 
 $a=array ($tt => array ("effect1"=>$p_11-YZ,
                        "effect2"=>$p_12-YZ,
						"effect3"=>$p_13-YZ ));							
  // echo  $a[$tt]["effect1"]." ";      echo $a[$tt]["effect2"]." ";    echo $a[$tt]["effect3"]." ";    
    $a1=$a[$tt]["effect1"]; array_push ($a11,$a1 );//压栈的方式存储检验值
	$a2=$a[$tt]["effect2"];	array_push ($a22,$a2 );
    $a3=$a[$tt]["effect3"];	array_push ($a33,$a3 );  
}//print_r($r1);

//赋处方,将处方方案与对应的有效性检验值一一对应
$c1=array_combine($r1,$a11);//print_r($c1);
$c2=array_combine($r1,$a22);//print_r($c2);
$c3=array_combine($r1,$a33);//print_r($c3); //var_dump($a11);var_dump($a22);var_dump($a33);    //print_r($a11);print_r($a22);print_r($a33);
  /* $a=array ($tt => array ("effect1"=>$p_11,
                        "effect2"=>$p_12,
						"effect3"=>$p_13 ));	 echo $a[$tt]["effect1"]." ";  echo $a[$tt]["effect2"]." ";  echo $a[$tt]["effect3"]." ";  */	 
/*  $yxx1=array(); $yxx2=array(); $yxx3=array(); //$a11=array();// $a22=array(); $a33=array();
    $yxx1[]=$a[$tt]["effect1"]-YZ; $yxx2[]=$a[$tt]["effect2"]-YZ;  $yxx3[]=$a[$tt]["effect3"]-YZ; print_r( $yxx1 ) ; print_r( $yxx2); print_r( $yxx3);echo "<br>" ;      	  
	$b=array ($tt => array ("yxx1"=>$yxx1, "yxx2"=>$yxx2, "yxx3"=>$yxx3 ));   print_r($b[$tt]["yxx1"])." ";print_r($b[$tt]["yxx2"])." ";   print_r($b[$tt]["yxx3"])." ";  */
                          					   

 
 /* #########################处方计算之有效性检验模块############################### */
$t=$_GET['t'];//从表单获取
//$k="";$j="0";
 for ($n = 1; $n <= 3; $n++) {//有效级 
     switch ($n) {
        case (1):
               $arr2=array();	//	存放遍历后的值
			   $ar2=array();	//存放筛选后的数
               foreach ($c1 as $key=>$x_value)
               $arr2[] =  $x_value; //echo  "~~~n=1~~~"; print_r($arr2);   echo "<br>";
               $clength = count($arr2);//echo "个数 ：".$clength	; echo  "<br>";	
                  for ($i=0;$i<=$clength-1;$i++)
					  //筛选非负值
                     if ( $arr2[$i] > 0) 					  
					$ar2[]=$arr2[$i]; // echo  "~~>0~~" ;  print_r($ar2);    echo "<br>";	             
					$clength1 = count($ar2);//echo "检验值为正数的个数 ：".$clength1; echo  "<br>";				
	                $k="";$j="0";
                     if (($clength1 >=1) && ($clength1>=$t))
				       {					 
					   //将存放检验值的数组排序，从大到小降序排列
                       arsort($c1);//echo  "<br>";//print_r($c1);echo  "<br>";echo  "<br>";
					   //将该数组的键值对调换顺序
		               $e= array_keys($c1);		//print_r($e);echo  "<br>"; 
					   //从表单获得需要输出的处方数t					   					   
                          for($j;$j<$t;$j++)							
                            {	//echo $e[$j];
						//
						if($t==1) {echo "最佳可行处方为:"." ".@$e[$j]."<br>";echo "处方有效级为".$n.":药效明显，复发频度低"."<br>";break 3;}
						//
						else  { $k=$j+1;//计数					   
                              echo "第".$k."个处方为:"." ".@$e[$j]."<br>"; //echo  "<br>";
						      	}						  
							}echo "处方有效级为".$n.":药效明显，复发频度低"."<br>";echo "<hr/>";
								
						break 2;
					 }
                    else if (($clength1>=1) && ($clength1<=$t))//“供不应求”、边界测试得出
					{
						//将存放检验值的数组排序，从大到小降序排列
                       arsort($c1);//echo  "<br>";print_r($c1);echo  "<br>";echo  "<br>";
					   //将该数组的键值对调换顺序
		               $e= array_keys($c1);		//print_r($e);echo  "<br>"; 
					   //从表单获得需要输出的处方数t
						for($j;$j<=$clength1-1;$j++)//此时 有多少方案就输出多少
						{$k=$j+1;//计数							
                         echo "第".$k."个处方为:"." ".@$e[$j] ."<br>";  
							  }echo "处方有效级为".$n.":药效明显，复发频度低" ; echo  "<br>";echo "<hr/>";// echo  "<br>";
                      $t-=$clength1;//差多少处方就在后面递减的处方效果中补多少				  
					}							
 break;
        case(2): 
           $arr2=array();	   $ar2=array();	
             foreach ($c2 as $key=>$x_value)
              $arr2[] =  $x_value; // print_r($arr2);   echo  "###arr2###"."<br>";
              $clength = count($arr2);//echo "个数 ：".$clength	; echo  "<br>";	
                for ($i=0;$i<=$clength-1;$i++)
                  if ( $arr2[$i] > 0) 					  
					 $ar2[]=$arr2[$i];  // print_r($ar2);   echo  "###"."<br>";		             
					 $clength1 = count($ar2);//echo "个数 ：".$clength1; echo  "<br>";				
	//                $t="3";//从表单获取
	    $k="";$j="0";
                    if (($clength1 >=1) && ($clength1>=$t))
				     {					  
                       arsort($c2);//print_r($c2);echo  "***********"."<br>";
		               $e= array_keys($c2);//改变键——值的位置		print_r($e);echo  "<br>";
					   
                          for($j;$j<$t;$j++)							
                            {	
						  if($t==1 && $clength ==1) {echo "最佳可行处方为:"." ".@$e[$j]."<br>";echo "处方有效级为".$n.":药效良好，短期内无症状"."<br>";break 3;}
						//
						else  { 
						    $k=$j+1;//计数	                           						
                            echo "第".$k."个处方为:"." ".@$e[$j]."<br>"; //echo  "<br>";
						      }//if ($k==$t) echo "<hr/>";
							}echo "处方有效级为".$n.":药效良好，短期内无症状"."<br>";
							
						break 2;
					 } 
					 
					 
                    else if (($clength1>=1) && ($clength1<=$t))//“供不应求”、边界测试得出
					{
						//将存放检验值的数组排序，从大到小降序排列
                       arsort($c1);//echo  "<br>";//print_r($c1);echo  "<br>";echo  "<br>";
					   //将该数组的键值对调换顺序
		               $e= array_keys($c1);		//print_r($e);echo  "<br>"; 
					   //从表单获得需要输出的处方数t
						for($j;$j<=$clength1-1;$j++)//此时 有多少方案就输出多少
						{$k=$j+1;//计数						
                         echo "第".$k."个处方为:"." ".@$e[$j]."<br>" ; //echo  "<br>";
							  }echo "处方有效级为".$n.":药效良好，短期内无症状";
							   echo  "<br>"; echo  "<br>"; 
                      $t-=$clength1;//差多少处方就在后面递减的处方效果中补多少				  
					}		echo "<hr/>";					 
						                                
break;								              
            case (3):
 				 $arr2=array();	   $ar2=array();	
             foreach ($c3 as $key=>$x_value)
              $arr2[] =  $x_value;  //print_r($arr2);   echo  "###arr2###"."<br>";
              $clength = count($arr2);//echo "个数 ：".$clength	; echo  "<br>";	
                for ($i=0;$i<=$clength-1;$i++)
                  if ( $arr2[$i] > 0) 					  
					 $ar2[]=$arr2[$i];  // print_r($ar2);   echo  "###"."<br>";		             
					 $clength1 = count($ar2);//echo "个数 ：".$clength1; echo  "<br>";				
	//			    $t="3";//从表单获取
	                  $k="";$j="0";
                    if (($clength1>=1) && ($clength1>=$t))
				     {
					 
                       arsort($c3);//print_r($c3);echo  "***********"."<br>";
		               $e= array_keys($c3);		//print_r($e);echo  "<br>";
                 //   foreach($yxx2 as $key => $value)              
                          for($j;$j<$t;$j++)							
                            {	
					if($t==1 && $clength1==1) {echo "最佳可行处方为:"." ".@$e[$j]."<br>";echo "处方有效级为".$n.":用药后仅症状有所减轻"."<br>";break 3;}
						//
						else  { $k=$j+1;//计数					   
                              echo "第".$k."个处方为:"." ".@$e[$j]."<br>"; //echo  "<br>";
						      	}	  							
							}  echo "处方有效级为".$n.":用药后仅症状有所减轻"."<br>";
						break 2;
					 }

                else if (($clength1>=1) && ($clength1<=$t))//“供不应求”、边界测试得出
					{
						//将存放检验值的数组排序，从大到小降序排列
                       arsort($c1);//echo  "<br>";//print_r($c1);echo  "<br>";echo  "<br>";
					   //将该数组的键值对调换顺序
		               $e= array_keys($c1);		//print_r($e);echo  "<br>"; 
					   //从表单获得需要输出的处方数t
						for($j;$j<=$clength1-1;$j++)//此时 有多少方案就输出多少
						{$k=$j+1;//计数			
						echo "处方有效级为".$n.":用药后仅症状有所减轻";
                         echo "第".$k."个处方为:"." ".@$e[$j]."<br>"."<br>"; //echo  "<br>";
							  }
                      $t-=$clength1;//差多少处方就在后面递减的处方效果中补多少				  
					}					
                break;
        }
    }

?>











