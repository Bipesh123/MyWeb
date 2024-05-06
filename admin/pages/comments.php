 <?php include_once"../../config.php"; 
 $error = null;
?>
  <?php include_once"../partials/header.php"; ?>
         <?php
        $productId = (int) $_GET['id'];
        $product = new \Lib\Models\Product();
        $comments= $product->getComments($productId);
       $detail = $product->getProductDetail($productId);

        ?>
        <?php include_once "../partials/navigation.php"; ?>
        <main class="app-content">
        <div class="login">
    <div class="login_title">
   <h4> Comments</h4>
   <P><a href="../pages/products.php"> << Back</a></P>
  </div>
</div>
  <div class="comment">
       <?php foreach($comments as $product): ?>

   
        <div class="img">
        <img src="<?php echo home_url(); ?>/images/avatar.png" alt="Avatar" class="avatar">
        
      </div>
        <p>  <b></b> <?php echo $product['comment']; ?></p>
     
         <?php endforeach; ?>
</main>
<?php include_once "../partials/footer.php";?>