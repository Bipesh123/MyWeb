<?php

function Compare($norm, $user) {
	if ($norm[0] == $user[0]) {
		$network = 1;
	} else {
		$network = 0;
	}
	if ($norm[1] == $user[1]) {
		$sim =1;
	} else {
		$sim = 0;
	}
	if ($norm[2] == $user[2]) {
		$os = 1;
	} else {
		$os = 0;
	}
	if ($norm[3] == $user[3]) {
		$chipset = 1;
	} else {
		$chipset = 0;
	}
	if ($norm[4] == $user[4]) {
		$ram = 1;
	} else {
		$ram = 0;
	}
	if ($norm[5] == $user[5]) {
		$internalstorage = 1;
	} else {
		$internalstorage = 0;
	}

	if ($norm[6] == $user[6]) {
		$resolution = 1;
	} else {
		$resolution = 0;
	}
	if ($norm[7] == $user[7]) {
		$inch = 1;
	} else {
		$inch = 0;
	}

	if ($norm[8] == $user[8]) {
		$mainresolution = 1;
	} else {
		$mainresolution = 0;
	}
	if ($norm[9] == $user[9]) {
		$selfieeresolution =1;
	} else {
		$selfieeresolution = 0;
	}
	if ($norm[10] == $user[10]) {
		$fingerprint = 1;
	} else {
		$fingerprint = 0;
	}
	if ($norm[11] == $user[11]) {
		$batterycapacity = 1;
	} else {
		$batterycapacity = 0;
	}
	if ($norm[12] == $user[12]) {
		$removable = 1;
	} else {
		$removable = 0;
	}
	if ($norm[13] == $user[13]) {
		$wirelesscharge = 1;
	} else {
		$wirelesscharge = 0;
	}

	$comp = [$network, $sim, $os, $chipset, $ram, $internalstorage, $resolution, $inch, $mainresolution, $selfieeresolution, $fingerprint, $batterycapacity, $removable, $wirelesscharge];
	return $comp;
}
?>