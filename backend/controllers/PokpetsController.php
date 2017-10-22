<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
//use frontend\models\Check;
use backend\models\Check;

	class PokpetsController extends Controller{
        /*public function behaviors() { 
            return [ 
                'access' => [ 
                    'class' => AccessControl::className(), 
                    'rules' => [ 
                        [ 
                            'actions' => ['nobody', 'error', 'captcha'], 
                            'allow' => true, 
                        ], 
                    ], 
                ],
                ];
        }*/
        
		public function actions(){
        	return [
            	'error' => [
                	'class' => 'yii\web\ErrorAction',
            	],
            	'captcha' => [
                	'class' => 'yii\captcha\CaptchaAction',
            	],
        	];
    	}
        public function actionNobody(){
            $model = new Check();
            if ($model->load(Yii::$app->request->post()) && $model->validate()){
                return $this->refresh();
            }
            else{
                return $this->render('nobody',[
                'model'=>$model,
            ]);
            }
            
        }
    }

?>