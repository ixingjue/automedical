<?php 
/**
 * 添加药品
 * @return string
 */
function addPro(){
	$arr=$_POST;
	$arr['pubTime']=time();
	$path="./uploads";
	$uploadFiles=uploadFile($path);
	if(is_array($uploadFiles)&&$uploadFiles){
		foreach($uploadFiles as $key=>$uploadFile){
			thumb($path."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
			thumb($path."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
			thumb($path."/".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350);
			thumb($path."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);
		}
	}
	$res=insert("izmu_pro",$arr);
	$pid=getInsertId();
	if($res&&$pid){
		foreach($uploadFiles as $uploadFile){
			$arr1['pid']=$pid;
			$arr1['albumPath']=$uploadFile['name'];
			addAlbum($arr1);
		}
		$mes="<p>添加成功!</p><a href='addPro.php' target='mainFrame'>继续添加</a>|<a href='listPro.php' target='mainFrame'>查看药品列表</a>";
	}else{
		foreach($uploadFiles as $uploadFile){
			if(file_exists("../image_800/".$uploadFile['name'])){
				unlink("../image_800/".$uploadFile['name']);
			}
			if(file_exists("../image_50/".$uploadFile['name'])){
				unlink("../image_50/".$uploadFile['name']);
			}
			if(file_exists("../image_220/".$uploadFile['name'])){
				unlink("../image_220/".$uploadFile['name']);
			}
			if(file_exists("../image_350/".$uploadFile['name'])){
				unlink("../image_350/".$uploadFile['name']);
			}
		}
		$mes="<p>添加失败!</p><a href='addPro.php' target='mainFrame'>重新添加</a>";
		
	}
	return $mes;
}
/**
 *编辑药品
 * @param int $id
 * @return string
 */
function editPro($id){
	$arr=$_POST;
	$path="./uploads";
	$uploadFiles=uploadFile($path);
	if(is_array($uploadFiles)&&$uploadFiles){
		foreach($uploadFiles as $key=>$uploadFile){
			thumb($path."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
			thumb($path."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
			thumb($path."/".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350);
			thumb($path."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);
		}
	}
	$where="id={$id}";
	$res=update("izmu_pro",$arr,$where);
	$pid=$id;
	if($res&&$pid){
		if($uploadFiles &&is_array($uploadFiles)){
			foreach($uploadFiles as $uploadFile){
				$arr1['pid']=$pid;
				$arr1['albumPath']=$uploadFile['name'];
				addAlbum($arr1);
			}
		}
		$mes="<p>编辑成功!</p><a href='listPro.php' target='mainFrame'>查看药品列表</a>";
	}else{
	if(is_array($uploadFiles)&&$uploadFiles){
		foreach($uploadFiles as $uploadFile){
			if(file_exists("../image_800/".$uploadFile['name'])){
				unlink("../image_800/".$uploadFile['name']);
			}
			if(file_exists("../image_50/".$uploadFile['name'])){
				unlink("../image_50/".$uploadFile['name']);
			}
			if(file_exists("../image_220/".$uploadFile['name'])){
				unlink("../image_220/".$uploadFile['name']);
			}
			if(file_exists("../image_350/".$uploadFile['name'])){
				unlink("../image_350/".$uploadFile['name']);
			}
		}
	}
		$mes="<p>编辑失败!</p><a href='listPro.php' target='mainFrame'>重新编辑</a>";
		
	}
	return $mes;
}

function delPro($id){
	$where="id=$id";
	$res=delete("izmu_pro",$where);
	$proImgs=getAllImgByProId($id);
	if($proImgs&&is_array($proImgs)){
		foreach($proImgs as $proImg){
			if(file_exists("uploads/".$proImg['albumPath'])){
				unlink("uploads/".$proImg['albumPath']);
			}
			if(file_exists("../image_50/".$proImg['albumPath'])){
				unlink("../image_50/".$proImg['albumPath']);
			}
			if(file_exists("../image_220/".$proImg['albumPath'])){
				unlink("../image_220/".$proImg['albumPath']);
			}
			if(file_exists("../image_350/".$proImg['albumPath'])){
				unlink("../image_350/".$proImg['albumPath']);
			}
			if(file_exists("../image_800/".$proImg['albumPath'])){
				unlink("../image_800/".$proImg['albumPath']);
			}
			
		}
	}
	$where1="pid={$id}";
	$res1=delete("izmu_album",$where1);
	if($res&&$res1){
		$mes="删除成功!<br/><a href='listPro.php' target='mainFrame'>查看药品列表</a>";
	}else{
		$mes="删除失败!<br/><a href='listPro.php' target='mainFrame'>重新删除</a>";
	}
	return $mes;
}


/**
 * 得到药品的所有信息
 * @return array
 */
function getAllProByAdmin(){
	$sql="select p.id,p.pName,p.mPrice,p.pDesc,p.pubTime,c.type from izmu_pro as p join izmu_cate c on p.cId=c.id";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 *根据药品id得到药品图片
 * @param int $id
 * @return array
 */
function getAllImgByProId($id){
	$sql="select a.albumPath from izmu_album a where pid={$id}";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 * 根据id得到药品的详细信息
 * @param int $id
 * @return array
 */
function getProById($id){
		$sql="select p.id,p.pName,p.mPrice,p.pDesc,p.pubTime,c.type,p.cId from izmu_pro as p join izmu_cate c on p.cId=c.id where p.id={$id}";
		$row=fetchOne($sql);
		return $row;
}
/**
 * 检查分类下是否有药品
 * @param int $cid
 * @return array
 */
function checkProExist($cid){
	$sql="select * from izmu_pro where cId={$cid}";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 * 得到所有药品
 * @return array
 */
function getAllPros(){
	$sql="select p.id,p.pName,p.mPrice,p.pDesc,p.pubTime,c.type,p.cId from izmu_pro as p join izmu_cate c on p.cId=c.id ";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 *根据cid得到4条药品
 * @param int $cid
 * @return Array
 */
function getProsByCid($cid){
	$sql="select p.id,p.pName,p.mPrice,p.pDesc,p.pubTime,c.type,p.cId from izmu_pro as p join izmu_cate c on p.cId=c.id where p.cId={$cid} limit 4";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 * 得到下4条药品
 * @param int $cid
 * @return array
 */
function getSmallProsByCid($cid){
	$sql="select p.id,p.pName,p.mPrice,p.pDesc,p.pubTime,c.type,p.cId from izmu_pro as p join izmu_cate c on p.cId=c.id where p.cId={$cid} limit 4,4";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 *得到药品ID和药品名称
 * @return array
 */
function getProInfo(){
	$sql="select id,pName from izmu_pro order by id asc";
	$rows=fetchAll($sql);
	return $rows;
}
/*
 * 修改处方
 */
function editrecipelist($did,$rid)
{
    //有点复杂，没得写完7.9还有bug
    $recipe = $_POST['recipe'];
    $type = $_POST['cid'];
    //var_dump($type);
    $sql_1 = "update diseasetype set type='{$type}' where did='{$did}'";
    $sql_2 = "update recipe set recipe='{$recipe}',did='{$type}' where rid='{$rid}'";
    if (mysql_query($sql_1) && mysql_query($sql_2)) {
        $mes="处方修改成功!<br/><a href='recipelist.php'>查看处方</a>";
    }
    else {
        $mes="处方修改失败!<br/><a href='editrecipelist.php'>继续编辑</a>";
    }
    return $mes;

}
/*
 * 修改阈值
 */
function editYuzhi(){
    $did=$_POST['did'];
    $yuzhi=$_POST['yuzhi'];
    $sql="update diseasetype set yz='{$yuzhi}' where did='{$did}'";
    if (mysql_query($sql)) {
        $mes = "修改成功!<br/><a href='editYuzhi.php'>继续修改</a>";
    } else {
        $mes = "修改失败!<br/><a href='editYuzhi.php'>请重新操作</a>";
    }
    return $mes;
}
