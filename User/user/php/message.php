<meta charset='UTF-8'>
<?php
/* 
* @Author: anchen
* @Date:   2017-05-06 20:33:34
* @Last Modified by:   anchen
* @Last Modified time: 2017-05-07 18:26:03
*/
require_once '../../configs/configs.php';
 if(isset($_POST['submit'])){
 if(isset($_SESSION['uname'])&&!empty($_SESSION['uname'])){
     $uid=$_SESSION['uid'];
 $user=$_POST['user'];
 $title=$_POST['title'];
 $content=$_POST['content'];
 $sql="insert into message(id,user,title,content,lastdate)values('$uid','$user','$title','$content',now())";
 mysql_query($sql);
 echo "<script>alert('发布成功');parent.location.reload(); </script>";}
}
?>

<html>
<head>
<script>
function CheckPost()
{
 if(myform.title.value.length<1)
 {
  alert("标题不能为空！");
  myform.title.focus();//光标聚焦
  return false;
 }
  if(myform.content.value.length<1)
 {
  alert("内容不能为空！");
  myform.content.focus();
  return false;
 }
}
</script>
</head>
<body style="margin-left: 200px;margin-top: 20px;">
<form action="message.php" method="post" name="myform" onsubmit="return CheckPost();">
<p>用户：<input type="text"  size="15" name="user"  placeholder="请输入用户名" style="font-size: 15px" value="<?php echo $_SESSION['uname'];?>" readonly="true"/><br/></p>
<p>病症：<input type="text" name="title"  placeholder="请输入要反馈的病症" style="font-size: 15px" /><br/></p>
<p>内容：<textarea name="content" size="15" id="mcontent" cols="60"  rows="9" placeholder="（不超过200字）"></textarea><br/></p>
<input type="submit" id="msubmit" name="submit" style="font-size: 16px;background-color:  #78cdd1;" value="反馈"/>
</form>
</body>
</html>