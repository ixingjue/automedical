<?php
/**
 * Created by PhpStorm.
 * User: IT-XIA-PC
 * Date: 2017/3/25
 * Time: 11:16
 */
require_once ('../include.php');
//读取旧消息
$id=$_GET['id'];
$query=mysql_query("select * from article where id=$id");
//print_r($query);
$data=mysql_fetch_assoc($query);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <script type="text/javascript" charset="utf-8" src="../plugins/kindeditor/kindeditor.js"></script>
    <script type="text/javascript" charset="utf-8" src="../plugins/kindeditor/lang/zh_CN.js"></script>
    <script type="text/javascript" src="./scripts/jquery-1.6.4.js"></script>
    <script>
        KindEditor.ready(function(K) {
            window.editor = K.create('#editor_id');
        });
        $(document).ready(function(){
            $("#selectFileBtn").click(function(){
                $fileField = $('<input type="file" name="thumbs[]"/>');
                $fileField.hide();
                $("#attachList").append($fileField);
                $fileField.trigger("click");
                $fileField.change(function(){
                    $path = $(this).val();
                    $filename = $path.substring($path.lastIndexOf("\\")+1);
                    $attachItem = $('<div class="attachItem"><div class="left">a.gif</div><div class="right"><a href="#" title="删除附件">删除</a></div></div>');
                    $attachItem.find(".left").html($filename);
                    $("#attachList").append($attachItem);
                });
            });
            $("#attachList>.attachItem").find('a').live('click',function(obj,i){
                $(this).parents('.attachItem').prev('input').remove();
                $(this).parents('.attachItem').remove();
            });
        });
    </script>
</head>

<body>
<h3>修改文章</h3>
<form action="article.modify.handle.php" method="post">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
    <table width="100%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
                    <tr>
                        <td colspan="2" align="center">修改文章</td>
                    </tr>
                    <tr>
                        <td width="119">标题</td>
                        <td width="437"><label for="title"></label>
                            <input type="text" name="title" id="title" value="<?php echo $data['title'];?>"/></td>
                    </tr>
                    <tr>
                        <td>作者</td>
                        <td><input type="text" name="author" id="author"  value="<?php echo $data['author'];?>"/></td>
                    </tr>
                    <tr>
                        <td>简介</td>
                        <td><label for="description"></label>
                            <textarea name="description" id="description" cols="120" rows="4"><?php echo $data['description'];?></textarea></td>
                    </tr>
                    <tr>
                        <td>内容</td>
                        <td><textarea name="content" id="editor_id" cols="120" rows="14" id="content"><?php echo $data['content'];?></textarea></td>
                    </tr>
                    <tr >
                        <td colspan="2" align="center"><input type="submit" name="back" id="back" value="返回" onclick="javascript:history.go(-1);" /> <input type="submit" name="button" id="button" value="提交" /></td>

                    </tr>
</table>
</form>
</body>
</html>

