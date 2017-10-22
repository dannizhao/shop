<?php	
	use yii\bootstrap\ActiveForm;
	use yii\captcha\Captcha; 
	use yii\helpers\Html;	
	use yii\widgets\LinkPager;
	use yii\web\View;
?>
<?= $this->render('../head') ?>
<?= $this->render('../left') ?>
<div class="goods-content" >

	<div class="manage-center">
		<span><a href="/admin.php/admin/index">管理中心</a>-商品列表</span>
		<div class="add-new-goods"><a href="/admin.php/goods/addlist">添加新商品</a></div>
	</div>	
	<div class="goods-search">
	<div class="search-left">
		<img src="../images/icon_search.gif">
			<input type="text" size="29px" style="height: 30px; background-color: white;" class="category">
			<span id="modal">
				<ul >
				<?php 
					foreach ($goods_category as $key => $value) {
						
					 	echo "<li class='category_one'><span class='oone'>".$value['cat_name']."</span>";	
					 	echo "<ul >"; 	
					 	foreach ($value as $kv => $vv) {
							if(is_array($vv)){
								echo "<li class='category_two'><span class='ttwo'>".$vv['cat_name']."</span>";
								foreach ($vv as $k => $v) {
									if(is_array($v)){
										echo "<ul >"; 
										echo "<li class='category_three'><span>".$v['cat_name']."</span></li>";
										echo "</ul>";
									}
								}
								echo "</li>";
					 		}
					 	}
					 	echo "</ul></li>";
					}
				?>
				</ul>
			</span>
			<select class="goods-all" >
				<option>所有产品</option>
				<?php
					foreach ($goods_brand as $key => $value) {
						echo '<option value="'.$value['Id'].'" name="qqq">'.$value['goods_brand_name'].'</option>';
					}
				?>
			</select>		
			<select class="goods-kind">
				<option>全部</option>
				<option value="is_best">精品</option>
				<option value="is_new">新品</option>
				<option value="is_hot">热销</option>
				<option value="is_promote">特价</option>
				<option value="all_type">全部推荐</option>
			</select>
			<select class="goods-status">
				<option>全部</option>
				<option value="is_best">上架</option>
				<option value="is_new">下架</option>
			</select>
			<span style="color: #8c949b;">&nbsp;&nbsp;关键字</span>
			<input type="text" size="29px" class="keys" style="height: 30px;">
		</div>
		<input type="button" value="搜索"  class="goods-search-botton"></input>
	</div>
	<div class="goods-info">
		<table >
			<tr>
				<td class="goods-id"><input type="checkbox"/>&nbsp;&nbsp;编号</td>
				<td class="goods-name">商品名称</td>
				<td class="goods-member">货号</td>
				<td class="goods-price">价格</td>
				<td class="goods-statu">上架</td>
				<td class="goods-statu">精品</td>
				<td class="goods-statu">新品</td>
				<td class="goods-statu">热销</td>
				<td class="goods-num">库存</td>
				<td class="goods-operate">操作</td>
			</tr>	
			<tbody class="goodsInfo">		
<?php
	$goodsAllInfo = array();
	foreach ($goods_info as $key => $value) {
		$goodsAllInfo[$key] = $value;
		if($value['ground'] == "0"){
			$goodsAllInfo[$key]['ground_name'] = '<img src="../images/no.gif">';
		}
		else if($value['ground'] == "1"){
			$goodsAllInfo[$key]['ground_name'] = '<img src="../images/yes.gif">';
		}
		if($value['good'] == "0"){
			$goodsAllInfo[$key]['good_name'] = '<img src="../images/no.gif">';
		}
		else if($value['good'] == "1"){
			$goodsAllInfo[$key]['good_name'] = '<img src="../images/yes.gif">';
		}
		if($value['new_goods'] == "0"){
			$goodsAllInfo[$key]['new_goods_name'] = '<img src="../images/no.gif">';
		}
		else if($value['new_goods'] == "1"){
			$goodsAllInfo[$key]['new_goods_name'] = '<img src="../images/yes.gif">';
		}
		if($value['sale_hot'] == "0"){
			$goodsAllInfo[$key]['sale_hot_name'] = '<img src="../images/no.gif">';
		}
		else if($value['sale_hot'] == "1"){
			$goodsAllInfo[$key]['sale_hot_name'] = '<img src="../images/yes.gif">';
		}		
	}	
	foreach ($goodsAllInfo as $key => $value) {	
		echo <<<EOF
			
				<tr>
					<td class="goods-id"><input type="checkbox"/>&nbsp;&nbsp;{$value['Id']}</td>
					<td class="goods-name">{$value['goods_name']}</td>
					<td class="goods-member">{$value['goods_number']}</td>
					<td class="goods-price">{$value['goods_price']}</td>
					<td class="goods-status">{$value['ground_name']}</td>
					<td class="goods-status">{$value['good_name']}</td>
					<td class="goods-status">{$value['new_goods_name']}</td>
					<td class="goods-status">{$value['sale_hot_name']}</td>
					<td class="goods-num">{$value['goods_num']}</td>
					<td class="goods-operate"><a href="/admin.php/goods/addlist?id={$value['Id']}" data-id="{$value['Id']}" class="update">修改</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/admin.php/goods/del/id/{$value['Id']}" class="delete" data-id="{$value['Id']}">删除</a></td>
				</tr>
			
EOF;
}								
?>	
		</tbody>
		</table>

		<div class="page" >
			<?= LinkPager::widget([ 
			    'pagination' => $pages, 
			    'nextPageLabel' => '下一页', 
			    'prevPageLabel' => '上一页', 
			    'firstPageLabel' => '首页', 
			    'lastPageLabel' => '尾页', 
			]);?>
			
		</div>
	</div>
	
	
</div>


