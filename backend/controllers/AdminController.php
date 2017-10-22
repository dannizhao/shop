<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\admin;
use yii\web\Session;

/**
 * Site controller
 */
class AdminController extends Controller
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
    
    public function actionIndex()
    {
        $session = Yii::$app->session;
        if(empty($session->get('adminuser_info'))){
            $this->redirect('/admin.php/admin/login');
            return true;
        }

        $model   = new Admin();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }
            return $this->refresh();
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
        
        //return $this->render('index',['meassage'=>'123']);
    }

    public function actionLogin(){
            $session = Yii::$app->session; 
            $model   = new Admin();     
            if(Yii::$app->request->isPost){
                $post       = Yii::$app->request->post();
                $user_list  = $model->selectUserInfo($post['username']);
                $VerifyCode = $this->createAction('captcha')->getVerifyCode();
                if(empty($user_list)){
                    exit("0");
                }
                else{
                    if($user_list[0]['password'] == md5($post['password'])){
                        if($post['code'] != $VerifyCode){
                            exit('3');
                        }                        
                    }
                    else {
                        exit("1");
                    }

                }
                $session->set("adminuser_info",$post);
                exit("2"); 
                
                
            }
            else{
                
                
                if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                    if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                        Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
                    } else {
                        Yii::$app->session->setFlash('error', 'There was an error sending your message.');
                    }
                    return $this->refresh();
                } else {
                    return $this->render('login', [
                        'model' => $model,
                    ]);
                }
            }
            
        }

    
}
