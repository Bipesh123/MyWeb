<?php
include_once "../config.php";

$user = new \Lib\Models\Customer();
$user->logout();
header("Location: " . _ROOT_URL . "/");
die;