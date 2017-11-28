<?php

namespace frontend\components;

use common\models\Language;
use common\models\Page;
use common\models\Setting;
use Yii;
use yii\base\BootstrapInterface;
use yii\helpers\ArrayHelper;

class MultilanguageUrlRules implements BootstrapInterface
{
	/**
	 * List with all active languages from DataBase
	 * @var array
	 */
	public $languages = [];

	/**
	 * Current language of the app
	 * @var
	 */
	public $language;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		// Initialization
		$this->init();
	}

	/**
	 * @inheritdoc
	 */
	public function bootstrap($app)
	{
		// Do not keep the schema cache while in Development environment
//		if (YII_ENV_DEV) {
//			Yii::$app->cache->flush();
//		}
		// Setup components
		$this->setupComponents();
		// Build  URL rules
		$this->buildUrlRules();
	}

	/**
	 * Initialization
	 */
	public function init()
	{
		// Default language
		$language = Yii::$app->language;
		// Get all app active languages
		$languages = ArrayHelper::map(Language::findAll(['status' => Language::STATUS_ACTIVE]), 'language', 'language_id');
		// Detect language from URL segment
		$urlLanguage = explode('/', $_SERVER['REQUEST_URI'])[1];
		// Check if the language from URL is valid and it is an active app language
		if (array_key_exists($urlLanguage, $languages)) {
			// Use the language from URL
			$language = $languages[$urlLanguage];
		}
		// Set properties
		$this->languages = $languages;
		$this->language = $language;
		// Set settings from database as app params
		Yii::$app->params['settings'] = Setting::findSiteSettings();
	}

	/**
	 * Setup components
	 */
	public function setupComponents()
	{
		// Asset manager
		$assetManager = Yii::$app->get('assetManager');
		$assetManager->bundles['dosamigos\google\maps\MapAsset']['options']['language'] = $this->language;
		Yii::$app->set('assetManager', $assetManager);

		// URL manager
		$urlManagerConfig = Yii::$app->get('urlManager');
		$urlManagerConfig->languages = $this->languages;
		Yii::$app->set('urlManager', $urlManagerConfig);
	}

	/**
	 * Build URL Rules
	 */
	public function buildUrlRules()
	{
		// Get pages for the current language
		$pages = (new Page)->findPagesByLanguageId($this->language);
		// Array for all dynamic pages slugs
		$dynamicPagesSlugs = [];
		// URL Rules - init for homepage
		$urlRules = [
			[
				'pattern' => '/',
				'route' => 'site/index'
			]
		];
		// Loop through pages
		foreach ($pages as $page) {
			// Skip the HomePage because it is already defined
			if ($page->page_controller === 'site' && $page->page_action === 'index') {
				continue;
			}
			// If is page
			if ($page->page_controller === 'page') {
				// Success page
				if ($page->page_action === 'success') {
					$urlRules[] = [
						'pattern' => $page->slug . '/<params>',
						'route' => $page->page_controller . '/' . $page->page_action
					];
				} elseif ($page->page_action === 'view') {
					// Add current page slug to the dynamic pages slugs array
					$dynamicPagesSlugs[] = $page->slug;
				}
			} else {
				// Last, set the page route
				$urlRules[] = [
					'pattern' => $page->slug,
					'route' => $page->page_controller . '/' . $page->page_action
				];
			}
		}

		// TODO: check the performance for bigger $dynamicPagesSlugs length
		// Create specific route for dynamic pages
		if ($dynamicPagesSlugs) {
			// Separate slugs by pipe
			$urlRules[] = [
				'pattern' => '<slug:(' . implode('|', $dynamicPagesSlugs) . ')>',
				'route' => 'page/view'
			];
		}

//		echo '<pre>'; print_r($urlRules); die();

		// Add rules to URL Manager
		Yii::$app->getUrlManager()->addRules($urlRules);
	}
}
