<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>留言板</title>
	<link href="../css/index.css" rel="stylesheet">
    <script src="../js/jquery-1.8.3.js"></script>
    <script src="../js/index.js"></script>
</head>
<body>
<div>
<div id="msgBox">
	<!-- 上部开始 -->
		<div id="top">
			<p id="lai">来,说说你的想法</p>
			<form action="javascript:;">
			<!-- 昵称和头像开始 -->
				<div id="face">
					<input type="text" placeholder="请输入您的昵称" id="shu">
					<img src="../images/img/face.gif" alt="" class="in">
					<img src="../images/img/face1.gif" alt="" class="in">
					<img src="../images/img/face2.gif" alt="" class="in">
					<img src="../images/img/face3.gif" alt="" class="in">
					<img src="../images/img/face4.gif" alt="" class="in">
					<img src="../images/img/face5.gif" alt="" class="in">
					<img src="../images/img/face6.gif" alt="" class="in">
					<img src="../images/img/face7.gif" alt="" class="in">
					<img src="../images/img/face8.gif" alt="" class="in">
				</div>
			<!-- 昵称和头像结束 -->
			<!-- 多行文本开始 -->
				<div id="area"><textarea rows="6" cols="65" id="chatText" placeholder="请输入您的想法"></textarea>
            	</div>
		<!-- 多行文本结束 -->
			<!-- 提交开始 -->
				<div id="btntext">
			 	   <span>还能输入<strong id="maxNum">140</strong></span><span>个字</span>
			 	   <input type="button" value="" title="快捷键 Ctrl+Enter" id="btg">
			 	</div>
			<!-- 提交结束 -->
			</form>
		</div>
	<!-- 上部结束 -->
		<div id="list">
			<!-- 大家在说开始 -->
			<div id="t">
			<span>大家在说</span>
			</div>
			<!-- 大家在说结束 -->
			<!-- 对话列表开始 -->
			<ul>
				<li>
					<div class="userPic">
						<img src="../images/img/face.gif" alt=""/>
					</div>
                	<div class="content">
                    	<div class="userName" >
                    		<a href="javascript:;">永不上线</a>:
                    		<span class="msgInfo">多喝水有利于身体健康</span>
                    	</div>
                    	<div class="times">
                    		<span>07月05日 15：14</span>
                    		<div class="kong"></div>
                        	
                    	</div>
                	</div>
                </li>
                <li>
					<div class="userPic"><img src="../images/img/face.gif" alt=""/></div>
                	<div class="content">
                    	<div class="userName" ><a href="javascript:;">永不上线</a>:高血压平时怎么注意饮食？</div>
 
                    	<div class="times">
                    		<span>07月05日 15：14</span>
                    		<div class="kong"></div>
                        	
                        </div>
                    
                	</div>
                </li>
            </ul>
			<!-- 对话列表结束 -->
		</div>
		
	</div>
</div>
</body>
</html>