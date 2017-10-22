<div class="goods_left">
	<div class="goods_head">	
		<div class="index_center"><i></i><a href="/index/index" target="_blank">首页</a> > 用户中心</div>
		<div class="index_center center">
			<div class="user_center"><b>会员中心</b></div>
			<div class="user_operate">
				<div class="user_photo"><img src="../images/peopleicon_01.gif"></div>
				<div class="update_userinfo">
					<ul>
						<li><i></i><a>修改资料</a></li>
						<li><i></i><a href="/index/loginout">安全退出</a></li>
					</ul>				 
				</div>
				<div class="goods_uname">
					<?php 
						$session = Yii::$app->session;
						echo $session->get('user_info')['username'];
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="user_kinds">
		<ul>
			<li class="main"><i></i><b>会员中心</b></li>
			<li>
				<a href='/goods/user' <?php if($_SERVER['REQUEST_URI'] == "/goods/user"){echo 'style="color:#e31939;"';}?> >欢迎页</a>
			</li>
			<li><a>用户信息</a></li>
			<li><a>账户安全</a></li>
			<li>
				<a href='/goods/address' <?php if($_SERVER['REQUEST_URI'] == "/goods/address"){echo 'style="color:#e31939;"';}?>>收货地址</a>
			</li>
			<li><a>资金管理</a></li>
			<li><a>我的红包</a></li>
			<li><a>储值卡充值</a></li>
			<li class="main"><i></i><b>交易中心</b></li>
			<li>
				<a href='/goods/buy' <?php if($_SERVER['REQUEST_URI'] == "/goods/buy"){echo 'style="color:#e31939;"';}?>>我的订单</a>
			</li>
			<li><a>退款/退货及维修</a></li>
			<li><a>商品评价/晒单</a></li>
			<li>
				<a href='/goods/collect' <?php if($_SERVER['REQUEST_URI'] == "/goods/collect"){echo 'style="color:#e31939;"';}?>>商品收藏</a>
			</li>
			<li>
				<a href='/goods/shopfollow' <?php if($_SERVER['REQUEST_URI'] == "/goods/shopfollow"){echo 'style="color:#e31939;"';}?>>店铺关注</a>
			</li>
			<li><a>我的竞拍</a></li>
			<li><a>提货券入口</a></li>
			<li><a>我的提货</a></li>
			<li class="main"><i></i><b>服务中心</b></li>
			<li><a>缺货登记</a></li>
			<li><a>我的留言</a></li>
			<li><a>我要开店</a></li>
		</ul>
	</div>
</div>