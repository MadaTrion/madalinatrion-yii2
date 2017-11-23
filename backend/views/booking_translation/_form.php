<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BookingTranslation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-translation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'language_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'business_id')->textInput() ?>

    <?= $form->field($model, 'buisnes_details')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'deleted')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
