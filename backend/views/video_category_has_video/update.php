<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\VideoCategoryHasVideo */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Video Category Has Video',
]) . $model->video_category_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Video Category Has Videos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->video_category_id, 'url' => ['view', 'video_category_id' => $model->video_category_id, 'video_id' => $model->video_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="video-category-has-video-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
