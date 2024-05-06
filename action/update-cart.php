<?php
$sessionId  = session_id();

$cartObject = new \Lib\Models\Cart();
/**
 * Cart update has to be from FORM POST
 */
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quantities = $_POST['quantity'];
    foreach($quantities as $cartId => $quantity) {
        $cartObject->updateCart($cartId, $quantity);
    }
    $_SESSION['success'] = "Cart is updated!";
    header("Location: " . route('cart'));
    exit();
}
else {
    echo "Invalid access!";
    die;
}

