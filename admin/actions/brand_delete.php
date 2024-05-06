<?php
include_once "../../config.php";

$object = new \Lib\Models\Brand();

$id = (int) $_GET['id'];

$object->delete($id);
$_SESSION['success'] = "Brand has been deleted successfully!";
header("Location: ../pages/brands.php");
die;
