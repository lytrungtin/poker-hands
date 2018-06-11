<?php

function multiexplode ($delimiters,$string) {
	$ready = str_replace($delimiters, $delimiters[0], $string);
	$ready = trim($ready,$delimiters[0]);
	$launch = explode($delimiters[0], $ready);
	return  $launch;
}

function poker_hands ($string) {
	$array = multiexplode(array("S","H","D","C"),$string);
	$occurences = array_count_values($array);
	$max = max($occurences);
	$min = min($occurences);
	if ($max > 3) {
		return "4C";
	}
	if ($max == 3) {
		if ($min == 2) {
			return "FH";
		} else {
			return "3C";
		}
	}
	if ($max == 2) {
		$count = 0;
		foreach ($occurences as $value) {
			if ($value == 2) {
				$count++;
			}
		}
		if ($count == 1) {
			return "1P";
		} else {
			return "2P";
		}
	}
}

echo poker_hands($_GET['string']);