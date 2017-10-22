<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\admin;

/**
 * Site controller
 */
class AdminController extends Controller
{
    /**
     * @inheritdoc
     */
    
    public function actionIndex()
    {
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

    
}
