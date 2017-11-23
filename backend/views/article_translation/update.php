<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleTranslation */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Article Translation',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Article Translations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="article-translation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
