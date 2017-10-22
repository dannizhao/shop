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
		<h4 style="width: 150px;">我关注的店铺</h4>
		<div class="shop_myf">
			<table width="913">
				<tr>
					<td width="20%">店铺</td>
					<td width="15%">商家名称</td>
					<td width="15%">联系QQ</td>
					<td width="40%">联系旺旺</td>
					<td width="10%">操作</td>
				</tr>
			</table>
		</div>
	</div>
</div> 	 	 	 	
<?= $this->render('../about') ?>
<div class="index_foot">
	<?= $this->render('../foot') ?> 
</div>