<?php
	error_reporting(0);
	session_start();
    header("Content-type:text/html;charset:utf-8");
	 //全局变量
    $succ_result=0;
    $error_result=0;
    $file=$_FILES['filename'];
    $max_size="2000000"; //最大文件限制（单位：byte）
    $fname=$file['name'];
    $ftype=strtolower(substr(strrchr($fname,'.'),1));
    //文件格式
    $uploadfile=$file['tmp_name'];
    if($_SERVER['REQUEST_METHOD']=='POST'){
	    if(is_uploaded_file($uploadfile)){
			if($file['size']>$max_size){
		   echo "Import file is too large"; 
		   exit;
		   }
			if($ftype!='xls'){
		   echo "Import file type is error";
			exit;   
		   }
	   }else{
		echo "The file is not empty!";
		exit; 
	   } 
   }
	/** PHPExcel_IOFactory */
	require_once 'PHPExcel/PHPExcel/IOFactory.php';
	// Check prerequisites
	$reader = PHPExcel_IOFactory::createReader('Excel5'); //设置以Excel5格式(Excel97-2003工作簿)
	$conn= mysql_connect('127.0.0.1','root','')or die("数据库连接失败！");
	mysql_select_db("automedicine",$conn) or die("mysql_error()");
	mysql_query("set names utf8");//设置编码
	$PHPExcel = $reader->load($uploadfile); // 载入excel文件
	$sheet = $PHPExcel->getSheet(1); // 读取第一個工作表
	$highestRow = $sheet->getHighestRow(); // 取得总行数
	$highestColumm = $sheet->getHighestColumn(); // 取得总列数
	// 循环读取每个单元格的数据 */
	for ($row =2; $row <= $highestRow;$row++){//行数是以第1行开始
	    unset($string);//重置数组
		for ($column ='B';$column <= $highestColumm; $column++) {//列数是以A列开始
			$string[]=$sheet->getCell($column.$row)->getValue();
			//echo $column.$row.":".$sheet->getCell($column.$row)->getValue()."<br />";
			//echo isset($string[0])?$string[0]:"数组不存在！！"
		}
	   $sqli="insert into diseasetype(dname,num,type)values('$string[0]','$string[1]','$string[2]')";
	   mysql_query($sqli) or die("mysql_error()");
	}
	
	if(!mysql_error()){
			echo "导入数据成功！";
			}

?>