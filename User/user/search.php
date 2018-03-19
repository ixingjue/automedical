<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
require_once '../configs/configs.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Healer自动处方</title>
        <link href="./css/bootstrap.css" rel='stylesheet' type='text/css' />
        <script src="./js/jquery.min.js"></script>
        <!-- Custom Theme files -->
        <link href="./css/style.css" rel='stylesheet' type='text/css' />
        <!-- Custom Theme files -->
		 <script src="clienthint.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="application/x-javascript">
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
		</script>
        <!---- start-smoth-scrolling---->    
		<!--<script src="../ajax_search/clienthint.js"></script>-->		
        <script type="text/javascript">
                                jQuery(document).ready(function($) {
                                $(".scroll").click(function(event){
                                event.preventDefault();
                                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                                });
                                });
        </script>
        <!---- start-smoth-scrolling---->
            </head>
            <body>
                <!----- start-header---->
                <div id="home" class="header">
                    <div class="top-header">
                        <div class="container">
                            <div class="logo">
                                <a href="#"><img src="./images/logo.png" title="healer" /></a>
                            </div>
                            <!----start-top-nav---->
                            <nav class="top-nav">
                                <ul class="top-nav">
                                    <li class="active"><a href="#home" class="scroll">首页 </a></li>
                                    <li><a href="#search-container" class="scroll">搜索</a></li>
                                    <li><a href="./php/personalCenter.php" class="prsonnal" hidefocus="true" target="_blank" >个人中心</a></li>
									<li><a href="./php/message_a.php" class="message_a" hidefocus="true" target="_blank">留言板</a></li>
                                    <li><a href="./php/register.php" class="notlogin_reg" hidefocus="true" target="_blank" >注册 &nbsp;</a></li>
                                    <li><a href="./php/login.php" class="login_login" hidefocus="true" target="_blank" >登录</a></li>
                                    <li><a href="../../Admin/Admin/login.php" class="login_login" hidefocus="true" target="_blank" >后台登录</a></li>

                                </ul>
                                <a href="#" id="pull"><img src="./images/menu-icon.png" title="menu" /></a>
                            </nav>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
                <!----- //End-header---->
				
                <!----start-slider-script---->
                <script src="./js/responsiveslides.min.js"></script>
                <script>
                                                               
                                                                $(function () {                                                 
                                                                $("#slider4").responsiveSlides({
                                                                auto: true,
                                                                pager: true,
                                                                nav: true,
                                                                speed: 500,
                                                                namespace: "callbacks",
                                                                before: function () {
                                                                $('.events').append("<li>before event fired.</li>");
                                                                },
                                                                after: function () {
                                                                $('.events').append("<li>after event fired.</li>");
                                                                }
                                                                });
                                                                });
                </script>
                <!----//End-slider-script---->
                <!-- Slideshow 4 -->
                <div  id="top" class="callbacks_container">
                    <ul class="rslides" id="slider4">
                        <li>
                            <img src="./images/slide1.jpg" alt="">

                        </li>
                        <li>
                            <img src="./images/slide1.jpg" alt="">

                        </li>
                        <li>
                            <img src="./images/slide1.jpg" alt="">

                        </li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
                <!----- //End-slider---->
                <!---- start-search ---->
                <span id="search-container" name="search-container"></span>
                <div class="search-container" >
                    <div class="search-header ">
                        <h2>搜索处方</h2>
                        <p>基于大数据的搜索，寻找你想要的处方</p>
						</div>
                    <div class="tag"></div>
                     <div class="news">
					 <div id="Recommended-daily">			
								<h3>今日推荐</h3>
								<div id="table-news">								
								<?php
