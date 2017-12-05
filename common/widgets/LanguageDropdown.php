<?php
namespace common\widgets;

use common\helpers\UrlHelper;
use Yii;
use yii\bootstrap\Dropdown;

class LanguageDropdown extends Dropdown
{
	/**
	 * Array with all app available languages
	 * @var array
	 */
	public $languages = [];

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		// Call the parent
		parent::init();
		// Fallback to app languages if property not set
		if (!$this->languages) {
			$this->languages = $this->view->context->appLanguages;
		}
		// Build Dropdown items
		$this->buildItems();
	}

	/**
	 * Translates the current page slug by selected language
	 * @param $language_id
	 * @return string
	 */
	public function translateCurrentPageSlug($language_id)
	{
		// Get current page
		$currentPage = $this->view->context->currentPage;
		// Filter translations by selected language
		$currentPageTranslation = reset(array_filter($currentPage->pageTranslations, function ($pageTranslation) use ($language_id) {
			return $pageTranslation->language_id === $language_id;
		}));
		// Return the slug
		return $currentPageTranslation->slug;
	}

	/**
	 * Builds the Dropdown items
	 */
	public function buildItems()
	{
		// Current route
		$route = Yii::$app->controller->route;
		// URL params
		$params = Yii::$app->request->get();
		// Prepend route to the params array
		array_unshift($params, $route);
		// Loop through the app languages
		foreach ($this->languages as $language) {
			// Exclude the current language
			if ($language->language_id == Yii::$app->language) {
				continue;
			}
			// Translate the current page slug if exist
			if ($params['slug']) {
				$params['slug'] = $this->translateCurrentPageSlug($language->language_id);
			}
			// Push language to the list
			$this->items[] = [
				'label' => $language->name,
				'url' => [
					'site/change-language',
					'language' => $language->language_id,
					'params' => UrlHelper::encodeParams($params)
				]
			];
		}
	}
}