<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
	use yii\captcha\Captcha; 
?>
<div class="head">
	<div class="head-left">
		欢迎光临本店!&emsp;
		<span><a href="/index/login">请登录</a></span>&emsp;
		<span><a href="/index/register">免费注册</a></span>
	</div>
	<div class="head-right">
		<span class="my-info">
			<a href="/index/login">我的信息<b></b>&emsp;
				<div class ="myinfo">
					<span><a href="/index/login">已买到的宝贝</a></span>
					<span><a href="/index/login">我的地址管理</a></span>
				</div>
			</a>
		</span>
		<span class="my-guanzhu"><a href="/index/login"><b></b>我关注的店铺</a></span>&emsp;
		<span class="my-addcart"><a href="/index/login"><b></b>购物车</a></span>&emsp;
		<span class="my-info"><a href="/index/login">收藏夹</a><b></b></span>|&emsp;
		<span class="my-info"><a href="/index/login">商家支持</a></span>&emsp;
		<span><a href="/index/login">申请商家驻入</a></span>
	</div>
</div>
<div class="index_content">
	<div class="index_top">
		<div class="index_logo"><img src="../images/logo.jpg"></div>
		<div class="index_search">
			<span class="baobei">宝贝</span><span class="dianpu">店铺</span>
			<div>
				<input type="text" value='请输入关键词' class="key"><input type="button" value="搜索" class="key_search">
			</div>
			<span style="font-size: 12px">母婴产品&emsp;|&emsp;</span>
			<span style="font-size: 12px">德国双立人&emsp;|&emsp;</span>
			<span style="font-size: 12px">奶粉进口清关代理&emsp;|&emsp;</span>
			<span style="font-size: 12px">澳大利亚奶粉&emsp;|&emsp;</span>
			<span style="font-size: 12px">牛栏奶粉&emsp;|&emsp;</span>
			<span style="font-size: 12px">荷兰牛栏</span>
		</div>
		<div class="tuihuo"><img src="../images/user_header_right.png"></div>
	</div>
</div>
<div class="index_head">
	<span class="index_hall">全部商品分类 <i></i></span>		
	<div class="index_headks">
		<ul>
			<li class="index_out">
				<span class="index_hks"></span>
				<span class="index_ether"><a>母婴用品</a></span><span class="index_all"></span>
				<p><a>孕婴奶粉</a>&emsp;<a>孕婴洗护</a></p> 
			</li>
			<li class="index_out">
				<span class="index_hks"></span>
				<span class="index_ether"><a>保健用品</a></span><span class="index_all"></span>
				<p><a>保健食品</a>&emsp;<a>孕婴洗护</a></p> 
			</li>
		</ul>
	</div>
	<div class="index_show"></div>
</div>
<div class="change_img"><img id=obj src ="../images/20160506auuyuq.jpg"/> </div>
<div class="change_banner">
	<span style="background: red;">0</span>
	<span>1</span>
	<span>2</span>
	<span>3</span>
</div> 
<div class="index_con">
	<div class="index_commend">	
		<span class="index_choose">新品上市<br/><i></i></span>
		<span class="index_no">商城热卖<br/><i></i></span>
		<span class="index_no">精品推荐<br/><i></i></span>
	</div>
	<div class="commend_content">
		<dl>
			<dd><a><img src="../images/20160506auuyuq.jpg"></a></dd>
			<dt><a>日本进口原装花王拉拉裤 XXL26片 </a></dt>
			<dd class="comtent_price">商城价： <i>135.0</i></dd>
		</dl>
		<dl>
			<dd><a><img src="../images/20160506auuyuq.jpg"></a></dd>
			<dt><a>日本进口原装花王拉拉裤 XXL26片 </a></dt>
			<dd class="comtent_price">商城价： <i>135.0</i></dd>
		</dl>
		<dl>
			<dd><a><img src="../images/20160506auuyuq.jpg"></a></dd>
			<dt><a>日本进口原装花王拉拉裤 XXL26片 </a></dt>
			<dd class="comtent_price">商城价： <i>135.0</i></dd>
		</dl>
		<dl>
			<dd><a><img src="../images/20160506auuyuq.jpg"></a></dd>
			<dt><a>日本进口原装花王拉拉裤 XXL26片 </a></dt>
			<dd class="comtent_price">商城价： <i>135.0</i></dd>
		</dl>
		<dl>
			<dd><a><img src="../images/20160506auuyuq.jpg"></a></dd>
			<dt><a>日本进口原装花王拉拉裤 XXL26片 </a></dt>
			<dd class="comtent_price">商城价： <i>135.0</i></dd>
		</dl>
		<dl>
			<dd><a><img src="../images/20160506auuyuq.jpg"></a></dd>
			<dt><a>日本进口原装花王拉拉裤 XXL26片 </a></dt>
			<dd class="comtent_price">商城价： <i>135.0</i></dd>
		</dl>
	</div>
