<?php
	namespace frontend\models;
	use yii\base\Model;
	use yii\captcha\captcha;

	class Index extends Model
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

	    //查询用户信息
	    public function selectUserInfo($username)
	    {
	    	$sql    = "select * from user where username='{$username}' ";
	    	$result = \Yii::$app->db->createCommand($sql)->queryAll();
	        return $result;
	    }
	    //添加用户信息
	    public function insertUserInfo($info)
	    {
	    	$time = time();
	    	//原生的sql
	    	/*$sql    = "insert into user(username,password,create_time)  values('{$info['uname']}',MD5('{$info['upwd']}'),$time) ";	    	
	    	$result = \Yii::$app->db->createCommand($sql)->execute();*/
	    	//框架自带的数据库操作
	    	$result = \Yii::$app->db->createCommand()->insert("user",['username' => $info['uname'],'password' => md5($info['upwd']),'create_time' => $time])->execute();
	        return $result;
	    }
	    //修改用户信息
	    public function updateUserInfo($info)
	    {
	        $result = \Yii::$app->db->createCommand()->update("user",['password' => md5($info['pwd'])],"username = '{$info['name']}'")->execute();
	        return $result;
	    }
	}

	
	
?>