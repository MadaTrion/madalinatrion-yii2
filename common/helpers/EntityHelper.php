<?php

namespace common\helpers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Inflector;

class EntityHelper
{
	/**
	 * Gets Full Name
	 * @param $entity
	 * @param $glue
	 * @return string
	 */
	public static function getFullName($entity, $glue = ' ')
	{
		$fullName = [
			$entity['last_name'],
			$entity['middle_name'],
			$entity['first_name']
		];
		// Remove null values
		$fullName = array_filter($fullName, function ($item) {
			return !is_null($item);
		});
		// Return as space separated values
		return implode($glue, $fullName);
	}

	/**
	 * Extracts the model ID from profile ID
	 * @param $profileId
	 * @return int
	 */
	public static function extractModelId($profileId)
	{
		return (int) end(explode('-', $profileId));
	}

	/**
	 * Gets the user file name
	 * @param $entity
	 * @return string
	 */
	public static function getProfileId($entity)
	{
		return Inflector::slug(self::getFullName($entity)) . '-' . $entity['id'];
	}

	/**
	 * Gets Avatar Url
	 * @param $avatar
	 * @param $entity
	 * @return string
	 */
	public static function getAvatarUrl($avatar, $entity = null)
	{
		$entity = $entity ? $entity : 'user';
		$gender = ($entity['gender'] == 1) ? 'male' : 'female';
		$defaultAvatar = Yii::getAlias('@web') . '/img/blank-' . $entity . '.png';
		$avatar = Yii::getAlias('@uploads') . '/user/' . $avatar;

		if (!file_exists($avatar)) {
			$avatar = $defaultAvatar;
		}

		return $avatar;
	}
}