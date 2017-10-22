<?php
    namespace frontend\controllers;
    use yii;
    use yii\web\Session;
    use yii\web\Cookie;
    use yii\web\controller;
    use frontend\models\index;
    use yii\filters\VerbFilter;
    use yii\filters\AccessControl;
    
    class IndexController extends controller{ 
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
        //首页 
        public function actionIndex(){
            $session = Yii::$app->session;
            $model   = new Index();
            $session = Yii::$app->session;
            $userInfo = $session->get('user_info');           
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                    Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
                } else {
                    Yii::$app->session->setFlash('error', 'There was an error sending your message.');
                }
                return $this->refresh();
            } 
            else {               
                return $this->render('index', 
                    ['model' => $model,
                     'userInfo'=>$userInfo
                    ]);
            }
        }
        //登录
        public function actionLogin(){
            $session = Yii::$app->session; 
            $model   = new Index();     
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
                
                if($post['isCheck'] == "true"){
                    $session->set("save",$post);
                    //yii 框架 设置cookie
                    /*$cookie = new \yii\web\Cookie([
                        'name' => 'smister',                   
                        'value' => $post['username']
                    ]);
                    \Yii::$app->response->getCookies()->add($cookie);
                    $cookie = \Yii::$app->request->cookies
                    //返回一个\yii\web\Cookie对象
                    $cookie->get('smister');*/
                }
                    
                $session->set("user_info",$post);
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
                    if(!empty($session->get('save'))){
                        return $this->render('login', [
                            'model' => $model,"save"=>$session->get('save')
                        ]);                      
                    }
                    else{
                        return $this->render('login', [
                            'model' => $model,
                        ]);
                    }
                    
                }
            }
            
        }
        //退出
        public function actionLoginout(){
            $session = Yii::$app->session;
            //$model   = new Index();
            $session = Yii::$app->session;
            if($session->remove('user_info')){
                $this->redirect('/index/index');
                return true;
            }
            //$userInfo = $session->remove('user_info');           
            /*if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                    Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
                } else {
                    Yii::$app->session->setFlash('error', 'There was an error sending your message.');
                }
                return $this->refresh();
            } 
            else {   */            
                return $this->render('loginout', 
                    ['userInfo'=>$userInfo
                    ]);
            //}
        }
        //注册
        public function actionRegister(){
            $session = Yii::$app->session; 
            $model   = new Index();     
            if(Yii::$app->request->isPost){
                $post = Yii::$app->request->post();
                $user = $model->selectUserInfo($post['uname']);
                if(!empty($user)){
                    exit('1');
                }
                $result = $model->insertUserInfo($post);
                if($result == false){
                    exit('0');
                }
                exit('2');
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
                    return $this->render('register', [
                        'model' => $model,
                    ]);
                }
            }
            
        }
        //忘记密码第一步
        public function actionForget(){
            $session = Yii::$app->session; 
            $model   = new Index();     
            if(Yii::$app->request->isPost){
                $post = Yii::$app->request->post();
                $user = $model->selectUserInfo($post['name']);
                $VerifyCode = $this->createAction('captcha')->getVerifyCode();
                if(empty($user)){
                    exit('1');
                }
                else if($post['code'] != $VerifyCode){
                    exit('0');
                }
                exit('2');
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
                    return $this->render('forget', [
                        'model' => $model,
                    ]);
                }
            }
            
        }
        //忘记密码第二步
        public function actionForgettwo(){
            $session = Yii::$app->session; 
            $model   = new Index();     
            if(Yii::$app->request->isPost){
                $post = Yii::$app->request->post();
                $result = $model->updateUserInfo($post);
                if($result == false){
                    exit('0');
                }
                exit('2');
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
                    return $this->render('forgettwo', [
                        'model' => $model,
                    ]);
                }
            }
            
        }
        //忘记密码完成
        public function actionForgetok(){
            $session = Yii::$app->session; 
            $model   = new Index();     
            if(Yii::$app->request->isPost){
               /* $post = Yii::$app->request->post();
                $result = $model->updateUserInfo($post);
                if($result == false){
                    exit('0');
                }
                exit('2');*/
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
                    return $this->render('forgetok', [
                        'model' => $model,
                    ]);
                }
            }
            
        }






        public function actionSql(){
            $posts     = \Yii::$app->db->createCommand('SELECT student.*,user.* FROM student,user where student.Id = user.Id' )
            ->queryAll();
            echo "<br/><br/><br/><br/>";
            var_dump($posts);
            /*$connection = new Index();
            var_dump($connection);*/
            /*$posts     = \Yii::$app->db->createCommand('SELECT * FROM student')
            ->queryAll();
            $post      = \Yii::$app->db->createCommand('SELECT * FROM student WHERE Id=5')
            ->queryOne();
            $titles    = \Yii::$app->db->createCommand('SELECT name FROM student')
            ->queryColumn();
            $count     = \Yii::$app->db->createCommand('SELECT COUNT(*) FROM student')
            ->queryScalar();
            $post_info = \Yii::$app->db->createCommand('SELECT * FROM student WHERE Id=id AND status=status')
            ->bindValue('id', "1")
            ->bindValue('status', 2)
            ->queryOne();
            $params = ['id' => 1, 'status' => 2];
            $post_inf1 = \Yii::$app->db->createCommand('SELECT * FROM student WHERE Id=id AND status=status')
            ->bindValues($params)
            ->queryOne();
            $post_inf2 = \Yii::$app->db->createCommand('SELECT * FROM student WHERE Id=id AND status=status', $params)
            ->queryOne();
            $command   = \Yii::$app->db->createCommand('SELECT * FROM student WHERE Id=:id')
              ->bindParam(':id', $id);
            $id = 5;
            $post1 = $command->queryOne();
            $id = 2;
            $post2 = $command->queryOne();
            $select    = \Yii::$app->db->createCommand('UPDATE student SET name="李四" WHERE Id=7')
            ->execute();*/
            //$insert    = \Yii::$app->db->createCommand()->insert('student', ['status' => '0',"name"=> "王五"])->execute();
            //$update    = \Yii::$app->db->createCommand()->update('student', ['status' => 2], 'name' > '王五')->execute();
            //$delete    = \Yii::$app->db->createCommand()->delete('student', 'status = 3')->execute();
            /*$all_insert  = \Yii::$app->db->createCommand()->batchInsert('student', ['name', 'status'], [
                ['Tom', 1],
                ['Jane', 2],
                ['Linda', 3],
            ])->execute();*/

            /*$counts   = \Yii::$app->db->createCommand("SELECT COUNT(Id) FROM student")
            ->queryScalar();*/

            $qq   = new Index();
            //Index::model()->selectTableInfo();
            //$admin= Admin::model()->findAll();  
            // $actionID = Yii::$app->controller->action->id;

            echo "<br/><br/><br/><br/>";
            //var_dump($post2);
            var_dump($qq->selectUserInfo('张三'));
            return $this->render("sql",["message"=>"欢迎进入yii主页"]);
        }
        //帮助中心
        public function actionHelp()
        {
            return $this->render('help',['message'=>"hello world"]);
        }
    }
?>