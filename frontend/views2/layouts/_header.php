<?php
use yii\helpers\Html;
use common\widgets\PageMenu;
use common\models\Page;
?>
<header id="header">
	<nav id="main-menu" class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<?= Html::a(
					Html::img('@web/img/logo.png', ['alt' => Yii::$app->params['siteTitle']]) . " ISETC '" . date('y'),
					['site/index'],
					[
						'class' => 'navbar-brand',
						'title' => Yii::$app->params['siteTitle']
					]
				) ?>
				</div>
				<div class="collapse navbar-collapse navbar-right">
					<?= PageMenu::widget([
						'options' => [
							'class' => 'nav navbar-nav'
						],
						'itemOptions' => [
							'class' => 'scroll'
						],
						'position' => Page::POSITION_HEADER
					]) ?>
				</div>
		</div><!--/.container-->
	</nav><!--/nav-->
</header>