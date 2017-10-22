<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title)."后台管理" ?></title>
    <?php $this->head() ?>
    <?=Html::jsFile('/admin.php/js/jquery.min.js') ?>
    <?=Html::jsFile('/admin.php/js/jquery.js') ?>
    <?=Html::jsFile('/admin.php/js/laydate/laydate/laydate.js') ?>
    
   
</head>
<body>
<?php $this->beginBody() ?>

    

    <div id="gd">        
        <?= $content ?>
    </div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
