<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SlideTranslation */

$this->title = Yii::t('app', 'Create Slide Translation');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Slide Translations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slide-translation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>