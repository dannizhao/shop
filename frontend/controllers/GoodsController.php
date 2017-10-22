<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class GoodsController extends Controller
{
    //已买到的宝贝
    public function actionBuy()
    {
		$session = Yii::$app->session; 
        $userInfo = $session->get('user_info');
        if(empty($userInfo)){
            $this->redirect('/index/login?urlRequest=/goods/buy');
            return true;
        }
        return $this->render('buy',['userInfo'=>$userInfo]);
    }
    //我的信息
    public function actionUser()
    {
        $session = Yii::$app->session; 
        $userInfo = $session->get('user_info');
        if(empty($userInfo)){
            $this->redirect('/index/login?urlRequest=/goods/user');
            return true;
        }
        return $this->render('user',['message'=>"hello world"]);
    }
    //我的地址管理
    public function actionAddress()
    {
        $session = Yii::$app->session; 
        $userInfo = $session->get('user_info');
        if(empty($userInfo)){
            $this->redirect('/index/login?urlRequest=/goods/address');
            return true;
        }
        return $this->render('address',['message'=>"hello world"]);
    }
    //我关注的店铺
    public function actionShopfollow()
    {
        $session = Yii::$app->session; 
        $userInfo = $session->get('user_info');
        if(empty($userInfo)){
            $this->redirect('/index/login?urlRequest=/goods/shopfollow');
            return true;
        }
        return $this->render('shopfollow',['message'=>"hello world"]);
    }
    //收藏夹
    public function actionCollect()
    {
        $session = Yii::$app->session; 
        $userInfo = $session->get('user_info');
        if(empty($userInfo)){
            $this->redirect('/index/login?urlRequest=/goods/collect');
            return true;
        }
        return $this->render('collect',['message'=>"hello world"]);
    }
    //商品信息
    public function actionInfo()
    {
        return $this->render('info',['message'=>"hello world"]);
    }
}
