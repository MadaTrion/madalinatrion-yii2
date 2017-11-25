<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\VideoCategoryTranslationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="video-category-translation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'language_id') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'language_code') ?>

    <?= $form->field($model, 'category_name') ?>

    <?php // echo $form->field($model, 'category_meta_keywords') ?>

    <?php // echo $form->field($model, 'category_meta_description') ?>

    <?php // echo $form->field($model, 'deleted') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>