$(function ()
	//1、 选择图片
 {$(".in").click(
	function () {$(this).addClass("current");
	 $(this).siblings().removeClass("current");})	
// 2、输入内容时的处理		
	$("#chatText,#shu").bind({
  				focus:function(){$(this).val("");},
  				//当得到焦点时，文本框的内容为空
 				blur:function(){
 					if ($(this).val()=="") {
 					$(this).val("请输入您的昵称/内容");} } 
 					});	
		
//3、计数处理并让超出的不能显示
var max = 140;
//字符个数的判断
function confine(){
    var len = 0;//记录个数
    var str = $("#chatText").val();
    for (i=0; i<str.length; i++ )
    {
        if (/[^\x00-\xff]/g.test( str[i] ) )
        { len+=1;}//是汉字加1
         else{  len +=0.5;}//是英文
     }  
      var a = max - len;       
      a = Math.floor(a);
      if (a<=0) {a=0; 
      	alert("不能输入啦");
      	$("#chatText").attr("readonly",true);} 
    $("#maxNum").html( a );
}   
$("#chatText").on("keyup", confine);
  $("#chatText").on("change", confine);    
//4、对提交的处理
  $("#btg ").click(function () {
  	var username = $("#shu").val();
  	var v=$("#chatText").val();
  	 if (  /^\s*$/g.test( username ) || username=="请输入您的昵称/内容" )
        { alert("请输入用名，用户名不能为空");$("#shu").focus();}
      else if(! $(".current").attr("src")) 
      {alert("请选择您喜欢的头像");}   
      else if( ! /^[\u4e00-\u9fa5\w]{2,8}$/g.test( username ) )
    { alert("用户名由2-8位的数字，字母，下划线，汉字");$("#shu").focus();} 
      else if (/^\s*$/g.test(v)||v=="请输入您的昵称/内容"){
            alert("留言不能为空");
            $("#chatText").focus();}
      else{
            var date = new Date();
            var str = '<li><div class="userPic"><img src="'+$(".current").attr("src")
            +'" alt=""/></div>'//图片       
             +'<div class="content"><div class="userName" ><a href="javascript:;">'
                +$("#shu").val()+'</a>'+':'+'<span class="msgInfo">'+$("#chatText").val()+'</span></div>'//昵称文本 
             +'<div class="times"><span> '+(date.getMonth()+1)+'月 '+ date.getDate()+'日 '+ date.getHours()+'：'+date.getMinutes()+'</span><div class="kong"></div>'//时间
             +'<a href="javascript:;" class="del">删除</a></div></div></li>'
             
             $("ul li:first").before(str);//添加在最前面
            //添加后的初始化
            $("#shu").val("");
            $("#chatText").val("");
            // $(".in")[3].click();
            $("#maxNum").html( 140 );
            $(".in").removeClass("current");
        }})
 //5、ul样式       
         $("ul").on("mouseover", "li", function(){
        $(this).find(".del").css("display", "inline-block");
        $(this).css("background", "#DFDDDA");
    });    
           $("ul").on("mouseout", "li", function(){
        $(this).find(".del").css("display", "none");
        $(this).css("background-color", " transparent");
    });

//6、删除操作
$("ul").on("click", ".del",function(){
        $(this).parents('li').slideUp(1000);
    });
  



	














































	
})