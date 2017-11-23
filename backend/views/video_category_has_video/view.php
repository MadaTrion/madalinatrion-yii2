<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\VideoCategoryHasVideo */

$this->title = $model->video_category_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Video Category Has Videos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-category-has-video-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'video_category_id' => $model->video_category_id, 'video_id' => $model->video_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'video_category_id' => $model->video_category_id, 'video_id' => $model->video_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'video_category_id',
            'video_id',
        ],
    ]) ?>

</div>
