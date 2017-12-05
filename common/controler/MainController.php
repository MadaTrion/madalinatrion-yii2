<?php
namespace common\controllers;

use common\models\Language;
use common\models\Page;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

class MainController extends Controller
{
	private $_pages;
	private $_currentPage;
	private $_languages;
	private $_appLanguages;

	/**
	 * Gets app pages
	 * @return array|\yii\db\ActiveRecord[]
	 */
	public function getPages()
	{
		if (!$this->_pages) {
			$this->_pages = (new Page)->findPagesByLanguageId(Yii::$app->language);
		}
		return $this->_pages;
	}

	/**
	 * Gets current app page
	 * @return array|\yii\db\ActiveRecord
	 */
	public function getCurrentPage()
	{
		if (!$this->_currentPage) {
			$this->_currentPage = reset(array_filter($this->pages, function ($page) {
				// Filter by controller and action
				$condition = ($page->page_controller == $this->id) && ($page->page_action == $this->action->id);
				// If it's not home page
				if (Yii::$app->request->pathInfo !== '') {
					// Filter by path also
					$condition = $condition && ($page->slug == Yii::$app->request->pathInfo);
				}
				return $condition;
			}));
		}
		return $this->_currentPage;
	}

	/**
	 * Get Languages
	 * @return array
	 */
	public function getLanguages()
	{
		if (!$this->_languages) {
			$this->_languages = (new Language)->findAllLanguages();
		}
		return $this->_languages;
	}

	/**
	 * Get Languages
	 * @return array
	 */
	public function getAppLanguages()
	{
		if (!$this->_appLanguages) {
			$this->_appLanguages = (new Language)->findAppLanguages();
		}
		return $this->_appLanguages;
	}
}