<?php

namespace common\helpers;

use DateInterval;
use DatePeriod;
use DateTime;

class DateHelper
{
	/**
	 * Get dates between two dates
	 *
	 * @param $startDate
	 * @param $endDate
	 * @return DatePeriod
	 */
	public static function getDatesBetween($startDate, $endDate)
	{
		// Create DateTime objects
		$startDate = $startDate instanceof DateTime ? $startDate : new DateTime($startDate);
		$endDate = $endDate instanceof DateTime ? $endDate : new DateTime($endDate);
		// Create a one day interval
		$dateInterval = new DateInterval('P1D');
		// Return the period
		return new DatePeriod($startDate, $dateInterval, $endDate);
	}

	/**
	 * Get days of week between
	 *
	 * @param $startDate
	 * @param $endDate
	 * @return array
	 */
	public static function getDaysOfWeekBetween($startDate, $endDate)
	{
		$daysOfWeek = [];
		// Detect all dates in interval
		$dates = self::getDatesBetween($startDate, $endDate);
		// Compose days of week
		foreach ($dates as $date) {
			$daysOfWeek[] = ($date->format('N') - 1);
		}
		return $daysOfWeek;
	}

	/**
	 * Get next N days of week starting from today
	 *
	 * @param $count
	 * @return array
	 */
	public static function getNextDaysOfWeek($count)
	{
		$daysOfWeek = [];
		// Detect all dates in interval
		$currentDate = new DateTime();
		$lastDate = new DateTime('+' . $count . ' days');
		$dates = self::getDatesBetween($currentDate, $lastDate);
		// Compose days of week
		foreach ($dates as $date) {
			$daysOfWeek[] = ($date->format('N') - 1);
		}
		return $daysOfWeek;
	}
}