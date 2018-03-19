<!DOCTYPE html>
<html>
<head>
<meta  charset="UTF-8">
<script type="text/javascript" src="jquery-2.1.1.min.js"></script>
<title>Insert title here</title>
</head>
<body style="width:800px;margin:auto">
<form style="margin-top:200px" action="my.php" method="post">
    <div id="first"><span>请输入URL地址:<br/></span><input type="text" name="myurl[]" size="100"/><input type="button" id="j" name="jia" value="+"/></div>
    <div id="middle"></div>
     <input type="submit" value="解析" />
</form>
  
<script>
$(document).ready(function(){
	
	var i=1;
	   $("#j").click(function(){ 
		   
		   var s='<div><input type="text" id="jian'+i+'" name="myurl[]" size="100"/><input type="button" id="jian'+i+'" value="-" onclick="showHint(this.id)"/></br></div>';
			 //减号的方法
		   $("#middle").append(s);
		    i++; 
		   }); 	


	   
	   
});
       //减号的方法
	function showHint(id){
		   $("#"+id).parent().remove();
		   }

	




	   
</script>
</body>
</html>