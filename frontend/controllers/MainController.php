<?php
namespace frontend\controllers;

use common\models\Language;
use common\models\Page;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

class MainController extends Controller
{
	/**
	 * Sets the body HTML attributes
	 */
	public $bodyAttributes = [
		'class' => ['has-preloader']
	];

	private $_pages;
	private $_currentPage;
	private $_languages;
	private $_appLanguages;

	//region PARENT METHODS
	/**
	 * @inheritdoc
	 */
	public function init()
	{
		parent::init();
//		\lajax\translatemanager\helpers\Language::registerAssets();
	}

	/**
	 * @inheritdoc
	 */
	public function beforeAction($action)
	{
		// Register meta data for non-ajax requests
		if (!Yii::$app->request->isAjax) {
			$this->registerMetaData();
		}
		// Call the parent
		return parent::beforeAction($action);
	}
	//endregion

	//region CUSTOM METHODS
	/**
	 * Registers dynamic meta tags
	 */
	public function registerMetaData()
	{
		// TODO: get settings from DB and retrieve social accounts and all required metadata
		// Controller view
		$view = $this->view;
		// Get current page
		$page = $this->currentPage;
		// Controller/Action route
		$url = [$this->route];
		// Add slug parameter if it is a dynamic page
		if ($page->page_controller === 'page' && $page->page_action === 'view') {
			$url['slug'] = $page->slug;
		}
		// Canonical
		$canonicalUrl = Url::to($url, true);
		// Logo
		$ogLogo = Url::to('@web/img/og-logo.png', true);

		// Standard meta tags
		$view->title = $page->title;
		$view->registerMetaTag(['name' => 'description', 'content' => $page->description], 'description');
		$view->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords], 'keywords');

		// Basic metadata for open graph
		$view->registerMetaTag(['property' => 'og:type', 'content' => 'website'], 'og:type');
		$view->registerMetaTag(['property' => 'og:url', 'content' => $canonicalUrl], 'og:url');
		$view->registerMetaTag(['property' => 'og:title', 'content' => $page->title], 'og:title');
		$view->registerMetaTag(['property' => 'og:description', 'content' => $page->description], 'og:description');
		$view->registerMetaTag(['property' => 'og:image', 'content' => $ogLogo], 'og:image');
		$view->registerMetaTag(['property' => 'og:site_name', 'content' => Yii::$app->params['site']['title']], 'og:site_name'); // TODO: get this from db settings
		$view->registerMetaTag(['property' => 'og:locale', 'content' => Yii::$app->language], 'og:locale');

		// Facebook metadata
		$view->registerMetaTag(['property' => 'fb:app_id', 'content' => 'doctoraz-123456'], 'fb:app_id'); // TODO: get this from db settings

		// Twitter metadata
		// --- this can be mixed with the above basic ogp metadata (@see https://dev.twitter.com/cards/getting-started)
		$view->registerMetaTag(['name' => 'twitter:card', 'content' => 'summary'], 'twitter:card');
		$view->registerMetaTag(['name' => 'twitter:site', 'content' => '@doctoraz'], 'twitter:site'); // TODO: get this from db settings
		$view->registerMetaTag(['name' => 'twitter:creator', 'content' => '@doctoraz'], 'twitter:creator'); // TODO: get this from db settings

		// Robots
		$view->registerMetaTag(['name' => 'robots', 'content' => 'index, follow'], 'robots');

		// Verification codes
		$view->registerMetaTag(['name' => 'google-site-verification', 'content' => 'google-verification'], 'google-site-verification'); // TODO: get this from db settings
		$view->registerMetaTag(['name' => 'msvalidate.01', 'content' => 'microsoft-verification'], 'msvalidate.01'); // TODO: get this from db settings
		$view->registerMetaTag(['name' => 'p:domain_verify', 'content' => 'pinterest-verification'], 'p:domain_verify'); // TODO: get this from db settings

		// Links
		$view->registerLinkTag(['rel' => 'alternate', 'href' => $canonicalUrl, 'type' => 'application/rss+xml', 'title' => 'RSS 2.0'], 'alternate'); // TODO: put here the RSS absolute url
		$view->registerLinkTag(['rel' => 'canonical', 'href' => $canonicalUrl], 'canonical');
	}
	//endregion

	//region GETTERS and SETTERS
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
	//endregion

}