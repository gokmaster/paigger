<?php

function format_date($given_date)
{

	$formatted_date = date('M d, Y', strtotime($given_date));
					
	$now = date('Y-m-d H:i:s');

	// convert to timestamp values
	$now = strtotime(str_replace('/', '-', $now));
	$given_date = strtotime(str_replace('/', '-', $given_date));

	// get date difference in hours
	$date_diff = abs($now - $given_date) / 3600; 
	
	// floor rounds a number down to nearest integer
	if ($date_diff < 1) {
		return floor($date_diff*60) ." min ago";
	} elseif ($date_diff < 2) {
		return floor($date_diff) ." hour ago"; 
	} elseif ($date_diff < 48) {
		return floor($date_diff) ." hours ago";
	} else {
		return $formatted_date; 
	}
}
?>