</div>
<div class="index_float" >
	<div class="flats_show">
		<div class="flats_shown"><span class="first" style="display: none;">1</span><span class="two" style="display: block;">母婴</span></div>
		<div class="flats_shown"><span class="first">2</span><span class="two">服装</span></div>
		<div class="flats_shown"><a href="#test"><span class="first">3</span><span class="two">化妆</span></div></a>
		<div class="flats_shown"><span class="first">4</span><span class="two">手机</span></div>
		<div class="flats_shown"><span class="first">5</span><span class="two">家电</span></div>
		<div class="flats_shown"><span class="first">6</span><span class="two">食品</span></div>
	</div>
	<div class="flats">
		<div class="flats_num">
			<div class="myyp">1F<a>母婴用品</a></div>
			<span class="choose no">孕婴护洗</span>
			<span class="choose no">孕婴奶粉</span>
			<span class="choose">精挑细选</span>			
		</div>
		<div class="flats_kinds">
			<div class="word">
				<a><b>特配奶粉</b></a>
				<a><b>宝宝沐浴</b></a>
				<a><b>儿童防晒</b></a>
				<a><b>爽身粉</b></a>
				<a><b>奶瓶清洗</b></a>
				<a><b>孕妇护肤</b></a>
				<a><b>浴室用品</b></b></a>
				<a><b>吸奶器</b></a>
				<a><b>理发器</b></a>
			</div>
		</div>
		<div class="word_info">
			<div class="j_ItemInfo nobo">
				<dd><a><img src="../images/20160506auuyuq.jpg"></a></dd>
				<dt><a>日本进口原装花王拉拉裤 XXL26片 </a></dt>
				<dd class="old_price"><s>162.0</s></dd>
				<dd class="now_price">135.0<a></a></dd>
			</div>
			<div class="j_ItemInfo bo">
				<dd><a><img src="../images/20160506auuyuq.jpg"></a></dd>
				<dt><a>日本进口原装花王拉拉裤 XXL26片 </a></dt>
				<dd class="old_price"><s>162.0</s></dd>
				<dd class="now_price">135.0<a></a></dd>
			</div>
			<div class="j_ItemInfo bo">
				<dd><a><img src="../images/20160506auuyuq.jpg"></a></dd>
				<dt><a>日本进口原装花王拉拉裤 XXL26片 </a></dt>
				<dd class="old_price"><s>162.0</s></dd>
				<dd class="now_price">135.0<a></a></dd>
			</div>
			<div class="j_ItemInfo bo">
				<dd><a><img src="../images/20160506auuyuq.jpg"></a></dd>
				<dt><a>日本进口原装花王拉拉裤 XXL26片 </a></dt>
				<dd class="old_price"><s>162.0</s></dd>
				<dd class="now_price">135.0<a></a></dd>
			</div>
			<div class="j_ItemInfo nobo">
				<dd><a><img src="../images/20160506auuyuq.jpg"></a></dd>
				<dt><a>日本进口原装花王拉拉裤 XXL26片 </a></dt>
				<dd class="old_price"><s>162.0</s></dd>
				<dd class="now_price">135.0<a></a></dd>
			</div>
			<div class="j_ItemInfo bo">
				<dd><a><img src="../images/20160506auuyuq.jpg"></a></dd>
				<dt><a>日本进口原装花王拉拉裤 XXL26片 </a></dt>
				<dd class="old_price"><s>162.0</s></dd>
				<dd class="now_price">135.0<a></a></dd>
			</div>
			<div class="j_ItemInfo bo">
				<dd><a><img src="../images/20160506auuyuq.jpg"></a></dd>
				<dt><a>日本进口原装花王拉拉裤 XXL26片 </a></dt>
				<dd class="old_price"><s>162.0</s></dd>
				<dd class="now_price">135.0<a></a></dd>
			</div>
			<div class="j_ItemInfo bo">
				<dd><a><img src="../images/20160506auuyuq.jpg"></a></dd>
				<dt><a>日本进口原装花王拉拉裤 XXL26片 </a></dt>
				<dd class="old_price"><s>162.0</s></dd>
				<dd class="now_price">135.0<a></a></dd>
			</div>
		</div>
	</div> 
	<div class="flats" id="test">
		<div class="flats_num">
			<div class="myyp">2F<a>保健用品</a></div>
			<span class="choose no">孕婴护洗</span>
			<span class="choose no">孕婴奶粉</span>
			<span class="choose">精挑细选</span>			
		</div>
		<div class="flats_kinds">
			<div class="word">
				<a><b>特配奶粉</b></a>
				<a><b>宝宝沐浴</b></a>
				<a><b>儿童防晒</b></a>
				<a><b>爽身粉</b></a>
				<a><b>奶瓶清洗</b></a>
				<a><b>孕妇护肤</b></a>
				<a><b>浴室用品</b></b></a>
				<a><b>吸奶器</b></a>
				<a><b>理发器</b></a>
			</div>
		</div>
		<div class="word_info">
			<div class="j_ItemInfo nobo">
				<dd><a><img src="../images/20160506auuyuq.jpg"></a></dd>
				<dt><a>日本进口原装花王拉拉裤 XXL26片 </a></dt>
				<dd class="old_price"><s>162.0</s></dd>
				<dd class="now_price">135.0<a></a></dd>
			</div>
			<div class="j_ItemInfo bo">
				<dd><a><img src="../images/20160506auuyuq.jpg"></a></dd>
				<dt><a>日本进口原装花王拉拉裤 XXL26片 </a></dt>
				<dd class="old_price"><s>162.0</s></dd>
				<dd class="now_price">135.0<a></a></dd>
			</div>
			<div class="j_ItemInfo bo">
				<dd><a><img src="../images/20160506auuyuq.jpg"></a></dd>
				<dt><a>日本进口原装花王拉拉裤 XXL26片 </a></dt>
				<dd class="old_price"><s>162.0</s></dd>
				<dd class="now_price">135.0<a></a></dd>
			</div>
			<div class="j_ItemInfo bo">
				<dd><a><img src="../images/20160506auuyuq.jpg"></a></dd>
				<dt><a>日本进口原装花王拉拉裤 XXL26片 </a></dt>
				<dd class="old_price"><s>162.0</s></dd>
				<dd class="now_price">135.0<a></a></dd>
			</div>
			<div class="j_ItemInfo nobo">
				<dd><a><img src="../images/20160506auuyuq.jpg"></a></dd>
				<dt><a>日本进口原装花王拉拉裤 XXL26片 </a></dt>
				<dd class="old_price"><s>162.0</s></dd>
				<dd class="now_price">135.0<a></a></dd>
			</div>
			<div class="j_ItemInfo bo">
				<dd><a><img src="../images/20160506auuyuq.jpg"></a></dd>
				<dt><a>日本进口原装花王拉拉裤 XXL26片 </a></dt>
				<dd class="old_price"><s>162.0</s></dd>
				<dd class="now_price">135.0<a></a></dd>
			</div>
			<div class="j_ItemInfo bo">
				<dd><a><img src="../images/20160506auuyuq.jpg"></a></dd>
				<dt><a>日本进口原装花王拉拉裤 XXL26片 </a></dt>
				<dd class="old_price"><s>162.0</s></dd>
				<dd class="now_price">135.0<a></a></dd>
			</div>
			<div class="j_ItemInfo bo">
				<dd><a><img src="../images/20160506auuyuq.jpg"></a></dd>
				<dt><a>日本进口原装花王拉拉裤 XXL26片 </a></dt>
				<dd class="old_price"><s>162.0</s></dd>
				<dd class="now_price">135.0<a></a></dd>
			</div>
		</div>
	</div> 
