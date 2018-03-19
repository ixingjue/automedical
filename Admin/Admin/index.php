<?php
//获取页面开始时间
//$start = date('y-m-d h:i:s',time());
require_once '../include.php';
checkLogined();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>健康大数据中心欢迎您</title>
<link rel="stylesheet" href="styles/backstage.css">
</head>

<body>
    <div class="head">
            <div class="logo fl"><a href="#"></a></div>
            <h3 class="head_text fr">自动药物系统后台管理</h3>
    </div>

    <!--旁边框加入分享 -->
    <div class="side-bar">
        <a href="http://wpa.qq.com/msgrd?v=3&uin=826739558&site=qq&menu=yes" class="icon-qq" title="向作者发起会话">向作者发起会话</a>
        <a href="#" class="icon-chat" title="联系作者">微信<div class="chat-tips"><i></i>
                <img style="width:138px;height:138px;" src="./images/wechat.jpg" alt="扫一扫加我微信"></div></a>
        <a target="_blank" href="#" class="icon-blog" title="关注作者微博">微博</a>
        <a href="mailto:" class="icon-mail" title="给作者发短信联系">mail</a>
    </div>

    <div class="operation_user clearfix">
        <div class="link fr">
            <b>欢迎您
            <?php 
				if(isset($_SESSION['adminName'])){
					echo $_SESSION['adminName'];
				}
				elseif(isset($_COOKIE['adminName'])){
					echo $_COOKIE['adminName'];
				}
            ?>
                <?php
                echo $_SESSION['permission']==0?"管理员":"超级管理员";
                ?>
            </b>&nbsp;&nbsp;&nbsp;<a href="#" class="icon icon_shezhi" onclick="">消息</a><span></span><a href="#" onclick="sAlert('锁屏中 请勿操作!');" class="icon icon_lock">锁屏</a><span></span><a href="index.php" class="icon icon_i">首页</a><span></span><a href="javascript:history.go(1);" class="icon icon_j">前进</a><span></span><a href="javascript:history.go(-1);" class="icon icon_t">后退</a><span></span><a href="javascript:history.go(0);" class="icon icon_n">刷新</a><span></span><a href="doAdminAction.php?act=logout" class="icon icon_e">退出</a>
            </span>
        </div>
    </div>
    <div class="content clearfix">
        <div class="main">
            <!--右侧内容-->
            <div class="cont">
                <div class="title">后台管理</div>
                <!--页脚代码-->
                <div class="footer" >
                    <?php
                    //获取页面加载结束时间
                    //sleep();
                    // $diff = time() - $start;
                    //echo "本次登陆 $diff 秒 ,请继续努力！";
                    //$end=date('y-m-d h:i:s',time());
                    //$diff=$end-$start;
                    //echo $diff;
                    ?>
                    <!--加入天气代码API调用-->
                    <span id="span_dt_dt"></span><script language="javascript">
                        function show_date_time(){
                            window.setTimeout("show_date_time()", 1000);
                            BirthDay=new Date("3/3/2017 14:00:00");//这个日期是可以修改的
                            today=new Date();
                            timeold=(today.getTime()-BirthDay.getTime());
                            sectimeold=timeold/1000;
                            secondsold=Math.floor(sectimeold);
                            msPerDay=24*60*60*1000;
                            e_daysold=timeold/msPerDay;
                            daysold=Math.floor(e_daysold);
                            e_hrsold=(e_daysold-daysold)*24;
                            hrsold=Math.floor(e_hrsold);
                            e_minsold=(e_hrsold-hrsold)*60;
                            minsold=Math.floor((e_hrsold-hrsold)*60);
                            seconds=Math.floor((e_minsold-minsold)*60);
                            span_dt_dt.innerHTML="本网站稳定运行："+daysold+"天"+hrsold+"小时"+minsold+"分"+seconds+"秒";
                        }
                        show_date_time();
                    </script>
                    </p>
                    <br>
                    <!-- 网站运行时间 -->

                </div>

      	 		<!-- 嵌套网页开始 -->
                <iframe src="main.php"  frameborder="0" name="mainFrame" width="100%" height="522"></iframe>
                <!-- 嵌套网页结束 -->
            </div>
        </div>
        <!--左侧列表-->
        <div class="menu">
            <div class="cont">
                <div class="title">管理员</div>
                <ul class="mList">
                    <li>
                        <h3><span onclick="show('menu1','change1')" id="change1">+</span>药品管理</h3>
                        <dl id="menu1" style="display:none;">
                        	<dd><a href="addPro.php" target="mainFrame">添加药品</a></dd>
                            <dd><a href="listPro.php" target="mainFrame">药品列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span onclick="show('menu13','change13')" id="change13">+</span>药品图片管理</h3>
                        <dl id="menu13" style="display:none;">
                            <dd><a href="listProImages.php" target="mainFrame">药品图片列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span onclick="show('menu2','change2')" id="change2">+</span>分类管理</h3>
                        <dl id="menu2" style="display:none;">
                        	<dd><a href="addCate.php" target="mainFrame">添加分类</a></dd>
                            <dd><a href="listCate.php" target="mainFrame">分类列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span onclick="show('menu3','change3')" id="change3">+</span>算法设置</h3>
                        <dl id="menu3" style="display:none;">
                            <dd><a href="editYuzhi.php" target="mainFrame">阈值设置</a>
                        </dl>
                    </li>
                    <li>
                        <h3><span onclick="show('menu4','change4')" id="change4">+</span>用户管理</h3>
                        <dl id="menu4" style="display:none;">
                            <dd><a href="listUser.php" target="mainFrame">用户列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span onclick="show('menu5','change5')" id="change5">+</span>管理员管理</h3>
                        <dl id="menu5" style="display:none;">
                            <dd><a href="addAdmin.php" target="mainFrame">添加管理员</a></dd>
                            <dd><a href="listAdmin.php" target="mainFrame">管理员列表</a></dd>
                        </dl>
                    </li>

                    <li>
                        <h3><span onclick="show('menu6','change6')" id="change6">+</span>意见箱</h3>
                        <dl id="menu6" style="display:none;">
                            <dd><a href="message_list.php" target="mainFrame">留言回复</a></dd>
                            <dd><a href="reply_list.php" target="mainFrame">回复列表</a></dd>
                        </dl>
                    </li>

                    <li>
                        <h3><span onclick="show('menu7','change7')" id="change7">+</span>新闻发布</h3>
                        <dl id="menu7" style="display:none;">
                            <dd><a href="addNews.php" target="mainFrame">文章添加</a></dd>
                            <dd><a href="listNews.php" target="mainFrame">文章管理</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3 ><span onclick="show('menu8','change8')" id="change8">+</span>文件管理</h3>
                        <dl id="menu8" style="display:none;">
                            <dd><a href="../../indexAdmin.php" target="mainFrame">后台文件</a></dd>
                            <dd><a href="../../indexUser.php" target="mainFrame">前台文件</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3 ><span onclick="show('menu9','change9')" id="change9">+</span>处方管理</h3>
                        <dl id="menu9" style="display:none;">
                            <dd><a href="recipelist.php" target="mainFrame">处方列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span onclick="show('menu10','change10')" id="change10">+</span>公告通知</h3>
                        <dl id="menu10" style="display:none;">
                            <dd><a href="../fabu/tongzhi.php" target="mainFrame">用户通知</a></dd>
                            <dd><a href="../fabu/gonggao.php" target="mainFrame">管理员公告</a></dd>
                            <dd><a href="listAdminGonggao.php" target="mainFrame">系统通知</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span onclick="show('menu11','change11')" id="change11">+</span>爬虫技术</h3>
                        <dl id="menu11" style="display:none;">
                            <dd><a href="./crowler/index.php" target="mainFrame">新闻更新</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span onclick="show('menu12','change12')" id="change12">+</span>数据库备份</h3>
                        <dl id="menu12" style="display:none;">
                            <dd><a href="mysqlCopy.php" target="mainFrame">数据库备份</a></dd>
                        </dl>
                    </li>

                </ul>

            </div>
        </div>

    </div>

    <!--监听鼠标和键盘操作是否超时-->
    <script>
        var count = 0;
        var outTime=10;//分钟
        window.setInterval(go, 1000);
        function go() {
            count++;
            if (count == outTime*60) {
                sAlert('锁屏中 请勿操作!');
                //window.onbeforeunload = function(){ return "你要离开么?";}
            }
            return;
        }

        try {
            var x = event.clientX;
            var y = event.clientY;
        } catch (e) {

        }
        //监听鼠标
        document.onmousemove = function () {
            var x1 = event.clientX;
            var y1 = event.clientY;
            if (x != x1 || y != y1) {
                count = 0;
            }
            x = x1;
            y = y1;
        };

        //监听键盘
        document.onkeydown = function () {
            count = 0;
        };


    </script>



    <!--锁屏代码开始 -->
    <script src="./scripts/jquery-3.2.1.js"></script>
    <script src="./scripts/layer/layer.js"></script>
    <script language="javascript">
        function sAlert(str)
        {
            var msgw,msgh,bordercolor;
            msgw=400;//提示窗口的宽度
            msgh=200;//提示窗口的高度
            titleheight=25 //提示窗口标题高度
            bordercolor="#2a2c2e";//提示窗口的边框颜色
            titlecolor="#99CCFF";//提示窗口的标题颜色
            var sWidth,sHeight;
            sWidth=document.body.offsetWidth;//获取窗口宽度
            sHeight=screen.height;//获取屏幕高度
            var bgObj=document.createElement("div");//关键在这里，原理：在body中创建一个div，并将其宽度与高度设置为覆盖整个窗体，如此一来就无法对其它窗口时行操作
            bgObj.setAttribute('id','bgDiv');
            bgObj.style.position="absolute";
            bgObj.style.top="0";
            bgObj.style.background="#777";
            bgObj.style.filter="progid:DXImageTransform.Microsoft.Alpha(style=3,opacity=25,finishOpacity=75";
            bgObj.style.opacity="0.6";
            bgObj.style.left="0";
            bgObj.style.width=sWidth + "px";
            bgObj.style.height=sHeight + "px";
            bgObj.style.zIndex = "10000";
            document.body.appendChild(bgObj);//设置完此div后将其显示出来
            var msgObj=document.createElement('div');//创建一个消息窗口
            msgObj.setAttribute("id","msgDiv");
            msgObj.setAttribute("align","center");
            msgObj.style.background="white";
            msgObj.style.border="1px solid " + bordercolor;
            msgObj.style.position = "absolute";

            msgObj.style.left = "50%";
            msgObj.style.top = "50%";
            msgObj.style.font="12px/1.6em Verdana, Geneva, Arial, Helvetica, sans-serif";
            msgObj.style.marginLeft = "-225px" ;
            msgObj.style.marginTop = -75+document.documentElement.scrollTop+"px";
            msgObj.style.width = msgw+"px";
            msgObj.style.height = msgh+"px";
            msgObj.style.textAlign = "center";
            msgObj.style.lineHeight ="25px";
            msgObj.style.zIndex = "10001";


            // msgObj.input('text');
            //msgObj.innerText;
            //<div >dds</div>
            //document.getElementsByTagName("INPUT")[0].setAttribute("type","text");
            //document.getElementsByTagName("INPUT");
            //msgObj.form.textContent="";
            //var text=document.createElement("form");
            //text.style.input="text";

            var title=document.createElement("h4"); //创建一个标题，以备放置在消息层
            title.setAttribute("id","msgTitle");
            title.setAttribute("align","right");
            title.style.margin="0";
            title.style.padding="3px";
            title.style.background=bordercolor;
            title.style.filter="progid:DXImageTransform.Microsoft.Alpha(startX=20, startY=20, finishX=100, finishY=100,style=1,opacity=75,finishOpacity=100);";
            title.style.opacity="0.75";
            title.style.border="1px solid " + bordercolor;
            title.style.height="18px";
            title.style.font="12px Verdana, Geneva, Arial, Helvetica, sans-serif";
            title.style.color="white";
            title.style.cursor="pointer";
            title.innerHTML="解锁";
            title.onclick=function()
            {
                layer.prompt({
                    formType: 1,
                    value: '',
                    title: '请输入值',
                    area: ['800px', '350px'] //自定义文本域宽高
                }, function(value, index, elem){
                    //alert(value); //得到value
                    var lockPwd=<?php $id = $_SESSION['adminId'];$sql = "select lockPwd from izmu_admin where id='{$id}'";$result = mysql_query($sql);$row = mysql_fetch_assoc($result);echo $row['lockPwd'];?>;

                    if (value==lockPwd) {
                        document.body.removeChild(bgObj);//移除覆盖整个窗口的div层
                        document.getElementById("msgDiv").removeChild(title);//移除标题
                        document.body.removeChild(msgObj);//移除消息层
                    }
                    else
                    {
                        layer.alert("密码输入错误,请重新登陆！");
                        window.location.href="doAdminAction.php?act=logout";
                    }
                    layer.close(index);
                });
                /*
                var psw; //psw变量，用来存储用户输入的密码。
                psw =prompt("请输入解锁口令:");                ;
                if(psw==123456)
                {
                   document.body.removeChild(bgObj);//移除覆盖整个窗口的div层
                   document.getElementById("msgDiv").removeChild(title);//移除标题
                   document.body.removeChild(msgObj);//移除消息层
                }
                else
                {
                    alert("密码输入错误,请重新输入！");
                    window.location.href="doAdminAction.php?act=logout";
                }
                */
            }
            document.body.appendChild(msgObj);
            document.getElementById("msgDiv").appendChild(title);
            var txt=document.createElement("p");
            txt.style.margin="1em 0"
            txt.setAttribute("id","msgTxt");
            txt.innerHTML=str;
            document.getElementById("msgDiv").appendChild(txt);

        }
        //阻止F5或者鼠标右键刷新,使锁屏失效
        document.onkeydown = function(){
            if(event.keyCode==116) {
                event.keyCode=0;
                event.returnValue = false;
            }
        }
        document.oncontextmenu = function() {event.returnValue = false;}

    </script>
    <!-- 锁屏代码结束-->
    <script type="text/javascript">
    	function show(num,change){
	    		var menu=document.getElementById(num);
	    		var change=document.getElementById(change);
	    		if(change.innerHTML=="+"){
	    				change.innerHTML="-";
	        	}else{
						change.innerHTML="+";
	            }
    		   if(menu.style.display=='none'){
    	             menu.style.display='';
    		    }else{
    		         menu.style.display='none';
    		    }
        }
    </script>
</body>
</html>