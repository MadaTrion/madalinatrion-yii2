<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CategoryHasArticle */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Category Has Article',
]) . $model->category_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Category Has Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->category_id, 'url' => ['view', 'category_id' => $model->category_id, 'article_id' => $model->article_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="category-has-article-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
