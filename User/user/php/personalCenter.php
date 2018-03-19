<?php
 require_once '../../configs/configs.php';
if (isset($_SESSION['uname']) && !empty($_SESSION['uname'])) {
	
}else{
	echo "<script>alert('你还没有登录');location.href='login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>个人中心</title>
        <link rel="stylesheet" href="../css/personalCenter.css">
    </head>
    <body>
        <div class="header">
			<div class="logo">
			<img id="logo"   src="../images/logo2.png" alt="" >
			</div>
			<div class="top-nav">
			<ul>
			<li style="list-style:none;"><a hidefocus="true" >
			<?php 
			if(isset($_SESSION['uname']))
			{  echo $_SESSION['uname'];
		}
		?>
		</a></li>                                             
           <li style="list-style:none;"><a href="../index_1.php" class="out" hidefocus="true" onClick="javascript:window.opener=null;window.close()";>退出 </a></li>
		   </ul>
		  </div>
        </div>
        <div class="container">
            <div class="personal">
                <div class="inside-personal">
                    <table id="mes">
                        <tr width="100%" align="left"><td class="c1" ><i aria-hidden="true"></i><img src="../images/geren.png" alt=""><a  href="personInfo.php" target="mainFrame">&nbsp;基本信息</a> </td></tr>
					    <tr width="100%" align="left"><td class="c1" ><i aria-hidden="true"></i><img src="../images/key.png" alt=""><a  href="key.php" target="mainFrame">&nbsp;密码修改</a> </td></tr>
                        <tr width="100%" align="left"><td class="c1"><i  aria-hidden="true"></i><img src="../images/search.png" alt=""><a href="personalFile.php" target="mainFrame">&nbsp;个人档案</a></td></tr>
                        <tr width="100%" align="left"><td class="c1"><i  aria-hidden="true"></i><img src="../images/message.png" alt=""><a   href="message.php"  target="mainFrame">&nbsp;处方反馈</a></td></tr>
                        <tr width="100%" align="left"><td class="c1"><i  aria-hidden="true"></i><img src="../images/news.png" alt=""><a   href="messageCenter.php"  target="mainFrame">&nbsp;消息中心</a></td></tr>
                    </table>
                </div>
            </div>
            <div class="including">
            <iframe src="personInfo.php" frameborder="0" name="mainFrame" scrolling="no" width="100%" height="100%"></iframe>
        </div>
		<div class="bottom">
		    <iframe name="weather_inc" src="http://i.tianqi.com/index.php?c=code&id=1"  style="text-align: left" width="300" height="30" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" ></iframe>
		</div>
        </div>
    </body>
</html>



