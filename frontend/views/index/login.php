<?php
	use yii\helpers\Html;
	use frontend\assets\AppAsset;
	use yii\bootstrap\ActiveForm;
	use yii\captcha\Captcha; 
?>  
<div class="login">
	<div class="frontend-login">
		<a href="/" target="_blank" title="返回网站主页"><img src="../images/logo.jpg"></a>
		<span class="wel_login">欢迎登陆</span>
	</div>
	<div class="login-index">
		<div class="login-logo"><img src="../images/loginPic.jpg"></div>
		<div class="login-info">
			<span class="is_register">还没有账号？<a href="/index/register">立即注册</a></span>
			<div class="login-table">
				<span class="label">账户号</span><br/>
				<span><input type="text" class="text" placeholder="用户名" id="login_uname" value="<?php if (isset($save)) { echo $save['username'];} ?>"></span><br/>
				<span class="label">密码</span><br/>
				<span><input type="password" class="text" id="login-upwd" value="<?php if (isset($save)) { echo $save['password'];} ?>"></span><br/>
				<span style="float: left;line-height: 50px;" class="label" >验证码：</span>
		   		<span><!-- <input id="vdcode" type="text" name="validate" style="text-transform:uppercase;"/> -->
		   		<?php $form = ActiveForm::begin(); ?>
	                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), ['captchaAction'=>'index/captcha',
	                	'template' => '<input id="login-ucode" type="text" name="validate" style="text-transform:uppercase;"/>{image}<span  class="ucode" id="refresh">看不清?换一张</span>',
	                    ]) ?> 

					<?=Html::jsFile('/js/jquery.min.js')?>
					<?php ActiveForm::end(); ?>         
	            </span><br/>
				<span ><input type="checkbox" id="save">请保存我这次的登录信息。<span class="forget_pwd"><a href="/index/forget">忘记密码?</a></span></span><br/><br/>
				<span><input type="button" value="立即登录" class="login-button"></span>
			</div>
			
		</div>
	</div>
	<?= $this->render('../foot') ?>
</div>


<script >
	$(document).ready(function() {	
		document.onkeydown = function (e) {
			var theEvent = window.event || e; 
			if (theEvent.keyCode == 13) { 
				$(".login-button").click(); 
				return false;
			} 
		} 					
		$("#refresh").click(function(){
			changeVerifyCode();
		});
		$(".login-button").click(function(){
			$.ajax({
				type:"POST",
				url:"/index/login/",
				async: true,
				dataType : 'JSON',
				data:{"username":$("#login_uname").val(),
					  "password":$("#login-upwd").val(),
					  "code":$("#login-ucode").val(),
					  "isCheck":$('#save').is(':checked')
					 },
				success: function(data) {
					if(data == "0"){
						alert('用户名不存在');
						return false;
					}
					else if(data == "1"){
						alert('密码错误');
						return false;
					}									
					else if(data == "3"){
						alert('验证码错误');
						return false;
					}
					else if(data == "2"){
						if(window.location.search.indexOf("=") > 0){
							window.location.href = window.location.search.split("=")[1];
							return false;
						}
						window.location.href = '../index/index';
					}
	            },
	            error: 　 function(err) {
	                //alert('error');
	                console.log(err);
	            }
			});
			return false;
		});
	});

	function changeVerifyCode() {
        $.ajax({
            url: "/index/captcha?refresh",
            dataType: 'json',
            cache: false,
            success: function(data) {	
             	
                $('#index-verifycode-image').attr('src', data['url']);
                //$('body').data('/index/captcha?refresh', [data['hash1'], data['hash2']]);
            }
        });
	}
</script>
				
</body>
</html>




