<?php
$sessionId  = session_id();
$id  = (int) $_GET['id'];

$cartObject = new \Lib\Models\Cart();

$cartObject->delete($id);

$_SESSION['success'] = "Item deleted from the cart!";
header("Location: " . route('cart'));
exit();

