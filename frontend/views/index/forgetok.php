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
			<dl class="first done">
				<dt class="s-num">2</dt>
				<dt class="s-border"></dt>
				<dd class="s-text">
					设置新密码
					<s></s>
					<b></b>
				</dd>
			</dl>
			<dl class="ok doing">
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
			<span class="sp_img"><img src="../images/ok.jpg"></span>
			<span class="forget-res"><br/><br/>修改密码成功，您还可以重新<a href="/index/login">登录>></a></span>
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
