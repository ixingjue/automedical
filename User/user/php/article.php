<html>
<head>
<title>今日推荐</title>
<link rel="stylesheet" href="../css/article.css">
</head>
<body>
<div class="bg">
<div class="showNews">
<?php
require_once '../../configs/configs.php';
$id = isset($_GET['id'])? $_GET['id'] : 0;
mysql_query('SET NAMES UTF8')or die('字符集设置错误');
$sql ="select * from article where id='".$id."'";
$paper=mysql_query($sql);
while($rs=mysql_fetch_array($paper)){
	// echo "<div class='top'></div>";
	?>
	<span class="Title">
	<?php
	echo $rs['title'];
	echo "<br/>";
	?>
	</span>
	<span class="Author">
	<?php
	echo $rs['author'];
	echo "<br/>";
	?>
	</span>
	<span class="Content">
	<?php
    echo $rs['content'];
	?>
	</span>
	<?php
}
?>
</div>
</div>
</body>
</html>
