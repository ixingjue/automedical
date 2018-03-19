<?php
session_start();
require 'lib/Readability.inc.php';
require 'lib/simple_html_dom.php';
require 'lib/url.class.php';
header("Content-type: text/html; charset=utf-8");
$url=$_REQUEST['myurl'];
//$url_array = explode(' ',trim($url));
$j=1;
foreach ($url as $e) {
    show($j,$e);
    $j++;
}
exit;
function show($i,$url_array){
        $result=begin($url_array);
        //加入session
        $_SESSION['title']=$result['title'];
        $_SESSION['time']=$result['time'];
        //去除HTML标签和空白
        $subject = strip_tags($result['content']);//去除html标签
        $pattern = '/\s/';//去除空白
        $content = preg_replace($pattern, '', $subject);
        $_SESSION['content'] = mb_substr($content, 0,100000);//截取3000个汉字
        //$_SESSION['content']=strip_tags($result['content']);//去除HTML标签
        echo '<table style="text-align:center;" border="1" cellpadding="0" cellspacing="0"width="80%">';
        echo '<tr><td style="width:8%"">链接'.$i.'<td/><td>'.$result['title'].'&nbsp;&nbsp;&nbsp;<input type="button" id="show_'.$i.'"  value="预览" onclick="showHint(this.id)"><input type="button" id="close_'.$i.'"  value="关闭" style="display:none;" onclick="closeHint(this.id)">&nbsp;<input type="button" id="insert" value="植入" onclick="addMysql(this.id)"><td/></tr><br>';
        echo '</table>';    
        echo '<div id="'.$i.'" style="display:none">';
        echo '<table style="text-align:center;" border="1" cellpadding="0" cellspacing="0"width="80%">';
        echo '<tr><td style="width:8%"">标题<td/><td>'.$result['title'].'<td/></tr><br>';
        echo '<tr><td style="width:8%"">时间<td/><td>'.$result['time'].'<td/></tr><br>';
        echo '<tr><td style="width:8%"">内容<td/><td>'.$result['content'].'<td/></tr><br></div>';
        echo '</table>';
        echo '</div>';
        echo '</br>';
        echo '
            <script>
  function showHint(id){
       
    var str= id.substr(5,10);       
    document.getElementById(str).style.display="";//显示 
     document.getElementById("show_"+str).style.display="none";  
     document.getElementById("close_"+str).style.display="";        
            
	  }
function closeHint(id){
           
    var str= id.substr(6,10);
            
     document.getElementById(str).style.display="none";//显示       
            document.getElementById("show_"+str).style.display="";  
     document.getElementById("close_"+str).style.display="none";  
            
	  }
	  function addMysql(id) {
            window.location="addMysql.php?id="+id;
	  }
</script>';
    
}

   function begin($url){
       $html=new UrlJx($url);
       $Readability= new Readability($html->zh_html,"utf-8"); // default charset is utf-8
       $Data = $Readability->getContent();
       $Data['time']=$html->time;
       return $Data;
   }
?>
