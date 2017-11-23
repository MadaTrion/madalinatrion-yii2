<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BookingTranslation */

$this->title = Yii::t('app', 'Create Booking Translation');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Booking Translations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-translation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
