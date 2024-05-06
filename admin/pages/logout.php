<?php
include_once "../../config.php";

$user = new \Lib\Models\User();
$user->logout();
header("Location: login.php");
die;