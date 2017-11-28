<?php
namespace common\helpers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class HtmlHelper
{
	/**
	 * Builds page title with/without site title from app params
	 *
	 * @param $pageTitle
	 * @return string
	 */
	public static function buildPageTitle($pageTitle)
	{
		// Site params
		$siteParams = Yii::$app->params['site'];
		// Create an array that contains the page title
		$pageTitle = [Html::encode($pageTitle)];
		// Handle site title position
		if ($siteParams['titleType'] === 'prefix') {
			// Add to beginning
			array_unshift($pageTitle, $siteParams['title']);
		} elseif ($siteParams['titleType'] === 'suffix') {
			// Add to end
			array_push($pageTitle, $siteParams['title']);
		}
		// Join page title with site title and the separator
		return implode($siteParams['titleSeparator'] ?: '', $pageTitle);
	}

	/**
	 * Builds HTML attributes from a key => val array
	 *
	 * @param $attributes
	 * @param $extraAttributes
	 * @return string
	 */
	public static function buildHtmlAttributes($attributes, $extraAttributes = null)
	{
		// Append extra attributes
		if (is_array($extraAttributes)) {
			$attributes = ArrayHelper::merge($attributes, $extraAttributes);
		}
		// HTML attributes
		$htmlAttributes = [];
		// Loop through the attributes
		foreach ($attributes as $key => $val) {
			// Build the attribute
			if (is_array($val)) {
				$htmlAttributes[] = ($key . '="' . implode(' ', $val) . '"');
			} else {
				$htmlAttributes[] = ($key . '="' . $val . '"');
			}
		}
		// Return the HTML attributes
		return implode(' ', $htmlAttributes);
	}
}