<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\helpers\HtmlHelper;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" itemscope itemtype="http://schema.org/WebPage">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= HtmlHelper::buildPageTitle($this->title) ?></title>
	<?= Html::csrfMetaTags() ?>
	<?php $this->head() ?>
</head>

<body id="home" class="homepage">
<?php $this->beginBody() ?>

<!-- #page-header -->
<?= $this->render('_header') ?>
<!-- /#page-header -->

<div class="container">
<?= Breadcrumbs::widget([
	'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>
</div>
<?= Breadcrumbs::widget([
	'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>
<?= Alert::widget() ?>
<?= $content ?>

<!-- #page-footer -->
	<?= $this->render('_footer') ?>
<!-- /#page-footer -->

<?php $this->endBody() ?>

<!-- #page-scripts -->
<?= $this->render('_scripts') ?>
<!-- /#page-scripts -->

</body>
</html>
<?php $this->endPage() ?>
