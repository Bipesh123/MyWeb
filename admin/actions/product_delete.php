<?php
include_once "../../config.php";

$object = new \Lib\Models\Product();

$id = (int) $_GET['id'];

$object->delete($id);
$_SESSION['success'] = "Product has been deleted successfully!";
header("Location: ../pages/products.php");
die;
