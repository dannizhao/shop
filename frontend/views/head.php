<div class="head">
	<div class="head-left">
		<?php
			$session = Yii::$app->session;
			$userInfo = $session->get('user_info');
			if(empty($userInfo)){
				echo "欢迎光临本店!&emsp;";
				echo '<span><a href="/index/login">请登录</a></span>&emsp;<span><a href="/index/register">免费注册</a></span>';
			}
			else{
				echo "<span style='color:red;'>".$userInfo['username']."</span>欢迎您回来!&emsp;";
				echo '<span><a href="/goods/user">用户中心</a></span>&emsp;<span><a href="/index/register">退出</a></span>';
			}
		?>
	</div>
	<div class="head-right">
		<span class="my-info">
			<span class="myself">
				<a href="/goods/user" target="_blank">我的信息</a>&nbsp;<b></b>
				<div class ="myinfo">
					<div class="myaddress"><a href="/goods/buy" target="_blank">已买到的宝贝</a></div>
					<div class="myaddress"><a href="/goods/address" target="_blank">我的地址管理</a></div>
				</div>
			</span>			
		</span>
		<span class="my-guanzhu" style="float: left;">&emsp;
			<a href="/goods/shopfollow" target="_blank"><b></b>我关注的店铺</a>
		</span>
		<span class="my-addcart" style="float: left;">&emsp;<a><b></b>购物车</a>&emsp;</span>
		<span class="my-collect" style="float: left;">&emsp;
			<span class="mybaby" >
				<a href="/goods/collect" target="_blank">收藏夹</a>&nbsp;<b></b>
				<div class ="mycollect">
					<div class="mystore"><a href="/goods/collect" target="_blank">收藏的宝贝</a></div>
					<div class="mystore"><a href="/goods/shopfollow" target="_blank">收藏的店铺</a></div>
				</div>
			</span>
		</span>
		<span class="my-support">
			<span class="mysupport">
				<span class="mysu"><a>商家支持</a>&nbsp;<b class="mysub"></b></span>
				<div class ="support-help">
					<div class="support">						
						<b>商家：</b><br/>
						<a href="/goods/buy" target="_blank">订购流程</a><br/><a href="/index/help" target="_blank">常见问题</a><hr/>						
					</div>
					<div class="help"><b>帮助：</b><br/><a href="/index/help" target="_blank">帮助中心</a><hr/></div>
				</div>
			</span>
		</span>
		<span><a href="/index/login">&emsp;申请商家驻入</a></span>
	</div>
</div>