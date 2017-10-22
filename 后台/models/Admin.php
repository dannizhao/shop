<?php
	namespace backend\models;
	use yii\base\Model;
	use yii\captcha\captcha;

	class Admin extends Model
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
            'verifyCode' => '',
        ];
    }


	    public function selectUserInfo($username)
	    {
	    	$sql    = "select * from user where username='{$username}' ";
	    	$result = \Yii::$app->db->createCommand($sql)->queryAll();
	        return $result;
	    }
	}

	
	
?>