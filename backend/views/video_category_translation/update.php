<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\VideoCategoryTranslation */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Video Category Translation',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Video Category Translations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="video-category-translation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
