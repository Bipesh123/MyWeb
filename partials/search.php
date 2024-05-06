<?php
include_once "../config.php"; ?>
<?php
include_once "header.php"; ?>

<?php
$conn=mysqli_connect("localhost", "root", "", "mobileshopping");
?>
 
<body>
	<?php echo "<div class='top-brands just_for_you'>";
     echo "<div class='container'> 

    <h3></h3>";
     echo "<div class='agile_top_brands_grids for_you'>"; ?>
<?php
    $query = $_POST['query']; 
    // gets value sent over search form
     
    $min_length = 3;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        
         
        $raw_results = mysqli_query($conn,"SELECT * FROM products
            WHERE (`name` LIKE '%".$query."%')") or die(mysqli_error());
   
         
         if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
         	 while($result = mysqli_fetch_array($raw_results)){
             
           

?>
	 
           <div class="col-md-mobiles top_brand_left">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
                            
                                <figure>
                                        <div class="snipcart-thumb">
                                            <div class="home_image"><a href="<?php echo home_url(); ?>/pages/product-details.php?id=<?php echo $result['id']; ?>"><img alt="image" src="<?php echo _ADMIN_URL . "/uploads/products/" . $result['photo_name']; ?>"></a></div>
                                            <a href="<?php echo home_url(); ?>/pages/product-details.php?id=<?php echo $result['id']; ?>"> <p><?php echo $result['name'] ; ?></p></a>
                                            <h4>Rs. <?php echo print_money($result['price']); ?> <?php if($result['price'] < $result['previous_price']): ?>
                                                <span>Rs. <?php echo print_money($result['previous_price']); 
                                                ?> </span>
                                            <?php endif; ?></h4>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="add_to_cart">
<a href="<?php echo route('cart', ['action' => 'add-to-cart', 'product_id' => $result['id']]); ?>">Add to cart</a>
                                            </div>
                                    </div>
                                </figure>
                                
                        </div>
                    </div>
                </div>

   <?php
    }
             
        }
        else{ // if there is no matching rows do following
            echo "No results";
        }
         
    }
    else{ // if query length is less than minimum
        echo "Minimum length is ".$min_length;
    }

echo "</div> </div> </div>";

?>
<?php include_once '../partials/footer.php'; ?>