<?php	
	use yii\bootstrap\ActiveForm;
	use yii\captcha\Captcha; 
	use yii\helpers\Html;	
?>
<?= $this->render('../head') ?>
<?= $this->render('../left') ?>
<div class="content">
	<div class="manage-center">
		<span><a href="/admin.php/admin/index">管理中心</a></span>
	</div>
	<div class="list-column">
		<ul>
			<li><span class="blank"></span><span class="no-blank">今日销售总额</span></li>
			<li><span class="blank"></span><span  class="no-blank">今日订单数</span></li>
			<li><span class="blank"></span><span  class="no-blank">今日注册会员</span></li>
			<li><span class="blank"></span><span  class="no-blank">今日入住店铺数</span></li>
			<li><span class="blank"></span><span class="no-blank">待审核/店铺总数</span></li>
		</ul>
	</div>
	<div class="about-info">
		<div class="treat">
			<div class="treat-top">
				<span class="treat-top-count">待处理</span>					
			</div>
			<table>
				<tr><td>待处理佣金</td><td>待审核商品</td></tr>
				<tr><td>会员充值</td><td>会员提现</td></tr>
				<tr><td>会员留言</td><td>商品评论</td></tr>
				<tr><td>用户晒单</td><td>标签审核</td></tr>
			</table>			
		</div>
		<div class="product">
			<div class="product-top">
				<span class="product-top-count">商品</span>
			</div>	
			<table>
				<tr><td>自营商品总数</td><td>入驻商商品总数</td></tr>
				<tr><td>库存警告商品数</td><td>新品推荐数</td></tr>
				<tr><td>精品推荐数</td><td>热销商品数</td></tr>
				<tr><td>促销商品数</td><td>已下架商品总数</td></tr>
			</table>
		</div>
		<div class="order-goods">
			<div class="order-goods-top">
				<span class="order-goods-top-count">订单</span>
			</div>
			<table>
				<tr><td>待发货订单</td><td>待支付订单</td></tr>
				<tr><td>待确认订单</td><td>部分发货订单</td></tr>
				<tr><td>退款申请</td><td>退货申请</td></tr>
				<tr><td>新缺货登记</td><td>已成交订单数</td></tr>
			</table>
		</div>			
	</div>
	<div class="order-source">
		<p class="order-source-title">订单来源统计</p>
		<canvas id="canvas"></canvas>
	</div>
	<br/>
	<div class="order-chart">
		<p class="order-chart-title">订单排行统计</p>
		<canvas id="order-chart" ></canvas>
	</div>
	<br/>
	<div class="order-sale">
		<p class="order-sale-title">销售额统计</p>
		<canvas id="sale-chart" ></canvas>
	</div>
</div>
<?=Html::jsFile('/admin.php/js/canvas.js') ?>

