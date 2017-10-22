<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<?= $this->render('../head') ?> 
<?= $this->render('../middle') ?>
<?= $this->render('../all_goods') ?>
<div class="goods_content">
	<?= $this->render('../user_left') ?>
	<div class="goods_right">
		<table  class="user_table">
			<tr height="116">
				<td><div class="user_td">账号余额</div><i></i><div class="use_td"><a>0.00</a></div></td>
				<td><div class="user_td">红包</div><i></i><div class="use_td"><span><a>0</a></span> 张</div></td>
				<td><div class="user_td">可用积分</div><i></i><div class="use_td"><a>100</a></div></td>
				<td width="40%">账户安全</td>
			</tr>
			<tr>
				<td colspan="3" valign="top">
					<span class="lo"></span>
					<span class="trade">交易提醒</span>
					<span class="pay_assess"><a>未确认</a> (0) | </span>
					<span class="pay_assess"><a>待付款</a> (0) | </span>
					<span class="pay_assess"><a>待评价</a> (0) | </span>
					<span class="pay_order"><a>查看全部订单 ></a></span>
					<div class="t_assess">
						<i></i>
						<p>  您的购物车里空空的，赶快去购物吧！  </p>
					</div>
				</td>
				<td  valign="top" width="40%">
					<span class="lo"></span>
					<span class="trade">我的购物车</span>
					<div class="t_shop">
						<i></i>
						<p>  您的购物车里空空的，赶快去购物吧！  </p>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="3" valign="top">
					<span class="lo"></span>
					<span class="trade">积分兑换</span>
					<span class="integral"><a>进入积分商城 ></a></span>
				</td>
				<td  valign="top" width="40%">
					<span class="lo"></span>
					<span class="trade">我的足迹</span>
					<div class="t_footprint">
						<i></i>
						<p> 您还没有留下任何足迹！ </p>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="4" valign="top">
					<span class="lo"></span>
					<span class="trade_goods">商品收藏</span>
					<span class="lo_choose"></span>
					<span class="trade_ca">店铺关注</span>
					<div class="t_goods">
						<i></i>
						<p>您的收藏空空的，赶快去购物吧！</p>
					</div>
					<div class="t_ca" style="display: none;">
						<i></i>
						<p>您的店铺收藏空空的，赶快去收藏店铺吧！</p>
					</div>
				</td>
			</tr>
		</table>
		<!-- <h4>我的订单</h4>
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
					<td width="13%">操作</td>
				</tr>
			</table>
		</div> -->
	</div>
</div>
<?= $this->render('../about') ?>
<div class="index_foot">
	<?= $this->render('../foot') ?> 
</div>