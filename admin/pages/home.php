<?php 
try{
    $pdoConnect = new PDO("mysql:host=localhost;dbname=mobileshopping","root","");
} catch (PDOException $ex) {
    echo $ex->getMessage();
    exit();
}

$pdoQuery = "SELECT * FROM users";

$pdoResult = $pdoConnect->query($pdoQuery);

$pdoRowCount = $pdoResult->rowCount();
$pdoQuery = "SELECT * FROM customers";
$customer = $pdoConnect->query($pdoQuery);

$customers = $customer->rowCount();
$pdoQuery = "SELECT * FROM brands";
$brand = $pdoConnect->query($pdoQuery);

$brands = $brand->rowCount();
$pdoQuery = "SELECT * FROM products";
$product = $pdoConnect->query($pdoQuery);

$products = $product->rowCount();
$pdoQuery = "SELECT * FROM checkout";
$order = $pdoConnect->query($pdoQuery);

$orders = $order->rowCount();
$pdoQuery = "SELECT * FROM comments";
$comment = $pdoConnect->query($pdoQuery);

$comments = $comment->rowCount();
?>
<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        <p>This is an admin pannel</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="<?php echo admin_url(); ?>">Dashboard</a></li>
      </ul>
    </div>
    <div class="Dashboardtext">
    <h3>Total number of Users = <?php echo "$pdoRowCount"; ?></h3>
    <h3>Total number of Customers =<?php echo "$customers"; ?></h3>
    <h3>Total number of Brands =<?php echo "$brands"; ?></h3>
    <h3>Total number of Products =<?php echo "$products"; ?></h3>
    <h3>Total number of Orders =<?php echo "$orders"; ?></h3>
    <h3>Total number of Comments =<?php echo "$comments"; ?></h3>
  </div>
  </main>