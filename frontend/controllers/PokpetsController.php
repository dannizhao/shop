<?php
namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
//use frontend\models\Check;
use frontend\models\Check;

	class PokpetsController extends Controller{
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
            return $this->render('nobody',[
                'model'=>$model,
            ]);
        }
    }

?>