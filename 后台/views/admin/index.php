<?php
	use yii\helpers\Html;
	use frontend\assets\AppAsset;
	use yii\bootstrap\ActiveForm;
	use yii\captcha\Captcha; 
?> 

<?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'verifyCode')->widget(Captcha::className()) ?> 