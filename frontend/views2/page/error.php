<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
$this->params['bodyAttributes'] = [
	'class' => ['page-ERROR'],
]
?>
<div class="section section-lg">
	<div class="container-fluid text-center">
		<h1 class="color-danger">1111 <?= Html::encode($this->title) ?></h1>
		<br/>
		<p class="h3 color-danger"><?= nl2br(Html::encode($message)) ?></p>
	</div>
</div>


<section id="about">
	<div class="container">

		<div class="section-header">
			<h2 class="section-title text-center wow fadeInDown color-danger"><?= Html::encode($this->title) ?></h2>
		</div>
		<div class="row color-danger">
			<?= nl2br(Html::encode($message)) ?>
		</div>

	</div>
</section><!--/#about-->