<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Video */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="video-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'thumbnaul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'source')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'local_file')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'yotube_embed')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vimeo_embed')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'embed_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_added')->textInput() ?>

    <?= $form->field($model, 'promotional')->textInput() ?>

    <?= $form->field($model, 'views')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'deleted')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
