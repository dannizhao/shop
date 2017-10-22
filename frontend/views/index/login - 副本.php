<?php
	use yii\helpers\Html;
	use frontend\assets\AppAsset;
	use yii\bootstrap\ActiveForm;
	use yii\captcha\Captcha; 
?>  
<div class="frontend-login">
	<a href="../index.php" target="_blank" title="返回网站主页"><img src="../images/logo.jpg"></a>
	<span class="wel_login">欢迎登陆</span>
</div>
<div class="login-index">
	<div class="login-logo"><img src="../images/loginPic.jpg"></div>
	<div class="login-info">
		<span class="is_register">还没有账号？<a class="register">立即注册</a></span>
		<div class="login-table">
			<span class="label">账户号</span><br/>
			<span><input type="text" class="text"></span><br/>
			<span class="label">密码</span><br/>
			<span><input type="password" class="text"></span><br/>
			<span ><input type="checkbox" >请保存我这次的登录信息。<span class="forget_pwd"><a>忘记密码?</a></span></span><br/><br/>
			<span><input type="button" value="立即登录" class="login-button"></td></span>
		</div>
		<!-- <table class="login-table">
			<tr><td>账户号</td></tr>
			<tr><td><input type="text"></td></tr>
			<tr><td>密码</td></tr>
			<tr><td><input type="text"></td></tr>
			<tr><td><input type="checkbox">请保存我这次的登录信息。<span class="forget_pwd"><a>忘记密码?</a></span></td></tr>
			<tr><td><input type="button" value="登录" class="login-button"></td></tr>
		</table>  -->
	</div>
</div>
<div id="login-box">
   <div class="login-top"><a href="../index.php" target="_blank" title="返回网站主页">返回网站主页</a></div>
   <div class="login-main">
    
      	<input type="hidden" name="gotopage" value="<?php if(!empty($gotopage)) echo RemoveXSS($gotopage);?>" />
      	<input type="hidden" name="dopost" value="login" />
      	<input name='adminstyle' type='hidden' value='newdedecms' />
      	<dl>
	   		<dt>用户名：</dt>
	   		<dd><input type="text" name="userid" id="username"/><span style='color:red; margin-left:17px;' class="uname"></span></dd>
	   		<dt>密&nbsp;&nbsp;码：</dt>
	   		<dd><input type="password" id="password" name="pwd"/><span style='color:red; margin-left:17px;' class="upwd"></span></dd>
	  		<?php
        		/*if(preg_match("/6/",$safe_gdopen))
        		{*/
        	?>
	   		<dt>验证码：</dt>
	   		<dd><!-- <input id="vdcode" type="text" name="validate" style="text-transform:uppercase;"/> -->
	   		<?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), ['captchaAction'=>'index/captcha',
                	'template' => '<input id="vdcode" type="text" name="validate" style="text-transform:uppercase;"/>{image}<span  class="ucode"></span><div id="refresh">看不清?换一张</div>',
                    ]) ?> 

				<?=Html::jsFile('/js/jquery.min.js')?>
				
				<script >
					/*$(document).ready(function() {						
						$("#refresh").click(function(){
							changeVerifyCode();
						});
						$(".login-btn").click(function(){
							alert(111);
							$.ajax({
								type:"POST",
								url:"/index/login/",
								async: true,
								dataType : 'JSON',
								data:{"username":$("#username").val(),
									  "password":$("#password").val(),
									  "code":$("#vdcode").val(),
									 },
								success: function(data) {
									if(data == "0"){
										$(".uname").empty().append('用户名不存在');
									}
									else if(data == "1"){
										$(".upwd").empty().append('密码错误');
									}									
									else if(data == "3"){
										$(".ucode").empty().append('验证码错误');
										$(".ucode").css("margin-left","-28px");
									}
									else if(data == "2"){
										window.location.href='../index/index';
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
    				}*/
				</script>
				












                <?php ActiveForm::end(); ?>         
            </dd>
			<?php
	       		//}
			?>
			<dt>&nbsp;</dt>
			<dd><button type="submit" name="sm1" class="login-btn" ">登录</button></dd>
	 	</dl>
	
   </div>
   
</div>

</body>
</html>




