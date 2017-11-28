<?php

use common\helpers\EntityHelper;
use common\widgets\carousel\Carousel;
use common\widgets\gallery\Gallery;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $doctor common\models\Speaker */
/* @var $insurances array */
/* @var $map dosamigos\google\maps\Map */

$this->title = Yii::t('frontend', 'Profil {name}', ['name' => $doctor->fullName]);
$this->params['bodyAttributes'] = [
	'class' => ['page-doctor'],
	'data-scroll-spy' => '#TEST'
];


?>

<section id="about">
	<div class="container">

		<div class="section-header">
			<h2 class="section-title text-center wow fadeInDown"><?= $speaker->study_degree ?> <?= $speaker->name ?></h2>
			<h3 class="text-center wow fadeInDown"><?= $speaker->company_position ?> <?= $speaker->company ?></h3>
		</div>

		<div class="row">
			<div class="col-sm-5 wow fadeInLeft">
				<?= Html::img(Url::home(true). 'uploads/images/' . $speaker->image, ['alt' => $speaker->name, 'class' => 'img-responsive']) ?>
			</div>

			<div class="col-sm-7 wow fadeInRight">
				<h3 class="column-title"><?= Yii::t('app', 'Topic') ?>: <?= $speaker->speakerTranslation->topic ?></h3>
				<?= $speaker->speakerTranslation->description ?>
			</div>

		</div>
	</div>
</section><!--/#about-->