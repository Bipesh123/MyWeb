<?php
include_once "../../config.php";

$user = new \Lib\Models\Checkout();

$id = (int) $_GET['id'];
$user->delete($id);
$_SESSION['success'] = "Order has been deleted successfully!";
header("Location: ../pages/orders.php");
die;