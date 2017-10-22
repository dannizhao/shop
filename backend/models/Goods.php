<?php
	namespace backend\models;
	use yii\base\Model;
	use yii\captcha\captcha;

	class Goods extends Model
	{
		public function selectGoodsInfo()
	    {
	    	$sql    = "select * from goods_list";
	    	$result = \Yii::$app->db->createCommand($sql)->queryAll();
	        return $result;
	    }

	    public function selectGoodsCountInfo()
	    {
	    	$sql    = "select count(*) from goods_list";
	    	$result = \Yii::$app->db->createCommand($sql)->queryAll();
	        return $result;
	    }

	    public function selectGoodsStatus()
	    {
	    	$sql    = "select * from goods_status";
	    	$result = \Yii::$app->db->createCommand($sql)->queryAll();
	        return $result;
	    }

	    public function selectGoodsBrand()
	    {
	    	$sql    = "select * from goods_brand";
	    	$result = \Yii::$app->db->createCommand($sql)->queryAll();
	        return $result;
	    }

	    public function selectGoodsCategory()
	    {
	    	$sql    = "select * from goods_category";
	    	$result = \Yii::$app->db->createCommand($sql)->queryAll();
	        return $result;
	    }

	    public function selectSearchGoods($info)
	    {
	    	$category = \Yii::$app->db->createCommand("select * from goods_category")->queryAll();
	    	$catid = "";
	    	foreach ($category as $key => $value) {
	    		if($value['cat_name'] == $info['goods_category']){
	    			$catid = $value['Id'];
	    		}
	    	}
	    	if($info['goods_category'] == "" && $info['status'] == "" && $info['goods_ground'] == "" && $info['goods_all'] == "" && $info['search'] != "" ){
	    		$sql = " goods_name like '%{$info['search']}%' ";
	    	}
	    	else if($info['goods_category'] == "" && $info['status'] == "" && $info['search'] == ""  && $info['goods_all'] == "" && $info['goods_ground'] != "" ){
	    		$sql = " ground = '{$info['goods_ground']}' ";
	    	}
	    	else if($info['goods_category'] == "" && $info['goods_ground'] == "" && $info['search'] == ""  && $info['goods_all'] == "" && $info['status'] != "" ){
	    		if($info['status'] == "all"){
	    			$sql = "";
	    		}	    		
	    		else{
	    			$sql = " {$info['status']} = 1 ";
	    		}    		
	    	}
	    	else if($info['goods_category'] == "" && $info['status'] == "" && $info['search'] == "" && $info['goods_ground'] == ""  && $info['goods_all'] != ""){
	    		$sql = " goods_name like '%{$info['goods_all']}%' ";
	    	}
	    	else if($info['goods_category'] == "" && $info['status'] != "" && $info['search'] == "" && $info['goods_ground'] == ""  && $info['goods_all'] != ""){
	    		if($info['status'] == "all"){
	    			$sql = " goods_name like '%{$info['goods_all']}%' ";
	    		}	    		
	    		else{
	    			$sql = " goods_name like '%{$info['goods_all']}%' and {$info['status']} = 1";
	    		} 
	    	}
	    	else if($info['goods_category'] == "" && $info['status'] == "" && $info['search'] == "" && $info['goods_ground'] != ""  && $info['goods_all'] != ""){
	    		$sql = " goods_name like '%{$info['goods_all']}%' and ground = '{$info['goods_ground']}'";
	    	}
	    	else if($info['goods_category'] == "" && $info['status'] == "" && $info['search'] != "" && $info['goods_ground'] == ""  && $info['goods_all'] != ""){
	    		$sql = " goods_name like '%{$info['goods_all']}%' or goods_name like '%{$info['search']}%'";
	    	}
	    	else if($info['goods_category'] == "" && $info['status'] != "" && $info['search'] == "" && $info['goods_ground'] != ""  && $info['goods_all'] != ""){

	    		if($info['status'] == "all"){
	    			$sql = " goods_name like '%{$info['goods_all']}%' and ground = '{$info['goods_ground']}' ";
	    		}	    		
	    		else{
	    			$sql = " goods_name like '%{$info['goods_all']}%' and ground = '{$info['goods_ground']}'  and {$info['status']} = 1";
	    		}
	    	}
	    	else if($info['goods_category'] == "" && $info['status'] != "" && $info['search'] == "" && $info['goods_ground'] != ""  && $info['goods_all'] == ""){
	    		if($info['status'] == "all"){
	    			$sql = "  ground = '{$info['goods_ground']}' ";
	    		}	    		
	    		else{
	    			$sql = " ground = '{$info['goods_ground']}'  and {$info['status']} = 1";
	    		}
	    		
	    	}
	    	else if($info['goods_category'] == "" && $info['status'] != "" && $info['search'] != "" && $info['goods_ground'] == ""  && $info['goods_all'] == ""){
	    		if($info['status'] == "all"){
	    			$sql = "  goods_name like '%{$info['search']}%' ";
	    		}	    		
	    		else{
	    			$sql = " goods_name like '%{$info['search']}%' and {$info['status']} = 1";
	    		}
	    		
	    	}
	    	else if($info['goods_category'] == "" && $info['status'] == "" && $info['search'] != "" && $info['goods_ground'] != ""  && $info['goods_all'] == ""){
	    		$sql = " goods_name like '%{$info['search']}%' and ground = '{$info['goods_ground']}' ";
	    	}
	    	else if($info['goods_category'] == "" && $info['status'] != "" && $info['search'] != "" && $info['goods_ground'] != ""  && $info['goods_all'] != ""){
	    		if($info['status'] == "all"){
	    			$sql = " goods_name like '%{$info['search']}%' or goods_name like '%{$info['goods_all']}%'and ground = '{$info['goods_ground']}'  ";
	    		}	    		
	    		else{
	    			$sql = " goods_name like '%{$info['search']}%' or goods_name like '%{$info['goods_all']}%' and ground = '{$info['goods_ground']}' and {$info['status']} = 1 ";
	    		}
	    		
	    	}
	    	else if($info['goods_category'] != "" && $info['status'] == "" && $info['search'] == "" && $info['goods_ground'] == ""  && $info['goods_all'] == ""){
	    		$sql = "  cat_id = '{$catid}' ";		
	    	} 
	    	else if($info['goods_category'] != "" && $info['status'] == "" && $info['search'] == "" && $info['goods_ground'] == ""  && $info['goods_all'] != ""){
	    		$sql = " goods_name like '%{$info['goods_all']}%' and cat_id = '{$catid}' ";	    		
	    	}    
	    	else if($info['goods_category'] != "" && $info['status'] != "" && $info['search'] == "" && $info['goods_ground'] == ""  && $info['goods_all'] == ""){
	    		if($info['status'] == "all"){
	    			$sql = " cat_id = '{$catid}' ";	
	    		}	    		
	    		else{
	    			$sql = " {$info['status']} = 1 and cat_id = '{$catid}' ";	   
	    		}   		    		
	    	}	
	    	else if($info['goods_category'] != "" && $info['status'] == "" && $info['search'] == "" && $info['goods_ground'] != ""  && $info['goods_all'] == ""){
	    		$sql = " ground = '{$info['goods_ground']}' and cat_id = '{$catid}' ";	    		
	    	} 
	    	else if($info['goods_category'] != "" && $info['status'] == "" && $info['search'] != "" && $info['goods_ground'] == ""  && $info['goods_all'] == ""){
	    		$sql = " goods_name like '%{$info['search']}%'  and cat_id = '{$catid}' ";	    		
	    	} 
	    	else if($info['goods_category'] != "" && $info['status'] != "" && $info['search'] == "" && $info['goods_ground'] == ""  && $info['goods_all'] != ""){
	    		$sql = " goods_name like '%{$info['goods_all']}%'  and cat_id = '{$catid}' and {$info['status']} = 1 ";	
	    		   		
	    	}

	    	else if($info['goods_category'] != "" && $info['status'] != "" && $info['search'] == "" && $info['goods_ground'] != ""  && $info['goods_all'] != ""){
	    		if($info['status'] == "all"){
	    			$sql = " goods_name like '%{$info['goods_all']}%'  and cat_id = '{$catid}'  and ground = '{$info['goods_ground']}'";		
	    		}	    		
	    		else{
	    			$sql = " goods_name like '%{$info['goods_all']}%'  and cat_id = '{$catid}' and {$info['status']} = 1 and ground = '{$info['goods_ground']}'";	   
	    		} 	    			    		   		
	    	}
	    	else if($info['goods_category'] != "" && $info['status'] != "" && $info['search'] != "" && $info['goods_ground'] != ""  && $info['goods_all'] != ""){
	    		$sql = " goods_name like '%{$info['goods_all']}%'  and cat_id = '{$catid}' and {$info['status']} = 1 and ground = '{$info['goods_ground']}' and  goods_name like '%{$info['search']}%'";	    		
	    	}

	    	//$result = \Yii::$app->db->createCommand($sql)->queryAll();
	        return $sql;
	    }
	    //添加商品信息
	    public function insertGoodsInfo($info)
	    {
	    	if(empty($info['goodsNum'])){
	    		$goods_num = "G";
                $sql    = "select max(goods_number) as goods_num from  goods_list where goods_number like '%G%' ";
	    		$result = \Yii::$app->db->createCommand($sql)->queryAll();
	    		$goods_num .= substr($result[0]['goods_num'],1)+1;
            }
            else{
            	$goods_num = $info['goodsNum'];
            }
	    	$start = strtotime($info['romote_start']);
	    	$end = strtotime($info['romote_end']);
	    	$limit_start = strtotime($info['limit_start']);
	    	$limit_end = strtotime($info['limit_end']);
	    	//商品表添加数据
	    	/*$sql = "insert into goods_list(goods_name,goods_number,cat_id,extend,brand_id,goods_price,market_price,sale_point,grade_point,pre_num,pre_price,romote_price,romote_start,romote_end,limit_num,limit_start,limit_end,up_img,thumb) values('{$info['goodsName']}','{$goods_num}','{$info['goodsKind']}','{$info['goodsExtend']}','{$info['brandText']}','{$info['marketSale']}','{$info['price']}','{$info['sale_point']}','{$info['grade_point']}','{$info['pre_num']}','{$info['pre_price']}','{$info['romote_price']}','{$start}','{$end}','{$info['limit_num']}','{$limit_start}','{$limit_end}','{$info['up_img']}','{$info['thumb']}')";
	    	$result = \Yii::$app->db->createCommand($sql)->execute();*/
	    	//商品表添加数据 框架自带方法
	    	$about_info = ['goods_name'=>$info['goodsName'],
	    				   'goods_number'=>$goods_num,
	    				   'cat_id'=>$info['goodsKind'],
	    				   'extend'=>$info['goodsExtend'],
	    				   'brand_id'=>$info['brandText'],
	    				   'goods_price'=>$info['marketSale'],
	    				   'market_price'=>$info['price'],
	    				   'sale_point'=>$info['sale_point'],
	    				   'grade_point'=>$info['grade_point'],
	    				   'pre_num'=>$info['pre_num'],
	    				   'pre_price'=>$info['pre_price'],
	    				   'romote_price'=>$info['romote_price'],
	    				   'romote_start'=>$start,
	    				   'romote_end'=>$end,
	    				   'limit_num'=>$info['limit_num'],
	    				   'limit_start'=>$limit_start,
	    				   'limit_end'=>$limit_end,
	    				   'up_img'=>$info['up_img'],
	    				   'thumb'=>$info['thumb']];
	    	$result = \Yii::$app->db->createCommand()->insert("goods_list",$about_info)->execute();
	        return $result;
	    }
	    //删除商品信息
	    public function delGoodsInfo($id){
	    	$result = \Yii::$app->db->createCommand()->delete("goods_list",["Id"=>$id])->execute();
	        return $result;
	    }
	    //查询某条商品的信息
	    public function selGoodsInfoById($id){
	    	$sql = "select * from goods_list where Id='{$id}'";
	    	$result = \Yii::$app->db->createCommand($sql)->queryAll();
	        return $result;
	    }
	    //修改某条商品的信息
	    public function updateGoodsInfoById($info){
	    	$start = strtotime($info['romote_start']);
	    	$end = strtotime($info['romote_end']);
	    	$limit_start = strtotime($info['limit_start']);
	    	$limit_end = strtotime($info['limit_end']);
	    	//修改商品表的相关数据 框架自带方法
	    	$about_info = ['goods_name'=>$info['goodsName'],
	    				   'goods_number'=>$info['goodsNum'],
	    				   'cat_id'=>$info['goodsKind'],
	    				   'extend'=>$info['goodsExtend'],
	    				   'brand_id'=>$info['brandText'],
	    				   'goods_price'=>$info['marketSale'],
	    				   'market_price'=>$info['price'],
	    				   'sale_point'=>$info['sale_point'],
	    				   'grade_point'=>$info['grade_point'],
	    				   'pre_num'=>$info['pre_num'],
	    				   'pre_price'=>$info['pre_price'],
	    				   'romote_price'=>$info['romote_price'],
	    				   'romote_start'=>$start,
	    				   'romote_end'=>$end,
	    				   'limit_num'=>$info['limit_num'],
	    				   'limit_start'=>$limit_start,
	    				   'limit_end'=>$limit_end,
	    				   'up_img'=>$info['up_img'],
	    				   'thumb'=>$info['thumb']];
	    	$result = \Yii::$app->db->createCommand()->update("goods_list",$about_info,"Id = '{$info['goods_id']}'")->execute();
	        return $result;
	    }
	    //添加分类
	    public function insertKinds($name){
	    	$result = \Yii::$app->db->createCommand()->insert("goods_category",["cat_name"=>$name['text'],"parent_id"=>$name['parent']])->execute();
	        return $result;
	    }

	}

	
	
?>