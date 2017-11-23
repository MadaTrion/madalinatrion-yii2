<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VideoTranslation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="video-translation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'video_id')->textInput() ?>

    <?= $form->field($model, 'language_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'video_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deleted')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
