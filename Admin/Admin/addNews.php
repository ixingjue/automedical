<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>添加文章</title>
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
<h3>添加文章</h3>
<form action="article.add.handle.php" method="post">
    <table width="100%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
        <tr>
            <td colspan="2" align="center">发布文章</td>
        </tr>
        <tr>
            <td width="119">标题</td>
            <td width="625"><label for="title"></label>
                <input type="text" name="title" id="title" /></td>
        </tr>
        <tr>
            <td>作者</td>
            <td><input type="text" name="author" id="author" /></td>
        </tr>
        <tr>
            <td>简介</td>
            <td><label for="description"></label>
                <textarea name="description" id="description" cols="120" rows="4"></textarea></td>
        </tr>
        <tr>
            <td>内容</td>
            <td><textarea id="editor_id" name="content" cols="120" rows="14" id="content"></textarea></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="button" id="button" value="提交" /></td>
        </tr>
    </table>
</form>
</body>
</html>