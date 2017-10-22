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
		<h4 style="width: 550px;">我的收藏
			<span style="font-size: 14px;">(关注以下的商品后，您绑定的邮箱可随时接受到关注商品的最新动态)</span>
		</h4>
		<div class="collect_info">
			
		</div>
	</div>
</div> 	 	 	 	
<?= $this->render('../about') ?>
<div class="index_foot">
	<?= $this->render('../foot') ?> 
</div>