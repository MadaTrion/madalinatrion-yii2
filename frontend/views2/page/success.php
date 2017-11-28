<?php
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $params array */

$this->params['bodyAttributes'] = [
	'class' => ['page-SUCCESS'],
]
?>

<section id="about">
	<div class="container">

		<div class="section-header">
			<h2 class="section-title text-center wow fadeInDown color-success"><?= $params['title'] ?></h2>
		</div>
		<div class="row color-success">
			<?= $params['message'] ?>
		</div>

	</div>
</section><!--/#about-->
