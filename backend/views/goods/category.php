<?php	
	use yii\bootstrap\ActiveForm;
	use yii\captcha\Captcha; 
	use yii\helpers\Html;	
	use yii\widgets\LinkPager;
	use yii\web\View;
?>
<?= $this->render('../head') ?>
<?= $this->render('../left') ?>
<div class="goods-content">
	<div class="manage-center">
		<span><a href="/admin.php/admin/index">管理中心</a>-添加新商品</span>
		<div class="add-cate" ><a href="/admin.php/goods/list">添加商品分类</a></div>
	</div>
	<div class="cus-search">
		<div class="search-left">
			<img src="../images/icon_search.gif">
			<span>客户搜索记录</span>
			<input size="25px" style="height: 30px; background-color: white;" class="category" type="text">
		</div>
		<input value="确定" class="goods-search-botton"  type="button">
	</div>
	
	<div class="goods-info">
		<table>
			<tr>
				<td class="category">分类名称  [全部收缩]</td>
				<td class="category_nav">商品数量</td>
				<!-- <td class="category_nav">数量单位</td> -->
				<td class="category_nav">导航栏</td>
				<td class="category_nav">是否显示</td>
				<td class="category_nav">价格分级</td>
				<td class="category_nav">排序</td>
				<td class="category_oper">操作</td>
			</tr>
			<tbody class="goodsInfo">
				<?php
					foreach ($goods_list as $key => $value) {
						if($value['cate_nav'] == "0"){
							$is_nav = '<img src="../images/no.gif">';
						}
						else if($value['ground'] == "1"){
							$is_nav = '<img src="../images/yes.gif">';
						}
						echo <<< EOF
							<tr>
								<td><b>{$value['cate_name']}</b></td>
								<td>{$value['cate_num']}</td>
								<td>{$is_nav}</td>
							</tr>
EOF;
					}
				?>
				<tr>
					<td>11</td>
					<td>11</td>
					<td>11</td>
				</tr>
				<tr>
					<td>11</td>
					<td>11</td>
					<td>11</td>
				</tr>
			</tbody>

		</table>
	</div>
</div>