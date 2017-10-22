<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

?>
<div class="site-contact">
                <?php $form = ActiveForm::begin(); ?>
                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className()
                    ) ?>

                    <div class="form-group">
                        <?= Html::submitButton('验证一下', ['class' => 'btn btn-primary']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
</div>
?>
