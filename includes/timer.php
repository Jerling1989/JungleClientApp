<?php

	function getTime($time_added) {

		// CURRENT TIME
		$date_time_now = date('Y-m-d H:i:s');
		// DATE POST WAS ADDED VARIABLE
		$start_date = new DateTime($time_added);
		// CURRENT DATE VARIABLE
		$end_date = new DateTime($date_time_now);
		// DIFFERENCE BETWEEN BOTH DATE VARIABLES
		$interval = $start_date->diff($end_date);
		// CHECK IF DIFFERENCE IS GREATER THAN OR EQUAL TO ONE YEAR
		if ($interval->y >= 1) {
			if($interval == 1) {
				$time_message = $interval->y . ' year ago'; // ONE YEAR
			} else {
				$time_message = $interval->y . ' years ago'; // MULTIPLE YEARS
			}
			// CHECK IF DIFFERENCE IS GREATER THAN OR EQUAL TO ONE MONTH
		} else if ($interval->m >= 1) {
			if ($interval->d == 0) {
				$days = ' ago'; // NO ADDITIONAL DAYS
			} else if ($interval->d == 1) {
				$days = $interval->d . ' day ago'; // ONE ADDITIONAL DAYS
			} else {
				$days = $interval->d . ' days ago'; // MULTIPLE ADDITIONAL DAYS
			}

			if($interval->m == 1) {
				$time_message = $interval->m . ' month ' . $days; // ONE MONTH PLUS DAYS
			} else {
				$time_message = $interval->m . ' months ' . $days; // MULTIPLE MONTHS PLUS DAYS
			}
			// CHECK IF DIFFERENCE IS GREATER THAN OR EQUAL TO ONE DAY
		} else if ($interval->d >= 1) {
			if ($interval->d == 1) {
				$time_message = 'Yesterday';
			} else {
				$time_message = $interval->d . ' days ago';
			}
			// CHECK IF DIFFERENCE IS GREATER THAN OR EQUAL TO ONE HOUR
		} else if ($interval->h >= 1) {
			if ($interval->h == 1) {
				$time_message = $interval->h . ' hour ago'; // ONE HOUR
			} else {
				$time_message = $interval->h . ' hours ago'; // MULTIPLE HOURS
			}
			// CHECK IF DIFFERENCE IS GREATER THAN OR EQUAL TO ONE MINUTE
		} else if ($interval->i >= 1) {
			if ($interval->i == 1) {
				$time_message = $interval->i . ' minute ago'; // ONE MINUTE
			} else {
				$time_message = $interval->i . ' minutes ago'; // MULTIPLE MINUTES
			}
			// CHECK IF DIFFERENCE IS GREATER THAN OR EQUAL TO ONE SECOND
		} else {
			if ($interval->s < 30) {
				$time_message = 'Just now'; // LESS THAN 30 SECONDS
			} else {
				$time_message = $interval->s . ' seconds ago'; // OVER 30 SECONDS
			}
		}

	}

?>