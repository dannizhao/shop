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
class HelloController extends Controller
{
    public function actionHelloworld()
    {
		
        return $this->render('helloworld',['message'=>"hello world"]);
    }
    public function actionSay()
    {
        //return $this->render('say',['message'=>"hello world"]);

        return $this->render('say',['hello'=>"jsjsjs"]);
    }
}