</div>
<div class="footer-service">
    <ul class="list-service clearfix">
        <li> <a class="ic1" target="_blank"> <strong>1小时快修服务</strong> </a> </li>
        <li> <a class="ic2" target="_blank"><strong>7天无理由退货</strong> </a> </li>
        <li> <a class="ic3" target="_blank"> <strong>15天免费换货</strong> </a> </li>
        <li> <a class="ic4" target="_blank"> <strong>满150元包邮</strong> </a> </li>
        <li> <a class="ic5" target="_blank"> <strong>460余家售后网点</strong> </a> </li>
    </ul>
</div> 
<?= $this->render('../about') ?> 
<div class="index_foot">
	<?= $this->render('../foot') ?> 
</div> 
<div class="index_right">
	<div class="right_img"><img src="../images/user_head.png" style="cursor: pointer;">	
		<div class="login-infodex" >
			<span class="plogin">请登录</span><span class="is_registerdex">还没有账号？<a href="/index/register">立即注册</a></span>
			<div class="login-tableindex">
				<span class="label">账 号&emsp;<input type="text" class="text" placeholder="用户名" id="login_iname" value="<?php if (isset($save)) { echo $save['username'];} ?>"></span>
				<span class="label">密 码&emsp;<input type="password" class="text" id="login_ipwd" value="<?php if (isset($save)) { echo $save['password'];} ?>"></span>
				
				<span style="float: left;line-height: 50px;" class="label" >验证码：</span>
		   		<span><!-- <input id="vdcode" type="text" name="validate" style="text-transform:uppercase;"/> -->
		   		<?php $form = ActiveForm::begin(); ?>
	                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), ['captchaAction'=>'index/captcha',
	                	'template' => '<input id="login_icode" type="text" name="validate" style="text-transform:uppercase;"/>{image}<span  class="ucode" id="refresh" style="margin-left:-104px;">看不清?换一张</span>',
	                    ]) ?> 

					<?=Html::jsFile('/js/jquery.min.js')?>
					<?php ActiveForm::end(); ?>         
	            </span><br/>
				<span ><input type="checkbox" id="isave">记住密码<span class="forget_pwd"><a href="/index/forget">忘记密码?</a></span></span><br/><br/>
				<span><input type="button" value="立即登录" class="login-button"></span>
			</div>		
		</div>
	</div>
	<div class="online_sale">在线销售 
		<div class="right_online">
			<div class="guwen">在线销售顾问</div>
			<div style="text-align: center;">
				<img src="../images/web_logo.png">&emsp;在线客服
			</div>
		</div>
	</div>	
	<div class="research" onmouseout="search();" onmouseover="online();">
		<span class="searchi"></span>调 查
		<div class="right_search">在线调查问卷</div>
	</div>
	
	<div class="shopping"><span class="shopped"></span>购<br/>物<br/>车
		<div class="right_shop">您的购物车里什么都没有哦，再去看看吧</div>
	</div><br/><br/>
	
	<div class="attent"  onmouseover="attent();" onmouseout="attented();" onclick="window.location.href='/index/login';"><span class="attented"></span>关注</div>
	<div class="collect"  onmouseover="collect();" onmouseout="collected();" onclick="window.location.href='/index/login';"><span class="collected"></span>收藏</div>
	<div class="top" id="return_top" style="display: none;margin-top: 410px;" onmouseover="tops();" onmouseout="topped();"><span class="topped"></span></div>
