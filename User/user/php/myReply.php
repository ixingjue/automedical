<?php
 require_once '../../configs/configs.php';
 $id_1=$_REQUEST['rid'];
 $sql="select * from reply where rid ='{$id_1}'";
 $result=mysql_query($sql);
 $row=mysql_fetch_assoc($result);
?>
<!DOCTYPE HTML>
<html>
   <head>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       <link rel="stylesheet" href="../css/messageCenter.css">
   </head> 
   <body>
<form>
<p>反馈的病症：<input type="text" name="title" value="<?php echo $row['title'];?>" readonly="true" style="font-size: 15px" /><br/></p>
<p>回复消息:</p>
<textarea name="content" class="content_reply" readonly="true" style="font-size: 15px" id="mcontent" cols="50"  rows="9"><?php echo $row['content'];?></textarea><br/>
</form>
 </body>
</html>
