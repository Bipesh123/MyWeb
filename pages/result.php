<?php include_once '../config.php';?>
<?php include_once '../partials/header.php';
include '../algorithm/cosine.php';
include '../db.php';
?>
  <?php 
  function display($conn, $result,$score) {
  // echo 'DONE';
    echo "<div class='top-brands just_for_you'>";
     echo "<div class='container'> 

    <h3>Recommended For You</h3>";
     echo "<div class='agile_top_brands_grids for_you'>";
  if ($result[0] == 0) {
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
                                            <h4><?php echo "score:" .$score[$i] ?> </h4>
                                            <h4><?php 
                                           
                                                $i=$i+1; ?>Rs. <?php echo print_money($result->price); ?> <?php if($result->price < $result->previous_price): ?>
                                                <span>Rs. <?php echo print_money($result->previous_price); 
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
if (isset($_POST['submit'])) {
	// $pro_cat=$_POST['product_cat'];
	// $pro_id = uniqid();
	$pro_brand=array();
	foreach($_POST['brand'] as $key){
		$value="'".$key."'";
		array_push($pro_brand,$value);
	}
	// print_r($pro_brand);
	$pro_network = $_POST['network'];
	$pro_sim = $_POST['sim'];
	$pro_os = $_POST['os'];
	$pro_chipset = $_POST['chipset'];
	$pro_ram = $_POST['ram'];
	$pro_internalstorage = $_POST['internalstorage'];
	$pro_dresolution = $_POST['dresolution'];
	$pro_dsize = $_POST['dsize'];
	$pro_resolution = $_POST['resolution'];
	$pro_selfieeresolution = $_POST['selfieeresolution'];
	$pro_fingerprint = $_POST['fingerprint'];
	$pro_batterycapacity = $_POST['batterycapacity'];
	$pro_removable = $_POST['removable'];
	$pro_wireless = $_POST['wirelesscharge'];
	$lower = $_POST['price1'];
	$higher = $_POST['price2'];
	$other = [$pro_brand,$lower, $higher];
	$data = [$pro_network, $pro_sim, $pro_os,
		$pro_chipset,
		$pro_ram,
		$pro_internalstorage,
		$pro_dresolution,
		$pro_dsize,
		$pro_resolution,
		$pro_selfieeresolution,
		$pro_fingerprint,
		$pro_batterycapacity,
		$pro_removable,
		$pro_wireless];
	$recommed = recomend($conn, $data, 'filter', $other);
	if ($recommed[0]!=0){
	$recommed1=array_slice($recommed[0], 0, 10);
	 $score=$recommed[1];
}
else{
  $score="none";
}
display($conn, $recommed1,$score);
}
echo "</div> </div> </div>";

?>
<?php include_once '../partials/footer.php'; ?>