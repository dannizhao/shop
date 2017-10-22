<?php
	use yii\helpers\Html;
	use frontend\assets\AppAsset;
	use yii\bootstrap\ActiveForm;
	use yii\captcha\Captcha; 
?>  
<div class="login">
	<div class="frontend-login">
		<a href="/" target="_blank" title="返回网站主页"><img src="../images/logo.jpg"></a>
		<span class="wel_login">找回密码</span>
	</div>
	<div class="forget-index">
		<div class="forget">
			<dl class="first done">
				<dt class="s-num">1</dt>
				<dt class="s-border"></dt>
				<dd class="s-text">
					填写账户名
					<s></s>
					<b></b>
				</dd>
			</dl>
			<dl class="first doing">
				<dt class="s-num">2</dt>
				<dt class="s-border"></dt>
				<dd class="s-text">
					设置新密码
					<s></s>
					<b></b>
				</dd>
			</dl>
			<dl class="nomarl doing">
				<dt class="s-num"></dt>
				<dt class="s-border"></dt>
				<dd class="s-text">
					完成
					<s></s>
					<b></b>
				</dd>
			</dl>
		</div>
		<div class="forget-info">
			<hr/><br/><br/>
			<span class="user">密&emsp;&emsp;码&emsp;</span><input type="password"  class="forget_pwd"><br/>
			<span class="user">确定密码&emsp;</span><input type="password"  class="forget_pwd"><br/>
			<input type="button" value="下一步" class="next-two" id="next-two"><br/><br/>
			<span class="forget-res">如果您忘记了账户名，将无法找回您的账户信息，您还可以重新<a>注册>></a></span>
		</div>
	</div>
	<?= $this->render('../foot') ?>
</div>
<script >
	$(document).ready(function() {						
		$("#index-verifycode-image").click(function(){
			$.ajax({
	            url: "/index/captcha?refresh",
	            dataType: 'json',
	            cache: false,
	            success: function(data) {		             	
	                $('#index-verifycode-image').attr('src', data['url']);
	            }
	        });
		});
		
	});
</script>
