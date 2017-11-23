<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VideoCategoryTranslation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="video-category-translation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'language_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'language_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_meta_keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_meta_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deleted')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
