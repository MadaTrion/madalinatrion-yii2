<?php

namespace common\helpers;

use dosamigos\google\maps\services\GeocodingClient;
use Yii;

class MapHelper
{
	/**
	 * Geocode Address
	 * @param $data
	 * @return array
	 */
	public static function geocode($data)
	{
		$address = gettype($data) === 'string' ? $data : EntityHelper::getFullAddress($data); // TODO: review this
		// Create a new instance of GeocodingClient
		$geocodingClient = new GeocodingClient();
		// Lookup for address coordinates
		$geocodingResult = $geocodingClient->lookup([
			'address' => $address,
		]);
		// Return the first geometry result as array
		return (array) $geocodingResult->results[0]->geometry->location;
	}

	/**
	 * Geocode by IP address
	 * @param $ip
	 * @return array|null
	 */
	public static function geoIp($ip = null)
	{
		// Fall back to user ip
		$ip = $ip ?: Yii::$app->request->userIP;
		// Get location through API
		$result = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$ip"));
		// Return the result
		if (!$result) {
			return null;
		}
		return [
			'country_code' => $result['geoplugin_countryCode'],
			'country_name' => $result['geoplugin_countryName'],
			'continent_code' => $result['geoplugin_continentCode'],
			'city' => $result['geoplugin_city'],
			'latitude' => $result['geoplugin_latitude'],
			'longitude' => $result['geoplugin_longitude'],
		];
	}
}