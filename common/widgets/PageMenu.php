<?php
namespace common\widgets;

use common\models\Page;
use Yii;
use yii\bootstrap\Nav;

class PageMenu extends Nav
{
	/**
	 * Pages
	 * @var \common\models\Page[]
	 */
	public $pages;

	/**
	 * Position of the pages
	 * @var string
	 */
	public $position = null;

	/**
	 * Display title of the page instead of anchor name
	 * @var bool
	 */
	public $usePageTitle = false;

	/**
	 * Displas a tooltip on mouse over each link
	 * @var bool
	 */
	public $hasTooltip = true;

	/**
	 * Displas a tooltip on mouse over each link
	 * @var int
	 */
	public $startParentId = null;

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		// Call the parent
		parent::init();
		// Fallback to all app pages if property not set
		if (!$this->pages) {
			$this->pages = $this->view->context->pages;
		}
		// Build Menu items
		$this->items = $this->getMenuRecursive($this->startParentId);
	}

	private function getMenuRecursive($parent_id)
	{
		$pages = Page::findPagesByParent($parent_id, $this->position);
		$result = [];

		foreach ($pages as $page) {
			$item = [];
			$hasChilds = Page::findPagesByParent($page->id, $this->position);

			$item['label'] = $page->anchor;

			if (!$hasChilds) {
				$item['url'] = [$page->page_controller . '/' . $page->page_action];
				if ($page->page_controller === 'page' && $page->page_action === 'view') {
					$item['url']['slug'] = $page->slug;
				}
			}
			if ($hasChilds) {
				$item['items'] = static::getMenuRecursive($page->id);
				$item['linkOptions'] = [
					'class' => 'main-link font3bold'
				];
				$item['dropDownOptions'] = [
					'class' => 'sub-menu font3bold',
				];
			}
			$item['options'] = [
				'class' => $hasChilds ? 'main-link font3bold sub-menu-trigger': ''
			];
			$result[] = $item;
		}
		return $result;
	}

}