<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<?=Html::jsFile('/js/distpicker/js/distpicker.data.js') ?>
<?=Html::jsFile('/js/distpicker/js/distpicker.js') ?>
<?=Html::jsFile('/js/distpicker/js/main.js') ?>
<?= $this->render('../head') ?> 
<?= $this->render('../middle') ?>
<?= $this->render('../all_goods') ?>
<div class="goods_content">
	<?= $this->render('../user_left') ?>
	<div class="goods_right">
		<h4>地址列表</h4>
		<div class="operate_warn">
			<b>操作提示:</b>
			<p>您可对已有的地址进行编辑及删除，亦可新增收货地址</p>			
		</div>
		<div class="address_info">
			<table border="1" width="913" height="385" bordercolor="#dddddd">
				<tr>
					<td>配送区域：</td>
					<td colspan="3">
						<div data-toggle="distpicker">
				          <select data-province="---- 选择省 ----"></select>
				          <select data-city="---- 选择市 ----"></select>
				          <select data-district="---- 选择区 ----"></select>(必填)
				        </div>
					</td>					
				</tr>
				<tr>
					<td>收货人姓名：</td>
					<td><input type="text" class="add_text">(必填)</td>
					<td>电子邮件地址：</td>
					<td><input type="text"></td>					
				</tr>
				<tr>
					<td>详细地址：</td>
					<td colspan="3"><input type="text"  class="add_txt">(必填)</td>					
				</tr>
				<tr>
					<td>固定电话：</td>
					<td><input type="text" class="add_text" placeholder="区号-电话号码-分机号"></td>
					<td>手机：</td>
					<td><input type="text" class="add_text"></td>					
				</tr>
				<tr>
					<td>邮政编码：</td>
					<td colspan="3"><input type="text" class="add_text"></td>
				</tr>
				<tr>
					<td colspan="4"><input type="button" value="新增收货地址" class="add_btn"></td>
				</tr>
			</table>
		</div>
	</div>
</div>
<?= $this->render('../about') ?>
<div class="index_foot">
	<?= $this->render('../foot') ?> 
</div>