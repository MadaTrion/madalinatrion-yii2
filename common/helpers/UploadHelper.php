<?php

namespace common\helpers;

use Yii;

class UploadHelper
{
	/**
	 * Ensures that the path contains all the directories
	 *
	 * @param $path
	 * @return bool|string
	 */
	public static function ensureDirectoryTree($path)
	{
		// Get the uploads path
		$uploadPath = Yii::getAlias('@uploads');
		// Check the path
		if ($path) {
			// Concat extra path to the upload path
			$uploadPath .= '/' . $path;
			// If the directory does not exist
			if (!is_dir($uploadPath)) {
				// Create the directory
				mkdir($uploadPath, 0755, true);
			}
		}
		// Return the final existing path
		return $uploadPath;
	}

	/**
	 * Save file using MultipartFormDataParser
	 *
	 * @param $uploadedFile
	 * @param $file
	 * @param $path
	 * @return bool
	 */
	public static function saveFile($uploadedFile, $file, $path = '')
	{
		// Get the existent path
		$path = self::ensureDirectoryTree($path);
		// Copy the file
		copy($uploadedFile, $path . '/' . $file);
		// Return the existence of the file
		return file_exists($path);
	}
}