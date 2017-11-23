<?php

namespace backend\controllers;

use Yii;
use common\models\CategoryHasArticle;
use backend\models\CategoryHasArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryHasArticleController implements the CRUD actions for CategoryHasArticle model.
 */
class CategoryHasArticleController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all CategoryHasArticle models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategoryHasArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CategoryHasArticle model.
     * @param integer $category_id
     * @param integer $article_id
     * @return mixed
     */
    public function actionView($category_id, $article_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($category_id, $article_id),
        ]);
    }

    /**
     * Creates a new CategoryHasArticle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CategoryHasArticle();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'category_id' => $model->category_id, 'article_id' => $model->article_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CategoryHasArticle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $category_id
     * @param integer $article_id
     * @return mixed
     */
    public function actionUpdate($category_id, $article_id)
    {
        $model = $this->findModel($category_id, $article_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'category_id' => $model->category_id, 'article_id' => $model->article_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CategoryHasArticle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $category_id
     * @param integer $article_id
     * @return mixed
     */
    public function actionDelete($category_id, $article_id)
    {
        $this->findModel($category_id, $article_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CategoryHasArticle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $category_id
     * @param integer $article_id
     * @return CategoryHasArticle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($category_id, $article_id)
    {
        if (($model = CategoryHasArticle::findOne(['category_id' => $category_id, 'article_id' => $article_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
