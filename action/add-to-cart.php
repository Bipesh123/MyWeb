<?php
$sessionId  = $_SESSION['order_id'];
$productId  = (int) $_GET['product_id'];

$productObject = new \Lib\Models\Product();
$product = $productObject->getSingle($productId);

$quantity   = 1;
$price      = $product['price'];
$total      = $quantity * $price;
$cartObject = new \Lib\Models\Cart();

$data = [
    'session_id' => $sessionId,
    'product_id' => $productId,
    'price' => $price,
    'quantity' => $quantity,
];
$cartObject->addToCart($data);

$_SESSION['success'] = "Item added in the cart!";
header("Location: " . route('cart'));
exit();