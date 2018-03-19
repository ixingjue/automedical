<?php
//��ָ��Ŀ¼,����������������
function readDirectory($path) {
	$handle = opendir ( $path );
	while ( ($item = readdir ( $handle )) !== false ) {
		//.��..��2������Ŀ¼
		if ($item != "." && $item != "..") {
			if (is_file ( $path . "/" . $item )) {
				$arr ['file'] [] = $item;
			}
			if (is_dir ( $path . "/" . $item )) {
				$arr ['dir'] [] = $item;
			}
		
		}
	}
	closedir ( $handle );
	return $arr;
}
//$path="file";
//print_r(readDirectory($path));

/**
 * �õ��ļ��д�С
 * @param string $path
 * @return int 
 */
function dirSize($path){
	$sum=0;
	global $sum;
	$handle=opendir($path);
	while(($item=readdir($handle))!==false){
		if($item!="."&&$item!=".."){
			if(is_file($path."/".$item)){
				$sum+=filesize($path."/".$item);
			}
			if(is_dir($path."/".$item)){
				$func=__FUNCTION__;
				$func($path."/".$item);
			}
		}
		
	}
	closedir($handle);
	return $sum;
}
//$path="file";
//echo dirSize($path);


/**
 * �����ļ���
 * @param string $filename
 * @return string
 */
function createFolder($dirname){
	//����ļ������ƵĺϷ���
	if(checkFilename(basename($dirname))){
		//��ǰĿ¼���Ƿ����ͬ���ļ�������
		if(!file_exists($dirname)){
			if(mkdir($dirname,0777,true)){
				$mes="�ļ��д����ɹ�";
			}else{
				$mes="�ļ��д���ʧ��";
			}
		}else{
			$mes="������ͬ�ļ�������";
		}
	}else{
		$mes="�Ƿ��ļ�������";
	}
	return $mes;
}


/**
 * �����ļ���
 * @param string $filename
 * @return string
 */
function copyFolder($src,$dst){
	//echo $src,"---",$dst."----";
	if(!file_exists($dst)){
		mkdir($dst,0777,true);
	}
	$handle=opendir($src);
	while(($item=readdir($handle))!==false){
		if($item!="."&&$item!=".."){
			if(is_file($src."/".$item)){
				copy($src."/".$item,$dst."/".$item);
			}
			if(is_dir($src."/".$item)){
				$func=__FUNCTION__;
				$func($src."/".$item,$dst."/".$item);
			}
		}
	}
	closedir($handle);
	return "���Ƴɹ�";
	
}

/**
 * �������ļ���
 * @param string $oldname
 * @param string $newname
 * @return string
 */
function renameFolder($oldname,$newname){
	//����ļ������ƵĺϷ���
	if(checkFilename(basename($newname))){
		//��⵱ǰĿ¼���Ƿ����ͬ���ļ�������
		if(!file_exists($newname)){
			if(rename($oldname,$newname)){
				$mes="�������ɹ�";
			}else{
				$mes="������ʧ��";
			}
		}else{
			$mes="����ͬ���ļ���";
		}
	}else{
		$mes="�Ƿ��ļ�������";
	}
	return $mes;
}
/**
 * �����ļ���
 * @param string $src
 * @param string $dst
 * @return string
 */
function cutFolder($src,$dst){
	//echo $src,"--",$dst;
	if(file_exists($dst)){
		if(is_dir($dst)){
			if(!file_exists($dst."/".basename($src))){
				if(rename($src,$dst."/".basename($src))){
					$mes="���гɹ�";
				}else{
					$mes="����ʧ��";
				}
			}else{
				$mes="����ͬ���ļ���";
			}
		}else{
			$mes="����һ���ļ���";
		}
	}else{
		$mes="Ŀ���ļ��в�����";
	}
	return $mes;
}
/**
 * ɾ���ļ���
 * @param string $path
 * @return string
 */
function delFolder($path){
	$handle=opendir($path);
	while(($item=readdir($handle))!==false){
		if($item!="."&&$item!=".."){
			if(is_file($path."/".$item)){
				unlink($path."/".$item);//ɾ���ļ���
			}
			if(is_dir($path."/".$item)){
				$func=__FUNCTION__;//�ݹ����
				$func($path."/".$item);
			}
		}
	}
	closedir($handle);
	rmdir($path);//ɾ����Ŀ¼�ļ�
	return "�ļ���ɾ���ɹ�";
}


?>