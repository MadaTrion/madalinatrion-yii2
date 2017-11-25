<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!-- Preloader
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<div id="preloader" class="signature-claus">
    <div id="status"></div>
</div>
<!-- end : preloader -->

 <!-- header -->
<?= $this->render('_header') ?>
<!-- /header -->

<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>
<?= Alert::widget() ?>
<?= $content ?>

<!-- footer -->
<?= $this->render('_footer') ?>
<!-- /footer -->

<?php $this->endBody()  ?>

<!-- scripts -->
<?= $this->render('_scripts') ?>
<!-- /scripts -->

</body>
</html>
<?php $this->endPage() ?>
