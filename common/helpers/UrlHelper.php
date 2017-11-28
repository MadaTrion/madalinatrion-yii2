<?php

namespace common\helpers;

use Yii;
use yii\db\Exception;
use yii\helpers\Json;
use yii\helpers\StringHelper;

class UrlHelper
{
	/**
	 * Base64 encode url params
	 * @param $params
	 * @return string
	 */
	public static function encodeParams($params)
	{
		return rawurlencode(base64_encode(Json::encode($params)));
	}

	/**
	 * Base64 decode url params
	 * @param $params
	 * @param bool $asArray
	 * @return string
	 */
	public static function decodeParams($params, $asArray = true)
	{
		try {
			return Json::decode(base64_decode(rawurldecode($params)), $asArray);
		} catch (\Exception $e) {
			return null;
		}
	}

	/**
	 * Split params
	 * @param $params
	 * @param string $delimiter
	 * @return array
	 */
	public static function splitParams($params, $delimiter = '_')
	{
		// Split params
		$params = explode(',', $params);
		// Result
		$result = [];
		// Loop through the params
		foreach ($params as $param) {
			// Get items as array
			$items = explode($delimiter, $param);
			// Counter
			$i = 0;
			// Loop through the items
			foreach ($items as $item) {
				// Push the unique items to the result
				$result[$i][$item] = $item;
				// Increment the counter
				$i++;
			}
		}
		// Return the result
		return $result;
	}
}