<?php
	use yii\helpers\Html;
	use frontend\assets\AppAsset;
	use yii\bootstrap\ActiveForm;
	use yii\captcha\Captcha; 
?> 
<div class="login"> 
	<div class="frontend-login">
		<a href="/" target="_blank" title="返回网站主页"><img src="../images/logo.jpg"></a>
		<span class="wel_login">欢迎注册</span>
	</div>
	<div class="login-index">
		<div class="login-logo"><img src="../images/loginPic.jpg"></div>
		<div class="login-info">
		<span class="style_register" id="mobile_res" >手机注册</span>
		<span class="style_register" id="email_res">邮箱注册</span>
		<span class="style_register">已有账号！<a href="/index/login">请登录</a></span>
		
			<div class="phone_res">
				
				<div class="phone_info">
					<span><input type="text" class="text_phone" placeholder="&emsp;&emsp;手机" id="login_uname"></span><br/>
					<span></span><br/>
					<span><input type="password" class="text_pwd" placeholder="&emsp;&emsp;密码" id="login_pwd"></span><br/>
					<span class="pwd">弱</span><span class="pwd">中</span><span class="pwd">强</span><br/>
					<span><input type="password" class="text_pwd1" placeholder="&emsp;&emsp;确认密码" id="login_pwds"></span><br/>
					<span></span><br/>
					<span><input type="button" value="立即注册" class="login-button"  id="phone-button"></span>
				</div>
			</div>
			<div class="email_res" style="display: none;">
				
				<div class="phone_info">
					<span><input type="text" class="text_phone" placeholder="&emsp;&emsp;email" id="email_uname"></span><br/>
					<span></span><br/>
					<span><input type="password" class="text_pwd" placeholder="&emsp;&emsp;密码" id="email_pwd"></span><br/>
					<span class="pwd">弱</span><span class="pwd">中</span><span class="pwd">强</span><br/>
					<span><input type="password" class="text_pwd1" placeholder="&emsp;&emsp;确认密码" id="email_pwds"></span><br/>
					<span></span><br/>
					<span><input type="button" value="立即注册" class="login-button" id="email-button"></span>
				</div>
			</div>
		</div>
	</div>
	<?= $this->render('../foot') ?>
</div>
				
</body>
</html>




