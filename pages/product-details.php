 <?php include_once"../config.php"; ?>
  <?php include_once"../partials/header.php";
  include '../algorithm/cosine.php';
include '../db.php';
       
$error = null;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $category = new \Lib\Models\Comment();

    // check if the given username already exists or not
    try {
        $category->create($_POST);
        $_SESSION['success'] = "";
        header("Location:");
        die();
    }
    catch(\Lib\Core\ShoppingException $exception) {
        $error = $exception->getMessage();
    }
    catch(\Exception $exception) {
        $error = $exception->getMessage();
    }
}?>
         <?php
        $productId = (int) $_GET['id'];
        $product = new \Lib\Models\Product();
        $comments= $product->getComments($productId);
       $detail = $product->getProductDetail($productId);


?>
  <body>
    <div class="product-top">
     <h3><a href="<?php echo home_url();?>"> Home </a><i class="fa fa-chevron-right"></i>
      <?php echo $detail['name']; ?> </h3>
      </div>
    <div class="product_details">
 <?php if(isset($error)) : ?>
                      <div class="alert alert-danger">
                          <?php echo $error; ?>
                      </div>
                      <?php endif; ?> 
                    <br />
<main class="container">
      <!-- Left Column / Headphones Image -->
      <div class="left-column">
        <img class="active" src="<?php echo _ADMIN_URL . "/uploads/products/" . $detail['photo_name']; ?>" alt="image">
      </div>


      <!-- Right Column -->
      <div class="right-column">

        <!-- Product Description -->
        <div class="product-description">
          <h1><?php echo $detail['name']; ?></h1>
          <p>Brand:<span>&nbsp; <a href="<?php echo home_url(); ?>/pages/brand-items.php?id=<?php echo $detail['brand_id']; ?>"> <?php echo $detail['brand_name']; ?>( More Mobiles from <?php echo $detail['brand_name']; ?> )</a></span></p>
          <p><?php echo $detail['description']; ?></p>

        </div>
            <div class="price">
          <p>Rate This Product : </p><div class="rate">
    <input type="radio" id="star5" name="rate" value="5" />
    <label for="star5" title="text">5 stars</label>
    <input type="radio" id="star4" name="rate" value="4" />
    <label for="star4" title="text">4 stars</label>
    <input type="radio" id="star3" name="rate" value="3" />
    <label for="star3" title="text">3 stars</label>
    <input type="radio" id="star2" name="rate" value="2" />
    <label for="star2" title="text">2 stars</label>
    <input type="radio" id="star1" name="rate" value="1" />
    <label for="star1" title="text">1 star</label>
  </div>

        </div>
        <!-- Product Configuration -->
        <div class="product-configuration">
          <div class="price">
          <h4>Rs. <?php echo print_money($detail['price']); ?> <?php if($detail['price'] <$detail['previous_price']): ?>
                                                <span>Rs. <?php echo print_money($detail['previous_price']); ?> </span>
                                            <?php endif; ?></h4>
        </div>
          

        <!-- Product Pricing -->
         <div class="quantity"> <P>Quantity</P><p>Only <?php echo $detail['stock_quantity']; ?> items left</p>
         </div>
         <?php if($detail['stock_quantity'] <= 0): ?>
          <div class="quantity"><p>OUT OF STOCK</p></div>
          <?php else: ?>
        <div class="product-submit">
          <a href="<?php echo route('cart', ['action' => 'add-to-cart', 'product_id' => $detail['id']]); ?>" class="cart-btn">Add to cart</a>
        </div>
      <?php endif; ?>
      </div>
    </main>
  </div>
 <div class="product-features">
   <div class="product-feature">
     <h3>Product details of <?php echo $detail['name']; ?> </h3>
      </div>
    <div class="product_details">

<main class="container">
      <!-- Left Column / Headphones Image -->
        <div class="left-column">
        <p><b>Network:</b> <?php echo $detail['network']; ?></p>
        <p><b>Sim Type:</b> <?php echo $detail['sim']; ?></p>
        <p><b>OS:</b> <?php echo $detail['os']; ?></p>
        <p><b>Chipset:</b> <?php echo $detail['chipset']; ?></p>
        <p><b>RAM:</b> <?php echo $detail['ram']; ?></p>
        <p><b>Internal Storage:</b> <?php echo $detail['internalstorage']; ?></p>
        <p><b>Display Resolution:</b> <?php echo $detail['dresolution']; ?></p>
        <p><b>Display Size:</b> <?php echo $detail['dsize']; ?></p>
        <p><b>TouchScreen:</b> <?php echo $detail['touchscreen']; ?></p>
        <p><b>Camera Resolution:</b> <?php echo $detail['resolution']; ?></p>
        <p><b>Selfiee Resoultion:</b> <?php echo $detail['selfieeresolution']; ?></p>
      </div>
        <div class="right-column">
        <p><b>Selfiee FontFlash:</b> <?php echo $detail['selfieefontflash']; ?></p>
        <p><b>FingerPrint:</b> <?php echo $detail['fingerprint']; ?></p>
        <p><b>Wlan:</b> <?php echo $detail['wlan']; ?></p>
        <p><b>GPS:</b> <?php echo $detail['gps']; ?></p>
        <p><b>Bluetooth:</b> <?php echo $detail['bluetooth']; ?></p>
        <p><b>USB:</b> <?php echo $detail['usb']; ?></p>
        <p><b>FM RADIO:</b> <?php echo $detail['fmradio']; ?></p>
        <p><b>Battery Capacity:</b> <?php echo $detail['batterycapacity']; ?></p>
        <p><b>Removable:</b> <?php echo $detail['removable']; ?></p>
        <p><b>Wireless Charge:</b> <?php echo $detail['wirelesscharge']; ?></p>
         </div>
    </main>
  </div>
