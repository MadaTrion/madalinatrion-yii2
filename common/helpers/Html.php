<?php

namespace yii\helpers;

/** @noinspection PhpUndefinedClassInspection */
class Html extends BaseHtml
{
	/**
	 * @inheritdoc
	 */
	protected static function booleanInput($type, $name, $checked = false, $options = [])
	{
		// Add proper type CSS class (checkbox or radio)
		self::addCssClass($options['labelOptions'], $type);
		// Wrap the label text inside a tag - needed for CSS styling
		if (isset($options['label'])) {
			$options['label'] = '<span>' . $options['label'] . '</span>';
		}
		// Return the parent result
		return parent::booleanInput($type, $name, $checked, $options);
	}
}