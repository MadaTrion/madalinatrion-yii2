<?php

/* @var $this yii\web\View */
/* @var $page common\models\Page */

?>

<section id="about">
	<div class="container">

		<div class="section-header">
			<h2 class="section-title text-center wow fadeInDown"><?= $this->title ?></h2>
		</div>
		<div class="row">
			<?= $page->content ?>
		</div>

	</div>
</section>