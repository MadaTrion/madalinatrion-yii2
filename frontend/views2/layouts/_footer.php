<?php
use yii\helpers\Html;
use common\widgets\LanguageDropdown;
?>

<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<a href=""> &copy; 2015-<?= date('Y') ?> <?= Html::encode(Yii::$app->name) ?> </a>
			</div>
			<div class="col-sm-6">
				<ul class="social-icons">
					<?php if (Yii::$app->params['facebook_page']) : ?>
						<li><a href="<?= Yii::$app->params['facebook_page'] ?>" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
					<?php endif; ?>
					<?php if (Yii::$app->params['googleplus_page']) : ?>
						<li><a href="<?= Yii::$app->params['googleplus_page'] ?>" target="_blank" title="Google+"><i class="fa fa-google-plus"></i></a></li>
					<?php endif; ?>
					<?php if (Yii::$app->params['twitter_page']) : ?>
						<li><a href="<?= Yii::$app->params['twitter_page'] ?>" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
					<?php endif; ?>
					<?php if (Yii::$app->params['pinterest_page']) : ?>
						<li><a href="<?= Yii::$app->params['pinterest_page'] ?>" target="_blank" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
					<?php endif; ?>
					<?php if (Yii::$app->params['youtube_channel']) : ?>
						<li><a href="<?= Yii::$app->params['youtube_channel'] ?>" target="_blank" title="Youtube"><i class="fa fa-youtube"></i></a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
</footer>