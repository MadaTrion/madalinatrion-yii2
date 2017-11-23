<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\VideoCategoryTranslation */

$this->title = Yii::t('app', 'Create Video Category Translation');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Video Category Translations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-category-translation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
