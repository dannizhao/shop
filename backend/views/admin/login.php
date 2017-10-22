<?php
	use yii\helpers\Html;
	use frontend\assets\AppAsset;
	use yii\bootstrap\ActiveForm;
	use yii\captcha\Captcha; 
?>  

<div id="login-box">
   <div class="login-top"><a href="../index.php" target="_blank" title="返回网站主页">返回网站主页</a></div>
   <div class="login-main">
    
      	<input type="hidden" name="gotopage" value="<?php if(!empty($gotopage)) echo RemoveXSS($gotopage);?>" />
      	<input type="hidden" name="dopost" value="login" />
      	<input name='adminstyle' type='hidden' value='newdedecms' />
      	<dl>
	   		<dt>用户名：</dt>
	   		<dd><input type="text" name="userid" id="username"  /><span style='color:red; margin-left:17px;' class="uname"></span></dd>
	   		<dt>密&nbsp;&nbsp;码：</dt>
	   		<dd><input type="password" id="password" name="pwd"/><span style='color:red; margin-left:17px;' class="upwd"></span></dd>
	  		<?php
        		/*if(preg_match("/6/",$safe_gdopen))
        		{*/
        	?>
	   		<dt>验证码：</dt>
	   		<dd><!-- <input id="vdcode" type="text" name="validate" style="text-transform:uppercase;"/> -->
	   		<?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), ['captchaAction'=>'admin/captcha',
                	'template' => '<input id="vdcode" type="text" name="validate" style="text-transform:uppercase;"/>{image}<span  class="ucode"></span><div id="refresh">看不清?换一张</div>',
                    ]) ?> 

				<?=Html::jsFile('/js/jquery.min.js')?>
				
				<script >
					$(document).ready(function() {
						document.onkeydown = function (e) {
							var theEvent = window.event || e; 
							if (theEvent.keyCode == 13) { 
								$(".login-btn").click(); 
								return false;
							} 
						}  						
						$("#refresh").click(function(){
							changeVerifyCode();
						});

						$(".login-btn").click(function(){
							if($("#username").val() == ""){
								alert("请输入用户名");
								$("#username").focus();
								return false;
							}
							else if($("#password").val() == ""){
								alert("请输入密码");
								$("#password").focus();
								return false;
							}
							else if($("#vdcode").val() == ""){
								alert("请输入验证码");
								$("#vdcode").focus();
								return false;
							}
							$.ajax({
								type:"POST",
								url:"/admin.php/admin/login/",
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
										$(".ucode").css("margin-left","-15px");
									}
									else if(data == "2"){
										window.location.href='../admin/index/';

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
				            url: "/admin.php/admin/captcha?refresh",
				            dataType: 'json',
				            cache: false,
				            success: function(data) {				            	
				                $('#admin-verifycode-image').attr('src', data['url']);
				                //$('body').data('/index/captcha?refresh', [data['hash1'], data['hash2']]);
				            }
				        });
    				}

    				
				</script>












                <?php ActiveForm::end(); ?>         
            </dd>
			<?php
	       		//}
			?>
			<dt>&nbsp;</dt>
			<dd><button type="submit" name="sm1" class="login-btn" >登录</button></dd>
	 	</dl>
	
   </div>
   
</div>