</div>  
<script >
	$(document).ready(function() {	
		document.onkeydown = function (e) {
			var theEvent = window.event || e; 
			if (theEvent.keyCode == 13) { 
				$(".login-button").click(); 
				return false;
			} 
		} 					
		$("#refresh").click(function(){
			changeVerifyCode();
		});
		$(".login-button").click(function(){
			$.ajax({
				type:"POST",
				url:"/index/login/",
				async: true,
				dataType : 'JSON',
				data:{"username":$("#login_iname").val(),
					  "password":$("#login_ipwd").val(),
					  "code":$("#login_icode").val(),
					  "isCheck":$('#isave').is(':checked')
					 },
				success: function(data) {
					if(data == "0"){
						alert('用户名不存在');
						return false;
					}
					else if(data == "1"){
						alert('密码错误');
						return false;
					}									
					else if(data == "3"){
						alert('验证码错误');
						return false;
					}
					else if(data == "2"){
						window.location.href='../index/index';
					}
	            },
	            error: 　 function(err) {
	                //alert('error');
	                console.log(err);
	            }
			});
			return false;
		});
	});

	function changeVerifyCode() {
        $.ajax({
            url: "/index/captcha?refresh",
            dataType: 'json',
            cache: false,
            success: function(data) {	             	
                $('#index-verifycode-image').attr('src', data['url']);
            }
        });
	}
</script>  
