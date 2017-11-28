<?php

namespace frontend\controllers;

use common\helpers\UrlHelper;
use yii\web\NotFoundHttpException;

class PageController extends MainController
{
	/**
	 * @inheritdoc
	 */
	public $defaultAction = 'view';

	/**
	 * View
	 * @param string $slug
	 * @return mixed
	 */
	public function actionView($slug)
	{
		// Render the view
		return $this->render('view', [
			'page' => $this->currentPage
		]);
	}

	/**
	 * Success
	 * @param $params
	 * @return string
	 * @throws NotFoundHttpException
	 */
	public function actionSuccess($params)
	{
		$params = UrlHelper::decodeParams($params);
		// Display 404 if the params are incorrect
		if (!$params) {
			throw new NotFoundHttpException();
		}
		return $this->render('success', [
			'params' => $params
		]);
	}
}