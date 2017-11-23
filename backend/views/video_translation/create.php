<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\VideoTranslation */

$this->title = Yii::t('app', 'Create Video Translation');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Video Translations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-translation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
