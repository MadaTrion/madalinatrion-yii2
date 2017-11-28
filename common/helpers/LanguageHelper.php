<?php

namespace common\helpers;

class LanguageHelper
{
	/**
	 * Extract languages from a source array
	 * @param $source
	 * @return array
	 */
	public static function extractLanguages($source)
	{
		$languages = [];
		// Return empty array if the source is not valid
		if (!is_array($source) || !count($source)) {
			return $languages;
		}
		// Loop through the source array
		foreach ($source as $sourceKey => $sourceValue) {
			// Skip this iteration if is not an array
			if (!is_array($sourceValue)) {
				continue;
			}
			// Find languages
			foreach ($sourceValue as $k => $v) {
				// If the key matches a language_id (e.g. ro-RO)
				if (preg_match('/\w+\-\w+/', $k)) {
					$languages[$k] = $k;
				}
			}
		}
		return array_keys($languages);
	}
}