<?php
 namespace backend\models;
 use Yii;
 use yii\base\Model;
 
 class Check extends Model
 {
     public $verifyCode;
     public function rules()
     {
         return [
             ['verifyCode', 'captcha','message'=>'验证码输入错误了'],
         ];
     }
     public function attributeLabels()
    {
        return [
            'verifyCode' => '请在右面输入验证码  懂不？',
        ];
    }
}
?>

