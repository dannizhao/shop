$(document).ready(function(){
	$("#email_res").click(function(){
		$(this).css("color","red");
		$(this).prev().css("color","");
		$(".phone_res").css("display","none");
		$(".email_res").css("display","block");
	});
	$("#mobile_res").click(function(){
		$(this).css("color","red");
		$(this).next().css("color","");
		$(".phone_res").css("display","block");
		$(".email_res").css("display","none");
	});
	$(document).on("click","#phone-button,#email-button",function(){	
		var reg   = /^1[0-9]{10}$/;//手机号码正则表达式
		var rege = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/; //邮箱正则表达式
		if($(".email_res").css("display") == "none"){
			var uname = $("#login_uname").val();//注册的用户名
			var upwd  = $("#login_pwd").val();//注册的用户的密码
			var upwds = $("#login_pwds").val();//注册的用户密码的确认
			if(uname == ""){
				alert("手机注册的手机号码不能为空！");
				return false;
			}
			else if (reg.test(uname) == false) {
				alert("请输入正确的手机号码！");
				return false;
			}
		}
		else{
			var uname = $("#email_uname").val();//注册的用户名
			var upwd  = $("#email_pwd").val();//注册的用户的密码
			var upwds = $("#email_pwds").val();//注册的用户密码的确认
			if(uname == ""){
				alert("邮箱注册的邮箱号码不能为空！");
				return false;
			}
			else if (rege.test(uname) == false) {
				alert("请输入正确的邮箱格式！");
				return false;
			}
		}
		if (upwd == "") {
			alert("密码不能为空！");
			return false;
		}
		else if (upwds == "") {
			alert("确认密码不能为空！");
			return false;
		}
		else if (upwd != upwds) {
			alert("密码和确认密码不一致！");
			return false;
		}
		$.ajax({  
	        type: "POST",  
	        url: "/index/register",  
	        data: {"uname":uname,
	               "upwd":upwd
	        },
	        success: function(data){
	            if(data == "0"){
	             	alert("注册失败!");
	             	return false;
	            }
	            else if(data == "1"){
	             	alert("该手机号已经注册!");
	             	return false;
	            }
	            else{
	            	window.location.href="/index/login";
	            }
	         }                        
        });
        return false;		
	});
	//密码强度判断
	$(document).on("keyup","#login_pwd,#email_pwd",function(){
		if($(this).attr("id") == "login_pwd"){
			var $id = $(".phone_res");
		}
		else if($(this).attr("id") == "email_pwd"){
			var $id = $(".email_res");
		} 
		var regs = /^[0-9]+.?[0-9]*$/;//数字的正则表达式
		var reg  = /^[0-9a-zA-Z]*$/g;//数字和字母的正则表达式
		var rega =/^(?=.*?[a-zA-Z])(?=.*?[0-9])(?=.*?[\.\!\~\_@#$])[a-zA-Z0-9\.\!\~_@#$]{8,}$/;//数字、字母
		if(regs.test($(this).val()) == true){
			$id.find(".pwd").first().css("border-bottom","2px solid red");
			$id.find(".pwd").eq(1).css("border-bottom","2px solid gray");
			$id.find(".pwd").eq(2).css("border-bottom","2px solid gray");
		}
		else if(reg.test($(this).val()) ){
			$id.find(".pwd").first().css("border-bottom","2px solid gray");
			$id.find(".pwd").eq(1).css("border-bottom","2px solid red");
			$id.find(".pwd").eq(2).css("border-bottom","2px solid gray");
		}
		else if(rega.test($(this).val())){
			$id.find(".pwd").first().css("border-bottom","2px solid gray");
			$id.find(".pwd").eq(1).css("border-bottom","2px solid gray");
			$id.find(".pwd").eq(2).css("border-bottom","2px solid red");
		}
	});
	//修改密码第一步
	$(".next").click(function(){
		var name = $(".text").val();
		var code = $(".text-code").val();
		if(name == ""){
			alert("账户名不能为空！");
			return false;
		}
		else if(code == ""){
			alert("验证码不能为空！");
			return false;
		}
		$.ajax({  
	        type: "POST",  
	        url: "/index/forget",  
	        data: {"name":name,
	               "code":code
	        },
	        success: function(data){
	            if(data == "0"){
	             	alert("验证码错误!");
	             	return false;
	            }
	            else if(data == "1"){
	             	alert("该账号没有注册!");
	             	return false;
	            }
	            else{
	            	window.location.href="/index/forgettwo?name="+name;
	            }
	         }                        
        });
        return false;
	});
	//修改密码第二步
	$("#next-two").click(function(){
		var pwd  = $(".forget_pwd").first().val();
		var pwds = $(".forget_pwd").eq(1).val();
		if(pwd == ""){
			alert("密码不能为空！");
			return false;
		}
		else if(pwds == ""){
			alert("确认密码不能为空！");
			return false;
		}
		else if(pwd != pwds){
			alert("密码和确认密码不一致！");
			return false;
		}
		$.ajax({  
	        type: "POST",  
	        url: "/index/forgettwo",  
	        data: {"pwd":pwd,"name":window.location.search.split("=")[1]},
	        success: function(data){
	            if(data == "0"){
	             	alert("修改密码失败!");
	             	return false;
	            }
	            else{
	            	window.location.href="/index/forgetok";
	            }
	         }                        
        });
        return false;
	});
	//首页宝贝和店铺的切换
	//首页宝贝和店铺的鼠标进入背景图
	$(document).on("click",".baobei,.dianpu,.yes",function(){
		$(this).siblings().first().removeClass().addClass("yes");
		$(this).removeClass().addClass("on");
	});
	$(".dianpu").mouseover(function(){
		$(".dianpu").addClass("pink");
	});
	$(".dianpu").mouseout(function(){
		$(this).removeClass("pink");
	});
	$(".key").focus(function(){
		if($(this).val() == "请输入关键词"){
			$(this).val('');
		}
	});
	$(".key").blur(function(){
		if($(this).val() == ""){
			$(this).val('请输入关键词');
		}
	});
	//全部商品
	$(document).on("mouseover",".index_out",function(){
		$(this).removeClass().addClass("index_over");
		$(".index_show").css("display","block").text($(this).text());
	});
	$(document).on("mouseout",".index_headks li",function(){
		$(this).removeClass("index_over").addClass("index_out");
		$(".index_show").css("display","none");
	});
	//导航栏切换
	$(document).on("mouseover",".index_commend span",function(){
		$(this).removeClass().addClass("index_choose");
		$(this).siblings().removeClass().addClass("index_no");
		//alert($(this).html());
	});
	//右侧登录显示很隐藏
	$(".right_img").mouseover(function(){
		$(".login-infodex").css("display","block");
	});
	$(".right_img").mouseout(function(){
		$(".login-infodex").css("display","none");
	});
	//右侧在线销售显示很隐藏
	$(".online_sale").mouseover(function(){
		$(".right_online").css("display","block");
	});
	$(".online_sale").mouseout(function(){
		$(".right_online").css("display","none");
	});
	//右侧在购物车显示很隐藏
	$(".shopping").mouseover(function(){
		
		$(".shopping").css("background-color","red");
		$(".right_shop").css("display","block");
	});
	$(".shopping").mouseout(function(){
		$(".shopping").css("background","");
		$(".right_shop").css("display","none");
	});
	//返回顶部显示和隐藏
	$(window).bind("scroll", function () {  
        var sTop = $(window).scrollTop();  
        var sTop = parseInt(sTop);  
        if (sTop >= 130) {  
            $(".top").css("display","block");
            return false;
        }
        $(".top").css("display","none");          
    });  
	$("#return_top").click(function(){
		$('html, body').animate({scrollTop: 0}, 1000);
	});
	//楼层显示和隐藏
	$(window).bind("scroll", function () {  
        var sTop = $(window).scrollTop();  
        var sTop = parseInt(sTop);  
        if (sTop >= 960) {  
            $(".flats_show").css("display","block");
            return false;
        }
        $(".flats_show").css("display","none");          
    }); 
    $(".flats_shown").each(function(){
    	$(this).mouseover(function(){
    		$(this).find(".first").css("display","none");
    		$(this).find(".two").css("display","block");
    	});
    	$(this).mouseout(function(){
    		$(this).find(".first").css("display","block");
    		$(this).find(".two").css("display","none");
    	});
    });   
    //精品挑选    
	$(".choose").click(function(){
    	$(this).attr("class","choose");
    	$(this).siblings("span").attr("class","choose no");
    });
    //我的信息  收藏夹  商家支持 
    $(document).on("mouseover",".myself,.mybaby,.mysupport",function(){
    	if($(this).attr("class") == "myself"){
    		var pub = $(".myinfo");
    		var className = $("."+$(this).attr("class"));
    	}
    	else if($(this).attr("class") == "mybaby"){
    		var pub = $(".mycollect");
    		var className = $("."+$(this).attr("class"));
    	}
    	else if($(this).attr("class") == "mysupport"){
    		var pub = $(".support-help");
    		var className = $(".mysu");
    	}
    	pub.css("display","block");
    	className.css("background","white");
    	pub.css("border-left","1px solid #e7e7e7");
    	pub.css("border-right","1px solid #e7e7e7");
    	pub.css("border-bottom","1px solid #e7e7e7");
    	className.find("b").css("background-position","0 -10px");
    });
    $(document).on("mouseout",".myself,.mybaby,.mysupport",function(){
    	if($(this).attr("class") == "myself"){
    		var pub = $(".myinfo");
    		var className = $("."+$(this).attr("class"));
    	}
    	else if($(this).attr("class") == "mybaby"){
    		var pub = $(".mycollect");
    		var className = $("."+$(this).attr("class"));
    	}
    	else if($(this).attr("class") == "mysupport"){
    		var pub = $(".support-help");
    		var className = $(".mysu");
    	}
    	pub.css("display","none");
    	className.css("background","");
    	pub.css("border","");
    	className.find("b").css("background-position","");
    });
    //每个楼层
    $(".word a").each(function(){
    	$(this).mouseover(function(){
    		$(this).css({"background":"#c97bff","color":"white","border":"1px solid white"});
    	});
    	$(this).mouseout(function(){
    		$(this).css({"background":"white","color":"#666"});
    	});
    });
    //购买全部商品
    $(".buyall").mouseover(function(){
    	$(".buy").css("display","block");
    });
    $(".buyall").mouseout(function(){
    	$(".buy").css("display","none");
    });
    //商品收藏和店铺关注切换
    $(".trade_goods").click(function(){
    	$(this).siblings(".lo").css("visibility","visible");
    	$(this).siblings(".lo_choose").css("visibility","hidden");
    	$(".t_goods").css("display","block");
    	$(".t_ca").css("display","none");
    });
    $(".trade_ca").click(function(){
    	$(this).siblings(".lo").css("visibility","hidden");
    	$(this).siblings(".lo_choose").css("visibility","visible");
    	$(".t_goods").css("display","none");
    	$(".t_ca").css("display","block");
    });

});
//右侧在线调查显示很隐藏
function online(){
	//$(".research").html('在线调查<div class="right_search">在线调查问卷</div>').attr("class","online_search");
	$(".right_search").css("display","block");
}
function search(){
	//$(".online_search").html('<span class="searchi"></span>调 查').attr("class","research");
	$(".right_search").css("display","none");
}
//右侧关注显示很隐藏
function attent(){
	$(".attent").html('关注店铺').attr("class","online_attent");
}
function attented(){
	$(".online_attent").html('<span class="attented"></span>关注').attr("class","attent");
}
//右侧收藏显示很隐藏
function collect(){
	$(".collect").html('收藏商品').attr("class","online_collect");
}
function collected(){
	$(".online_collect").html('<span class="attented"></span>收藏').attr("class","collect");
}
//右侧返回顶部
function tops(){
	$(".top").html('返回顶部').attr("class","online_top");
}
function topped(){
	$(".online_top").html('<span class="topped"></span>').attr("class","top");
}
//图片切换效果
window.click=0;
//图片切换效果
var curIndex = 0; 
//时间间隔 单位毫秒 
var timeInterval = 2000; 
var arr = new Array(); 
arr[0] = "../images/20160506auuyuq.jpg"; 
arr[1] = "../images/20160506nctzoo.jpg"; 
arr[2] = "../images/20160509vycqmd.jpg"; 
arr[3] = "../images/20160505ihmttf.jpg"; 
setInterval(changeImg,timeInterval); 
function changeImg() 
{ 
	if(click != "0"){
		curIndex=parseInt(click); 
		if (click == arr.length-1)  
	    { 
	        click = 0; 
	    } 
	    else{
	    	click = curIndex+1;
	    }		
	}
    var obj = document.getElementById("obj"); 
    if (curIndex == arr.length-1)  
    { 
        curIndex = 0; 
    } 
    else 
    { 
        curIndex += 1; 
    } 
    obj.src = arr[curIndex]; 
    for (var i = 0; i <4; i++) {
    	
    	if(i == curIndex){
    		$(".change_banner span").eq(curIndex).css("background","red");
    	}
    	else{
    		$(".change_banner span").eq(i).css("background","gray");
    	}
    }
    $(".change_banner span").each(function(){
		$(this).click(function(){
			$(".change_banner span").css("background","gray");
			$("#obj").attr("src",arr[$(this).html()]);
			$(".change_banner span").eq($(this).html()).css("background","red");
			click = $(this).html();
		})
	});
} 
/*强密码：含有字母+特殊符号+数字如 sa@123
弱密码：6位以内数字并且有重复   63699
中密码：数字超过一定长度 或数字加字幕 aa123*/