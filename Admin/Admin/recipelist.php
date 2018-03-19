<?php
/*
$pageSize=3;
$rows=getAdminByPage($pageSize);
*/
error_reporting(0);
require_once '../include.php';
$sql="SELECT rid, recipe, dname, TYPE FROM diseasetype JOIN recipe WHERE diseasetype.did = recipe.did";
$totalRows=getResultNum($sql);
$pageSize=5;
$totalPage=ceil($totalRows/$pageSize);
$pageSize=5;
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if ($page<1 || $page==null || !is_numeric($page)){
     $page=1;
}
if ($page>=$totalPage) $page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="SELECT rid, recipe, dname, TYPE FROM diseasetype JOIN recipe WHERE diseasetype.did = recipe.did  limit {$offset},{$pageSize}";
$rows=fetchAll($sql);
if(!$rows){
	alertMes("sorry,没有处方!","recipelist.php");
	exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="styles/backstage.css">
<script type="text/javascript">

	function Addrecipe(){
		window.location="recipeAdd.php";
	}
	function editAdmin(id){
			window.location="editAdmin.php?id="+id;
	}
	function show1(){
	   document.getElementById("show1").style.display="block";
	}
	function show2(){
	   document.getElementById("show2").style.display="block";
	}
	function daochu(){
	     window.location="export.php";
	}
</script>
</head>

<body>
<div class="details">

                            <input type="button" value="批量导入处方数据" class="recipeadd"  onclick="show1()">
							<input type="button" value="批量导入疾病数据" class="diseaseadd" onClick="show2()">
							<input type="button" value="导出xls表格" class="daochu" onclick="daochu()">
                            <form name="frm1" enctype="multipart/form-data" action="insertrdb.php" method="post" >
                                 <div id="show1" style="display:none">
                                        <input name="filename" type="file" class="file1"/>
                                        <input name="submit" type="submit" value="上传" class="shangchuan" />
                                 </div>
                            </form>
                            <form name="frm2" enctype="multipart/form-data" action="insertddb.php" method="post" >
                                 <div id="show2" style="display:none">
                                        <input name="filename" type="file" class="file2" />
                                        <input name="submit" type="submit" value="上传" class="shangchuan" />
                                 </div>
                            </form>

                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th >编号</th>
                                <th width="140px">疾病</th>
								 <th >处方方案</th>
								<th >疾病类型</th>
                                <th >操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($rows as $row):?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $row['rid'];?></label></td>
                                <td><?php echo $row['dname'];?></td>
                                <td><?php echo $row['recipe'];?></td>
								<td><?php echo $row['TYPE'];?></td>
                                <td align="center"><input type="button" value="修改" class="btn" onclick="editrecipelist(<?php echo $row['rid'];?>)"></td>
                            </tr>
                            <?php endforeach;?>
                            <?php if ($totalRows>$pageSize):?>
                            <tr>
                                <td colspan="5"><?php echo showPage($page,$totalPage);?> </td>
                            </tr>
                        <?php endif;?>
                        </tbody>
                    </table>
                </div>
</body>
<script type="text/javascript">
    function editrecipelist(rid) {
        window.location="editrecipelist.php?rid="+rid;
    }

</script>

</html>