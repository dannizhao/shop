<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\admin;
use backend\models\goods;
use yii\web\Session;
use yii\data\Pagination;
/**
 * Site controller
 */
class GoodsController extends Controller
{
    public $defaultAction = 'index';
    public function actions(){
                return [
                    'error' => [
                        'class' => 'yii\web\ErrorAction',
                    ],
                    'captcha' => [
                        'class' => 'yii\captcha\CaptchaAction',
                        'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                    ],
                ];
        }
    //商品列表 
    public function actionList()
    {
        $session = Yii::$app->session;
        if(empty($session->get('adminuser_info'))){
            $this->redirect('/admin.php/admin/login');
            return true;
        }
        $goods      = (new \yii\db\Query())->select([])->from('goods_list');
        $pagination = new Pagination(['totalCount' => $goods->count(), 'defaultPageSize' => 10, ]);
        $goods_info = $goods->offset($pagination->offset)->limit($pagination->limit)->createCommand()->queryAll();
        $category_one   = array();
        $category_two   = array();
        $category_three = array();
        $goods_list     = new Goods();
        $goods_status   = $goods_list->selectGoodsStatus();
        $goods_brand    = $goods_list->selectGoodsBrand();
        $goods_kind     = $goods_list->selectGoodsCategory();

        foreach ($goods_kind as $key => $value) {
            if($value['parent_id'] == 0 ){
                $category_one[$key] = $value;
            }
        }
        foreach ($category_one as $key => $value) {
            $category_two[$key] = $value;
            foreach ($goods_kind as $k => $v) {
                if($value['Id'] == $v['parent_id'] ){
                    $category_two[$key][$k] =$v;
                }
            }
        }
        foreach ($category_two as $key => $value  ) {
            $category_three[$key] = $value;
            foreach ($value as $kv => $vv) {
                if(is_array($vv)){
                    foreach ($goods_kind as $k => $v) {
                        if($vv['Id'] == $v['parent_id'] ){
                            $category_three[$key][$kv][$k] =$v;
                        }
                    }
                }
            }           
        }
        return $this->render(
            'list',
                [   'goods_info' => $goods_info,
                    'goods_brand' => $goods_brand,
                    'goods_category' => $category_three,
                    'pages' => $pagination,
                    'goods_status' => $goods_status
                ]
            );

        $model      = new Admin();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }
            return $this->refresh();
        } else {
            return $this->render('list', [
                'model' => $model,
            ]);
        }
    }
    //商品搜索
    public function actionSearch()
    {
        if (Yii::$app->request->isAjax && yii::$app->request->isPost) { 
            $post       = yii::$app->request->Post();
            $goods_list = new Goods();
            if($post['status'] != "is_promote"){
                $search_result  = $goods_list->selectSearchGoods($post);
                $goods      = (new \yii\db\Query())->select([])->from('goods_list')->where($search_result);
                $pagination = new Pagination(['totalCount' => $goods->count(), 'defaultPageSize' => 15, ]);                
                $goods_info = $goods->offset($pagination->offset)->limit($pagination->limit)->createCommand()->queryAll();
                $goods_info['page'] = $pagination ;
                $result  =  json_encode($goods_info);
                exit($result);
            } 
            else{ 
                $result  =  json_encode('');
                exit($result); 
            }  
        }
    }
    //添加新商品
    public function actionAddlist()
    {
        $session = Yii::$app->session;
        if(empty($session->get('adminuser_info'))){
            $this->redirect('/admin.php/admin/login');
            return true;
        }
        if (!empty(Yii::$app->request->Get())) 
        {
            $post = Yii::$app->request->Get();            
            $goods = new Goods();
            $rs = $goods->selGoodsInfoById($post['id']);
        }
        else{ $rs = ""; }
        $goods_list     = new Goods();
        $category_one   = array();
        $category_two   = array();
        $category_three = array();
        $goods_kind     = $goods_list->selectGoodsCategory();
        $goods_brand    = $goods_list->selectGoodsBrand();
        foreach ($goods_kind as $key => $value) {
            if($value['parent_id'] == 0 ){
                $category_one[$key] = $value;
            }
        }
        foreach ($category_one as $key => $value) {
            $category_two[$key] = $value;
            foreach ($goods_kind as $k => $v) {
                if($value['Id'] == $v['parent_id'] ){
                    $category_two[$key][$k] =$v;
                }
            }
        }
        foreach ($category_two as $key => $value  ) {
            $category_three[$key] = $value;
            foreach ($value as $kv => $vv) {
                if(is_array($vv)){
                    foreach ($goods_kind as $k => $v) {
                        if($vv['Id'] == $v['parent_id'] ){
                            $category_three[$key][$kv][$k] =$v;
                        }
                    }
                }
            }           
        }
        return $this->render(
            'addlist',
                ['goods_category' => $category_three,
                 'goods_brand' => $goods_brand,
                 'goods_info' => $rs,
                ]
            );
        $model      = new Admin();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }
            return $this->refresh();
        } else {
            return $this->render('addlist', [
                'model' => $model,
            ]);
        }
    }
    //上传商品图片
    public function actionUpload()
    {       
        if (Yii::$app->request->isPost) 
        {
            if(!$_FILES['file']){
                $res = array("status" => "400","msg" => "请上传图片！");
                exit(json_encode($res));
            } 

            $picname = $_FILES['file']['name']; 
            $picsize = $_FILES['file']['size']; 
            if ($picname != "") { 
                if($_FILES['file']['type'] == "image/jpeg" || $_FILES['file']['type'] == "image/gif" || $_FILES['file']['type'] == "image/png"){
                    if ($picsize > 2014000) { //限制上传大小 
                        exit('{"status":0,"content":"图片大小不能超过2M"}');
                    } 
                    $type = strstr($picname, '.'); //限制上传格式 

                    if ($type != ".gif" && $type != ".jpg" && $type != ".png") {
                        exit('{"status":2,"content":"图片格式不对！"}');
                    }
                }
                else if($_FILES['file']['type'] == "application/octet-stream"){
                    if ($picsize > 2014000) { //限制上传大小 
                        exit('{"status":0,"content":"图片大小不能超过2M"}');
                    } 
                    $type = ""; //限制上传格式 
                    if ($type != ".gif" && $type != ".jpg" && $type != ".png") {
                        exit('{"status":2,"content":"图片格式不对！"}');
                    }
                }           
                $rand = rand(100, 999); 
                $pics = uniqid() . $type; //命名图片名称 
                //上传路径 
                $uploadPath = "upload/";
                if (! file_exists ( $uploadPath )) {
                  mkdir ( $uploadPath, 0777, true );
                  chmod ( $uploadPath, 0777 );
                }
                $pic_path = $uploadPath.$pics;

                if (! @move_uploaded_file ( $_FILES['file']['tmp_name'], $pic_path )) {
                    exit('{"status":0,"content":"上传失败！"}');
                }
            } 
            $size = round($picsize/1024,2); //转换成kb 
            $nc = '/';
            exit('{"status":1,"name":"'.$picname.'","url":"'.$nc.''.$pic_path.'","size":"'.$size.'","content":"上传成功"}');
        }
        
    }
    //上传商品缩略图
    public function actionThumb()
    {       
        if (Yii::$app->request->isPost) 
        {
            if(!$_FILES['file']){
                $res = array("status" => "400","msg" => "请上传图片！");
                exit(json_encode($res));
            } 

            $picname = $_FILES['file']['name']; 
            $picsize = $_FILES['file']['size']; 
            if ($picname != "") { 
                if($_FILES['file']['type'] == "image/jpeg" || $_FILES['file']['type'] == "image/gif" || $_FILES['file']['type'] == "image/png" ){
                    if ($picsize > 2014000) { //限制上传大小 
                        exit('{"status":0,"content":"图片大小不能超过2M"}');
                    } 
                    $type = strstr($picname, '.'); //限制上传格式 

                    if ($type != ".gif" && $type != ".jpg" && $type != ".png") {
                        exit('{"status":2,"content":"图片格式不对！"}');
                    }
                }
                else if($_FILES['file']['type'] == "application/octet-stream"){
                    if ($picsize > 2014000) { //限制上传大小 
                        exit('{"status":0,"content":"图片大小不能超过2M"}');
                    } 
                    $type = ""; //限制上传格式 
                    if ($type != ".gif" && $type != ".jpg" && $type != ".png") {
                        exit('{"status":2,"content":"图片格式不对！"}');
                    }
                }           
                $rand = rand(100, 999); 
                $pics = uniqid() . $type; //命名图片名称 
                //上传路径 
                $uploadPath = "upload/";
                if (! file_exists ( $uploadPath )) {
                  mkdir ( $uploadPath, 0777, true );
                  chmod ( $uploadPath, 0777 );
                }
                $pic_path = $uploadPath.$pics;
                $thumb_path = "thumb/".$pics;
                if (! @move_uploaded_file ( $_FILES['file']['tmp_name'], $pic_path )) {
                    exit('{"status":0,"content":"上传失败！"}');
                }
            } 
            $size = round($picsize/1024,2); //转换成kb 
            $nc = '/';         
            $per=0.3;           
            list($width, $height)=getimagesize("http://".$_SERVER['HTTP_HOST']."/admin.php/".$pic_path);
            $n_w=$width*$per;
            $n_h=$height*$per;
            $new=imagecreatetruecolor($n_w, $n_h);
            //上传gif图片    
            if($type == ".gif"){
                $img=@imagecreatefromgif("http://".$_SERVER['HTTP_HOST']."/admin.php/".$pic_path);
                //copy部分图像并调整
                imagecopyresized($new, $img,0, 0,0, 0,$n_w, $n_h, $width, $height);
                //图像输出新图片、另存为
                imagegif($new,$thumb_path);
            }
            else if($type == ".jpg"){
                $img=@imagecreatefromjpeg("http://".$_SERVER['HTTP_HOST']."/admin.php/".$pic_path);
                //copy部分图像并调整
                imagecopyresized($new, $img,0, 0,0, 0,$n_w, $n_h, $width, $height);
                //图像输出新图片、另存为
                imagegif($new,$thumb_path);
            }
            else if($type == ".png"){
                $img=@imagecreatefrompng("http://".$_SERVER['HTTP_HOST']."/admin.php/".$pic_path);
                //copy部分图像并调整
                imagecopyresized($new, $img,0, 0,0, 0,$n_w, $n_h, $width, $height);
                //图像输出新图片、另存为
                imagegif($new,$thumb_path);
            }
            imagedestroy($new);
            imagedestroy($img);
            exit('{"status":1,"name":"'.$picname.'","url":"'.$nc.''.$thumb_path.'","size":"'.$size.'","content":"缩略图上传成功"}');
        }
        
    }
    //添加商品
    public function actionAdd()
    {       
        if (Yii::$app->request->isPost) 
        {
            $post = Yii::$app->request->Post();
            
            $goods = new Goods();
            $rs = $goods->insertGoodsInfo($post);
            if($rs == false){
                exit("error");
            }
            exit("ok");
        }
    }
    //删除商品
    public function actionDel()
    {       
        if (Yii::$app->request->isPost) 
        {
            
            $post = Yii::$app->request->Post();
            
            $goods = new Goods();
            $rs = $goods->delGoodsInfo($post['id']);
            if($rs == false){
                exit("error");
            }
            exit("ok");
        }
    }
    //修改商品
    public function actionUpdate()
    {       
        if (Yii::$app->request->isPost) 
        {
            /*var_dump(Yii::$app->request->Post());
            exit;*/
            $post = Yii::$app->request->Post();
            $goods = new Goods();
            $rs = $goods->updateGoodsInfoById($post);
            if($rs == false){
                exit("error");
            }
            exit("ok");
        }
    }
    //添加分类
    public function actionAddkinds()
    {       
        if (Yii::$app->request->isPost) 
        {
            $post = Yii::$app->request->Post();
            $goods = new Goods();
            $rs = $goods->insertKinds($post);
            if($rs == false){
                exit("error");
            }
            exit("ok");
        }
    }
    //商品分类
    public function actionCategory(){
        $goods      = new Goods();
        $goods_list = $goods->selectGoodsInfo();
        $goods_cate = $goods->selectGoodsCategory();
        foreach ($goods_list as $key => $value) {
            foreach ($goods_cate as $k => $v) {
                if($value['cat_id'] == $v['Id']){
                    $goods_list[$key]['cate_name'] = $v['cat_name']; 
                    $goods_list[$key]['cate_num'] = $v['cat_num'];
                    $goods_list[$key]['cate_nav'] = $v['cat_nav'];
                    break;
                }
            }
        }
        return $this->render('category', [
            'goods_list' => $goods_list,
        ]);
        //var_dump($goods_list);
        
        $model       = new Admin();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }
            return $this->refresh();
        } else {
            return $this->render('category', [
                'model' => $model,
            ]);
        } 
    }
   
}
