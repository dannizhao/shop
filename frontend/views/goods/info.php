<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<?= $this->render('../head') ?> 
<?= $this->render('../middle') ?>
<?= $this->render('../all_goods') ?>
<div class="goods_contents">
	<div class="goods_center">
		<i></i>
		<a href="/index/index" target="_blank">首页</a>
		<a>> 用户中心</a>
		<a>> 孕婴洗护</a>
		<a>> 尿不湿</a>
		<a>> 日本进口原装花王拉拉裤 XXL26片</a>
	</div>
	<div class="goods_img">
		<img src="../images/20160506auuyuq.jpg" width="378" height="378">
	</div>
	<!-- <?= $this->render('../user_left') ?>
	<div class="goods_right">
		<h4>我的订单</h4>
		<div class="deal_warn">
			<b>我的交易提醒:</b>
			<span class="dwarn">未确认订单(0)</span>
			<span class="dwarn">待付款(0)</span>
			<span class="dwarn">待发货(0)</span>
			<span class="dwarn">已成交订单数(0)</span>
		</div>
		<div class="deal_info">
			<table>
				<tr>
					<td width="32%">宝贝</td>
					<td width="10%">属性</td>
					<td width="9%">单价(元)</td>
					<td width="5%">数量</td>
					<td width="13%">售后</td>
					<td width="8%">订单总金额</td>
					<td width="10%">状态</td>
					<td width="13%" >操作</td>
				</tr>
			</table>
		</div>
	</div> -->
</div>
<?= $this->render('../about') ?>
<div class="index_foot">
	<?= $this->render('../foot') ?> 
</div>