<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LanguageTranslate */

$this->title = Yii::t('app', 'Create Language Translate');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Language Translates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="language-translate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
