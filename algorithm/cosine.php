<?php
include 'normalize.php';
function dot_pro($user, $phone) {
	$dot = 0;
	for ($i = 0; $i < count($user); $i++) {
		$dot = $dot + $user[$i] * $phone[$i];
	}
	return $dot;
}

function modulo($a) {

	$m = 0;
	foreach ($a as $value) {
		$m = $m + $value * $value;
	}

	return sqrt($m);
}

// echo modulo($user);
function cosine_sim($user, $phone) {

	$dot = dot_pro($user, $phone);
	$modulus = (modulo($user) * modulo($phone));
	if ($modulus > 0) {
		return ($dot / $modulus);
	} else {
		return 0;
	}
}
function sorting_result($result) {
	$score = array();
	foreach ($result as $key => $row) {
		$score[$key] = $row['score'];

	}
	array_multisort($score, SORT_DESC, $result);
	return $result;
}

function recomend($conn, $user, $decide, $other_data) {
	if ($decide == "filter") {
		$brand1= $other_data[0];
		$brand=implode(',',$brand1);
		$lower = $other_data[1];
		$higher = $other_data[2];
	
		$sql = $conn->query("SELECT * FROM products where brand_id IN (".$brand.") AND price BETWEEN '$lower' and '$higher' ");
	} else {
		$id = $decide;
		$sql = $conn->query("SELECT * FROM products where id !='$id'");
	}
		$uservec=array();
		foreach ($user as $key) {
			array_push($uservec,1);
		}
	$check = mysqli_num_rows($sql);
	if ($check > 0) {
		$result = array();
			$score=[];
		while ($row = $sql->fetch_assoc()) {
			$pro_network = $row['network'];
			$pro_sim = $row['sim'];
			$pro_os = $row['os'];
			$pro_chipset = $row['chipset'];
			$pro_ram = $row['ram'];
			$pro_internalstorage = $row['internalstorage'];
			$pro_dresolution = $row['dresolution'];
			$pro_dsize = $row['dsize'];
			$pro_main_cam = $row['resolution'];
			$pro_selfieeresolution = $row['selfieeresolution'];
			$pro_fingerprint = $row['fingerprint'];
			$pro_batterycapacity = $row['batterycapacity'];
			$pro_removable = $row['removable'];
			$pro_wireless = $row['wirelesscharge'];
			$norm = [$pro_network, $pro_sim, $pro_os, $pro_chipset, $pro_ram, $pro_internalstorage, $pro_dresolution, $pro_dsize, $pro_main_cam, $pro_selfieeresolution,  $pro_fingerprint, $pro_batterycapacity, $pro_removable, $pro_wireless];
			$compare = Compare($norm, $user);
			$cosine = cosine_sim($uservec, $compare);
			if ($cosine > 0) {
				array_push($result, array("mobile" => $row['id'], "score" => $cosine));
				array_push($score,$cosine);
			}
		}
		if (count($result) == 0) {
			return [0];
		}
		rsort($score);
		$score_sort = sorting_result($result);

		return [$score_sort,$score];
	} else {
		return [0];
	}
}
?>