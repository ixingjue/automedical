<?php 
	$dir=dirname(__FILE__);//查找当前脚本所在路径
	require $dir."/db.php";//引入mysql操作类文件
	require $dir."/PHPExcel/PHPExcel.php";//引入PHPExcel
	$db=new db($automedicine);//实例化db类 连接数据库
	$objPHPExcel=new PHPExcel();//实例化PHPExcel类， 等同于在桌面上新建一个excel
	$objPHPExcel->createSheet();//创建新的内置表
	/* for($i=1;$i<=3;$i++){
		if($i>1){
			$objPHPExcel->createSheet();//创建新的内置表
		}
		$objPHPExcel->setActiveSheetIndex($i-1);//把新创建的sheet设定为当前活动sheet */
		$objSheet=$objPHPExcel->getActiveSheet();//获取当前活动sheet
		$objSheet->setTitle("处方");//给当前活动sheet起个名称
		$data=$db->getAllRecipe();//查询每个年级的学生数据
		$objSheet->setCellValue("A1","序列")->setCellValue("B1","疾病")->setCellValue("C1","处方方案")->setCellValue("D1","处方类型");//填充数据
		$j=2;
		foreach($data as $key=>$val){
				$objSheet->setCellValue("A".$j,$val['rid'])->setCellValue("B".$j,$val['dname'])->setCellValue("C".$j,$val['recipe'])->setCellValue("D".$j,$val['TYPE']);
				$j++;
		}
	$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');//生成excel文件
	//$objWriter->save($dir."/export_1.xls");//保存文件
	browser_export('Excel5','browser_excel03.xls');//输出到浏览器
	$objWriter->save("php://output");


	function browser_export($type,$filename){
		if($type=="Excel5"){
				header('Content-Type: application/vnd.ms-excel');//告诉浏览器将要输出excel03文件
		}else{
				header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');//告诉浏览器数据excel07文件
		}
		header('Content-Disposition: attachment;filename="'.$filename.'"');//告诉浏览器将输出文件的名称
		header('Cache-Control: max-age=0');//禁止缓存
	}

?>