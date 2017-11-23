<?php

namespace backend\controllers;

use Yii;
use common\models\VideoCategoryHasVideo;
use backend\models\VideoCategoryHasVideoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VideoCategoryHasVideoController implements the CRUD actions for VideoCategoryHasVideo model.
 */
class VideoCategoryHasVideoController extends Controller
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
     * Lists all VideoCategoryHasVideo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VideoCategoryHasVideoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single VideoCategoryHasVideo model.
     * @param integer $video_category_id
     * @param integer $video_id
     * @return mixed
     */
    public function actionView($video_category_id, $video_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($video_category_id, $video_id),
        ]);
    }

    /**
     * Creates a new VideoCategoryHasVideo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new VideoCategoryHasVideo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'video_category_id' => $model->video_category_id, 'video_id' => $model->video_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing VideoCategoryHasVideo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $video_category_id
     * @param integer $video_id
     * @return mixed
     */
    public function actionUpdate($video_category_id, $video_id)
    {
        $model = $this->findModel($video_category_id, $video_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'video_category_id' => $model->video_category_id, 'video_id' => $model->video_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing VideoCategoryHasVideo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $video_category_id
     * @param integer $video_id
     * @return mixed
     */
    public function actionDelete($video_category_id, $video_id)
    {
        $this->findModel($video_category_id, $video_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the VideoCategoryHasVideo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $video_category_id
     * @param integer $video_id
     * @return VideoCategoryHasVideo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($video_category_id, $video_id)
    {
        if (($model = VideoCategoryHasVideo::findOne(['video_category_id' => $video_category_id, 'video_id' => $video_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