require_once '../configs/configs.php';
$query="SELECT content FROM article";
$result=@mysql_query($query)or die('SQL错误,错误类型'.mysql_error());
mysql_query('SET NAMES UTF8')or die('字符集设置错误');
$sql ="select * from article order by id desc";
$paper=mysql_query($sql);
while($rs=mysql_fetch_array($paper)){
$tvp[]=$rs['id'];
}
		foreach($tvp as $v)
		$offset[]=$v;
		for($t=0;$t<=2;$t++){
		     $sql_1 ="select * from article where id=$offset[$t]";
			 $result=mysql_query($sql_1);
			 $row=mysql_fetch_assoc($result);			
?> 
<span class="Title"><a href="./php/article.php?id=<?php echo $offset[$t]; ?>" target="_blank">
<?php
echo $row["title"];
echo "<br/>";
?>
</a></span>
<span class="show">
<?php
echo $row["description"];
?>
</span>
<?php
}

?> 
								
								</div>
								</div>
								<div id="Medical-knowledge">
								<h3>医学小常识</h3>
								<div id="table-knowledge">
								
								
				<?php
		$tmp=array(); 
		while(count($tmp)<4){ 
		$tmp[]=mt_rand(1,30); 
		$tmp=array_unique($tmp); 
		} 
		foreach($tmp as $v)
		$onset[]=$v;
		for($i=0;$i<=3;$i++){
        $sql="select title,content from knowledge where id=$onset[$i]";//数据库提取数据
        $result=mysql_query($sql);
        $row=mysql_fetch_assoc($result);
		?>
		<span class="Title">
		<?php 
		print_r("*");
        echo $row['title'];
		echo "<br/>";
		?>
		</span>
		<span class="show-s">
		<?php 
		
		echo $row['content'];//输出内容
		echo "<br/>";	
		?>
		</span>
		<?php 
		}
        ?> 

								</div>
								</div>
								</div>
                    <div class="search">
                        <div class="search-input">
                            <form id="search_form" method="get" action="search.php" class="searching-unit" data-regestered="regestered">
							<div id="search">
                                <span>&nbsp;处方个数</span>
                                <select name="t">
                                    <option value="1"> 1</option>
                                    <option value="2"> 2</option>
                                    <option value="3"> 3</option>
                                </select>
                                <input  type="text" id="query"  name="key" class="key" autocomplete="off" placeholder="请输入你要查询的病症" value="<?php echo isset($_GET["key"])?$_GET["key"]:"";?>" >
                                <button id="scbar_btn" type="submit" name="searchsubmit" sc="1" value="true" >搜索</button>
								<div class="show_block">
								<span id="show-ways">
								 <?php								 
								 require_once './au_prescription_1/t.php';
								  echo "<br/>";                                                                                               
								    ?>
								</span>
								</div>							
								</div>
                                <div id="search_auto"></div>																
                            </form>
							<!--<div id="pic">
							<img src="./images/xindiantu.png"></img>
								</div>-->
							</div>	
                        </div>
                    </div>
                </div>
<script>
// $('#search input[name="key"]').keyup(function(){
// $.post('search.php',{'value':$(this).val()},function(data){
// if(data=='0') $('.show_block').html('').css('display','none');
// else $('.show_block').html(data).css('display','block');
// });
// });
</script>				
				
<script>
$(function(){
var url="search_auto.php"
$('#search_auto').css({'width':$('#search input[name="key"]').width()+4});
$('#search input[name="key"]').keyup(function(){
$.post('search_auto.php',{'value':$(this).val()},function(data){
if(data=='0') $('#search_auto').html('').css('display','none');
else $('#search_auto').html(data).css('display','block');
});
});
});
function fill(thisValue) { 
$('#query').val(thisValue); 
// setTimeout("$('#search_auto').hide();", 200);
$('#search_auto').html(data).css('display','block');
$("li").addClass("background-color","grey");
// window.location.href='url#search-container'; 
// document.location.reload();
 // self.location.reload();
}
// function window.onload{
// if(arr=document.cookie.match(/scrollTop=([^;]+)(;|$)/))   
  // document.documentElement.scrollTop=parseInt(arr[1]);   
// }   
// function window.onbeforeunload()
// {   
 // document.cookie="scrollTop="+document.documentElement.scrollTop;   
// } 
</script>

                <div class="bottom">
				<a herf="">首页|</a>
				<a herf="">关于我们|</a>
				<a herf="">遵义医学院大数据中心</a>
                </div>				
            </body>
        </html>