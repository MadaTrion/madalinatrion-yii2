<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PageTranslation */

$this->title = Yii::t('app', 'Create Page Translation');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Page Translations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-translation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
