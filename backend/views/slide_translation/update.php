<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SlideTranslation */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Slide Translation',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Slide Translations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="slide-translation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
