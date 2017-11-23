<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\VideoView */

$this->title = Yii::t('app', 'Create Video View');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Video Views'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-view-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
