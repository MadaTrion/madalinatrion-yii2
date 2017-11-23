<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\VideoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="video-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'thumbnaul') ?>

    <?= $form->field($model, 'source') ?>

    <?= $form->field($model, 'local_file') ?>

    <?= $form->field($model, 'yotube_embed') ?>

    <?php // echo $form->field($model, 'vimeo_embed') ?>

    <?php // echo $form->field($model, 'embed_code') ?>

    <?php // echo $form->field($model, 'date_added') ?>

    <?php // echo $form->field($model, 'promotional') ?>

    <?php // echo $form->field($model, 'views') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'deleted') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