</div>
<div class="comments">
<div class="product-features">
   <div class="product-feature">
     <h3>Comments about this product </h3>
      </div>
    <div class="product_details">

<!-- comment -->
<main class="container">
      <div class="col-sm-12">
         <div class="comment">
          <?php
          $sql=$conn->query("select * from comments where product_id='$productId' and sentiment='Postitive Comment'");
          $pos=mysqli_num_rows($sql);
                  $sql=$conn->query("select * from comments where product_id='$productId' and sentiment='Negative Comment'");
          $neg=mysqli_num_rows($sql);
          ?>
            <h3>Positive Comments: <?php echo $pos ?></h3>

            <h3> Negative Comments: <?php echo $neg ?></h3>
           <?php foreach($comments as $product): ?>
        <div class="img">
        <img src="<?php echo home_url(); ?>/images/avatar.png" alt="Avatar" class="avatar">
        <div class="comment-profile">
         <a><?php echo $product['created_date']; ?></a>
         <a><?php echo $product['customer_name']; ?></a></div>
         <div class="sentiment">
        <a class="sentiment"><?php echo $product['sentiment']; ?></a>
      </div>
      </div>
        <p>  <b></b> <?php echo $product['comment'];?></p>
         <?php endforeach; ?>
         <form  enctype="multipart/form-data" method="POST" onsubmit="return Navies()" name='mycomment'>
          <?php if(!empty($_SESSION['_customer']['email'])) : ?>
                                <input type ="hidden" value="<?php echo $_SESSION['_customer']['full_name']; ?>" name="customer_name"> 
                                 <?php else: ?>
                                  <input type ="hidden" value="Unknown Customer" name="customer_name">
                                <?php endif; ?>
                                 <input type ="hidden" value="<?php echo $productId; ?>" name="product_id">
           <textarea name="comment" placeholder="Enter your comment here" required=""></textarea>
            <input type="hidden" value="pos" name="sentiment">

           <input type="submit" name="btnLogin" value="Submit">
         </form>
         
          </div>

    </div>
    </main>
  </div>
</div>
</div>

  <?php 
  function display($conn, $result,$score) {
  // echo 'DONE';
    echo "<div class='top-brands just_for_you'>";
     echo "<div class='container'> 

    <h3>Similar Products</h3>";
     echo "<div class='agile_top_brands_grids for_you'>";
  if ($result == 0) {
   echo "";
  } else {
    $i=0;
    foreach ($result as $value) {
      $id = $value['mobile'];
      $sql = $conn->query("SELECT * from products where id ='$id' limit 1");
      $result = mysqli_fetch_object($sql);
?>
           
                <div class="col-md-mobiles top_brand_left">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
                            
                                <figure>
                                        <div class="snipcart-thumb">
                                            <div class="home_image"><a href="<?php echo home_url(); ?>/pages/product-details.php?id=<?php echo $result->id; ?>"><img alt="image" src="<?php echo _ADMIN_URL . "/uploads/products/" . $result->photo_name; ?>"></a></div>
                                            <a href="<?php echo home_url(); ?>/pages/product-details.php?id=<?php echo $result->id; ?>"> <p><?php echo $result->name ; ?></p></a>
                                            <h4>
                                              <?php 
                                            echo "score:" .$score[$i]."<br>";
                                                $i=$i+1; ?>Rs. <?php echo print_money($result->price); ?> <?php if($result->price < $result->previous_price): ?>
                                                <span>Rs. <?php echo print_money($result->previous_price);
                                                echo "Score:" .$score[$i];
                                                $i=$i+1; ?> </span>
                                            <?php endif; ?></h4>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            
                                            <div class="add_to_cart">
<a href="<?php echo route('cart', ['action' => 'add-to-cart', 'product_id' => $result->id]); ?>">Add to cart</a>
                                            </div>
                                    </div>
                                </figure>
                                
                        </div>
                    </div>
                </div>

   
    <?php 
    }

  }
}

  $data1=[$detail['network'],$detail['sim'],$detail['os'],$detail['chipset'],$detail['ram'],$detail['internalstorage'],$detail['dresolution'],$detail['dsize'],$detail['resolution'],$detail['selfieeresolution'],$detail['fingerprint'],$detail['batterycapacity'],$detail['removable'],$detail['wirelesscharge']];
  $id=$detail['id'];
  $recommed1 = recomend($conn, $data1, $id,0);
if ($recommed1!=0){
  $recommed=array_slice($recommed1[0], 0, 5);
  $score=$recommed1[1];
}
else{
  $score="none";
}
display($conn, $recommed,$score);
echo "</div> </div> </div>";
  ?> 

    <?php include_once"../partials/footer.php"; ?>
