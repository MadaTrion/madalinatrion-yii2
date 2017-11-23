<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\VideoView */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Video View',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Video Views'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="video-view-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
