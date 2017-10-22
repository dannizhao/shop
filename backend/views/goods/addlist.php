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
		<div class="add-new-goods" ><a href="/admin.php/goods/list">商品列表</a></div>
	</div>
	<div class="add-new-goods-menu">
		<div class="add-new-goods-head">
			<span class="add-new-goods-list">通用信息</span>
			<span class="add-new-goods-list">详细描述</span>
			<span class="add-new-goods-list">其他信息</span>
			<span class="add-new-goods-list">商品属性</span>
			<span class="add-new-goods-list">商品相册</span>
			<span class="add-new-goods-list">关联商品</span>
			<span class="add-new-goods-list">配件</span>
			<span class="add-new-goods-list">关联文章</span>
		</div>		
		<div class="add-new-goods-info">
			<table >
				<tr>
					<th>商品名称：</th>
					<td width = "220px"><input type="text" style="width: 220px;border: 1px solid #ddd;height: 30px" class="goods_name" value="<?php if(!empty($goods_info)){echo $goods_info[0]['goods_name'];}?>"></td>
					<td class='goods-color' >
						<img src="../images/color_selecter.gif">
						<table  bordercolor="#BDBBBC" border="1" >
							<tr>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#FFFFFF">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#C0C0C0">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#969696">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#808080">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#333333">&nbsp;</td>
							</tr>
							<tr>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#CC99FE">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#993365">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#81007F">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#6766CC">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#343399">&nbsp;</td>
							</tr>
							<tr>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#BBBBBB">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#00CCFF">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#3366FF">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#0000FE">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#010080">&nbsp;</td>
							</tr>
							<tr>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#CDFFFF">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#01FFFF">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#33CBCC">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#008081">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#003265">&nbsp;</td>
							</tr>
							<tr>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#CDFFCC">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#00FF01">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#339967">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#008002">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#013300">&nbsp;</td>
							</tr>
							<tr>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#FFFE99">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#FFFE03">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#99CD00">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#807F01">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#333301">&nbsp;</td>
							</tr>
							<tr>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#FFCB99">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#FFCD00">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#FF9900">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#FD6600">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#993400">&nbsp;</td>
							</tr>
							<tr>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#FF99CB">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#FF00FE">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#FE0000">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#800000">&nbsp;</td>
								<td style="border: 1px solid rgb(189, 187, 188);" bgcolor="#000000">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="5" style="border: 1px solid rgb(189, 187, 188);" align="center"><font style="cursor:default">无样式</font>
								</td>
							</tr>
						</table>
					</td>
					<td  colspan="2">
						<select class='goods-font'>
							<option value="a">字体样式</option>
							<option value="b">加粗</option>
							<option value="em">斜体</option>
							<option value="u">下划线</option>
							<option value="strike">删除线</option>
						</select>
						<span class="require-field">*</span>
					</td>
				</tr>
				<tr>
					<th style="text-align: right;"><img src="../images/notice.gif">商品货号：</th>
					<td colspan="4"><input type="text" style="width: 210px;border: 1px solid #ddd;height: 30px" class="goods_sn" value="<?php if(!empty($goods_info)){echo $goods_info[0]['goods_number'];}?>"><br/>
					<span class = "notice-span">如果您不输入商品货号，系统将自动生成一个唯一的货号。</span>
					</td>
				</tr>
				<tr>					
					<th>商品分类：</th>
					<td style="position: relative;"><input type="text" style="width: 210px;border: 1px solid #ddd;height: 30px" class="goods_kinds" value="<?php 
					if(!empty($goods_info)){
						foreach ($goods_info as $key => $value) {
							foreach ($goods_category as $k => $v) {
								if($v['Id'] == $value['cat_id']){
									echo $v['cat_name'];
								}
							}
						}
					}
					?>" <?php if(!empty($goods_info)){echo "data-id=".$goods_info[0]['cat_id'];}?>>
					<div id="goods_modal">
			<ul >
			<?php 
				foreach ($goods_category as $key => $value) {
					
				 	echo "<li class='category_one'><span class='oone' data-id='".$value['Id']."'>".$value['cat_name']."</span>";	
				 	echo "<ul >"; 	
				 	foreach ($value as $kv => $vv) {
						if(is_array($vv)){
							echo "<li class='category_two'><span class='ttwo' data-id='".$vv['Id']."'>".$vv['cat_name']."</span>";
							foreach ($vv as $k => $v) {
								if(is_array($v)){
									echo "<ul >"; 
									echo "<li class='category_three'><span data-id='".$v['Id']."'>".$v['cat_name']."</span></li>";
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
		</div>
					</td>
					<td colspan="3"><span class="add-kinds">添加分类</span>
						<input type="text" style="width:75px;border: 1px solid #ddd;height: 20px;display: none;" class="add-kinds-text">
						<input type="button" style="background-color: #ddd;display: none;" value="确定" class="add-kinds-button">
						<span class="require-field">*</span>
					</td>	
				</tr> 
				<tr>					
					<th >扩展分类：</th>
					<td colspan="4">
						<!-- <input type="botton" value="添加" class="add-goods-botton" id="add-extend-kind"> -->
						<select class='goods-extend' id='goods-extend'  
						>
							<option>请选择...</option>
			
			<?php 
				/*foreach ($goods_category as $key => $value) {
					
				 	echo "<option>".$value['cat_name']."</option>";		
				 	foreach ($value as $kv => $vv) {
						if(is_array($vv)){
							echo "<option>&nbsp;&nbsp;&nbsp;&nbsp;".$vv['cat_name']."</option>";
							foreach ($vv as $k => $v) {
								if(is_array($v)){
									echo "<option>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$v['cat_name']."</option>";
								}
							}
				 		}
				 	}
				}*/
				if(!empty($goods_info)){
					foreach ($goods_info as $k => $v) {
						foreach ($goods_category as $key => $value) {
							if($value['cat_name'] == $v['extend']){
								$isSelect = "selected='selected'";	
							}
							else{
								$isSelect ="";	
							}
							echo "<option".$isSelect.">".$value['cat_name']."</option>";
							foreach ($value as $kv => $vv) {
								if(is_array($vv)){
									if($vv['cat_name'] == $v['extend']){
										$isSelect = "selected='selected'";		
									}
									else{
										$isSelect ="";
									}
									echo "<option ".$isSelect.">&nbsp;&nbsp;&nbsp;&nbsp;".$vv['cat_name']."</option>";
									foreach ($vv as $ks => $vs) {
										if(is_array($vs)){
											if($vs['cat_name'] == $v['extend']){
												$isSelect = "selected='selected'";	
											}
											else{
												$isSelect ="";
											}
											echo "<option ".$isSelect.">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$vs['cat_name']."</option>";
										}
									}
						 		}
						 	}
						}
					}
				}
				else{
					foreach ($goods_category as $key => $value) {					
					 	echo "<option>".$value['cat_name']."</option>";		
					 	foreach ($value as $kv => $vv) {
							if(is_array($vv)){
								echo "<option>&nbsp;&nbsp;&nbsp;&nbsp;".$vv['cat_name']."</option>";
								foreach ($vv as $k => $v) {
									if(is_array($v)){
										echo "<option>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$v['cat_name']."</option>";
									}
								}
					 		}
					 	}
					}
				}
			?>

						</select>
					</td>					
				</tr> 
				<tr>					
					<th>商品品牌：</th>
					<td style="position: relative;">
						<input type="text" style="width:210px;border: 1px solid #ddd;height: 30px;" class="brand-text"  data-id="<?php if(!empty($goods_info)){echo $goods_info[0]['brand_id'];}?>" value="<?php 
						if(!empty($goods_info)){
							foreach ($goods_info as $key => $value) {
								foreach ($goods_brand as $k => $v) {
									if($v['Id'] == $value['brand_id']){
										echo $v['goods_brand_name'];
									}
								}
							}
						}
						else{
							echo '请输入......';
						}
						?>">
						<select class="brand" id="brand" onChange="GaiBian(this)">
							
			<?php
				foreach ($goods_brand as $key => $value) {
					echo '<option value="'.$value['Id'].'" data-id="'.$value['goods_brand_name'].'" >'.$value['goods_brand_name'].'</option>';
				}
			?>
						</select>
					</td>
					<td colspan="3" >
						<span class="add-brand">添加品牌</span>
						<input type="text" style="width:75px;border: 1px solid #ddd;height: 30px;display: none;" class="add-brand-text">
						<input type="button" style="background-color: #ddd;display: none;" value="确定" class="add-brand-botton">
						
					</td>		
				</tr>
				<tr>					
					<th>本店售价：</th>
					<td>
						<input type="text"  style="width: 210px;border: 1px solid #ddd;height: 30px" class="price" value="<?php if(!empty($goods_info)){echo $goods_info[0]['market_price'];}else{echo '0';}?>">
					</td>
					<td colspan="3"><input type="botton" value="按市场价计算" class="add-goods-botton" style="width: 90px;"> <span class="require-field">*</span> </td>		
				</tr>
				<tr>										
					<th><img src="../images/notice.gif">会员价格：</th>
					<td colspan="4">
						普通会员<input type="text" value="-1" style="width: 100px;border: 1px solid #ddd;height: 30px" class="huiyuan" disabled="disabled">
						qq<input type="text" value="-1" style="width: 100px;border: 1px solid #ddd;height: 30px" class="huiyuan_qq" disabled="disabled">
						铜牌会员<input type="text" value="-1" style="width: 100px;border: 1px solid #ddd;height: 30px" class="huiyuan_tp" disabled="disabled"> 
						金牌会员<input type="text" value="-1" style="width: 100px;border: 1px solid #ddd;height: 30px" class="huiyuan_jp" disabled="disabled">
						<br/>
						<span class="notice-span" >会员价格为-1时表示会员价格按会员等级折扣率计算。你也可以为每个等级指定一个固定价格</span>
					</td>	
				</tr>
				<tr>							
					<th><img src="../images/notice.gif">商品优惠价格：</th>
					<td  colspan="4">
						<a>[+]</a>
						 优惠数量&nbsp;&nbsp;<input   type="text" style="width: 210px;border: 1px solid #ddd;height: 30px" class="pre_num" value="<?php if(!empty($goods_info)){echo $goods_info[0]['pre_num'];}else{echo '';}?>">
						优惠价格&nbsp;&nbsp;<input    type="text" style="width: 210px;border: 1px solid #ddd;height: 30px" class="pre_price" value="<?php if(!empty($goods_info)){echo $goods_info[0]['pre_price'];}else{echo '';}?>"><br/>
						<span class="notice-span">购买数量达到优惠数量时享受的优惠价格</span>
					</td>				
				</tr>
				<tr>					
					<th>市场售价：</th>
					<td>
						<input type="text"  style="width: 210px;border: 1px solid #ddd;height: 30px" class="marketSale" value="<?php if(!empty($goods_info)){echo $goods_info[0]['goods_price'];}else{echo '0';}?>">
					</td>
					<td colspan="3"><input type="botton" value="取整数" class="add-goods-botton" id="marketSale-botton"></td>		
				</tr> 

				<tr>							
					<th><img src="../images/notice.gif">赠送消费积分数：</th>
					<td  colspan="4">
						<input   type="text" style="width: 210px;border: 1px solid #ddd;height: 30px" class="sale_point" value="<?php if(!empty($goods_info)){echo $goods_info[0]['sale_point'];}else{echo '-1';}?>"><br/>
						<span class="notice-span">购买该商品时赠送消费积分数,-1表示按商品价格赠送</span>
					</td>				
				</tr> 
				<tr>							
					<th><img src="../images/notice.gif">赠送等级积分数：</th>
					<td  colspan="4">
						<input   type="text" style="width: 210px;border: 1px solid #ddd;height: 30px" class="grade_point" value="<?php if(!empty($goods_info)){echo $goods_info[0]['grade_point'];}else{echo '-1';}?>"><br/>
						 	<span class="notice-span">购买该商品时赠送等级积分数,-1表示按商品价格赠送</span>
					</td>				
				</tr>
				<tr>							
					<th><input type="checkbox" name="ckbox" value="1">&nbsp;&nbsp;促销价：</th>
					<td  colspan="4">
						<input   type="text" style="width: 210px;border: 1px solid #ddd;height: 30px; background:#ddd;" disabled="disabled" class="is_write" value="<?php if(!empty($goods_info)){echo $goods_info[0]['romote_price'];}else{echo '0';}?>"><br/>
					</td>				
				</tr>
				<tr>							
					<th>促销日期：</th>
					<td colspan="4">
						<input placeholder="请输入起始日期" class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD'})" id="romote_start" value="<?php if(!empty($goods_info)){echo date('Y-m-d', $goods_info[0]['romote_start']);}else{echo '0';}?>"> - 
						<input placeholder="请输入结束日期" class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD'})" id="romote_end" value="<?php if(!empty($goods_info)){echo date('Y-m-d',$goods_info[0]['romote_end']);}else{echo '0';}?>">
					</td>
				</tr>
				<tr>							
					<th><input type="checkbox" name="sale-number">&nbsp;&nbsp;限购数量：</th>
					<td  colspan="4">
						<input   type="text" style="width: 210px;border: 1px solid #ddd;height: 30px; background:#ddd;" class="sale-number" disabled="" value="<?php if(!empty($goods_info)){echo $goods_info[0]['limit_num'];}else{echo '0';}?>"><br/>
						 	<span class="notice-span">表示限购日期内，每个用户最多只能购买多少件。0：表示不限购</span>
					</td>				
				</tr>
				<tr>							
					<th>限购日期：</th>
					<td colspan="4">
						<input placeholder="请输入起始日期" class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD'})" id="limit_start" value="<?php if(!empty($goods_info)){echo date('Y-m-d',$goods_info[0]['limit_start']);}else{echo '0';}?>"> - 
						<input placeholder="请输入结束日期" class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD'})" id="limit_end" value="<?php if(!empty($goods_info)){echo date('Y-m-d',$goods_info[0]['limit_start']);}else{echo '0';}?>">
					</td>
				</tr>
				<tr>							
					<th>上传商品图片：</th>
					<td  colspan="4">					
							<input   type="file" id="up_img">							
							<input type="submit" name="submit" value="上传商品图片" onClick="uploadImage()" />
							<img src="<?php if(!empty($goods_info)){echo $goods_info[0]['up_img'];}else{echo '';}?>" id="shangchuan" width="100px">
					</td>				
				</tr>
				<tr>							
					<th>上传商品缩略图：</th>
					<td  colspan="4" >
						<input  value="0" type="file" onChange="uploadThumb()" id="file" >
						<span><img src="<?php if(!empty($goods_info)){echo $goods_info[0]['thumb'];}else{echo '';}?>" id="thumb" width="100px" ></span>
					</td>				
				</tr>
				<tr>							
					<th style="color: red;">是否显示在频道首页：</th>
					<td  colspan="4" >
						<input type="checkbox"  >	打勾表示在频道首页显示，否则不显示。
						
					</td>				
				</tr>
				<tr style="text-align: center;">				
					<td  colspan="5">
						<input type="button" value="确定" class="add-goods-botton" id='<?php if(!empty($goods_info)){echo "update-goods-submit";}else{echo "add-goods-submit";}?>' onclick="isClick($(this).attr('id'))">
					</td>				
				</tr>
			</table>
		</div>
	</div>	
	
	<script type="text/javascript">
		
	</script>
</div>


