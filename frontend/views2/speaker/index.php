<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $doctors common\models\Speaker */
/* @var $pagination yii\data\Pagination */

?>

<section id="meet-team">
	<div class="container">
		<div class="section-header">
			<h2 class="section-title text-center wow fadeInDown"><?php echo $this->title; ?></h2>
		</div>

		<div class="row">
			<?= $page->content ?>
		</div>

		<div class="row">

			<?php $i = 0; foreach ($speakers as $speaker): ?>
				<?php if($i > 1 && $i % 3 == 0): ?>
					</div>
					<div class="row">
				<?php endif; ?>
				<div class="col-sm-6 col-md-4 speaker-margin">
					<div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
						<div class="team-img">
							<?= Html::img(Url::home(true). 'uploads/images/' . $speaker->image, ['alt' => $speaker->name, 'class' => 'img-responsive']) ?>
						</div>
						<div class="team-info">
							<h3><?= $speaker->study_degree ?> <?= $speaker->name ?></h3>
							<span><?= $speaker->company_position ?> <?= $speaker->company ?></span>
						</div>
						<p><?= $speaker->speakerTranslation->topic ?></p>
						<?= Html::a(
							Yii::t('app', 'Read more'),
							['speaker/view', 'speakerId' => $speaker->speakerId],
							[
								'class' => 'btn btn-primary btn-lg',
								'title' => $speaker->name,
							]
						) ?>
					</div>
				</div>

			<?php $i++; endforeach; ?>

		</div>

		<div class="divider"></div>
	</div>
</section><!--/#meet-team-->