<?php include_once"../config.php"; ?>
  <?php include_once"../partials/header.php"; ?>
  <body>
  	<!-- //top-brands -->
<?php
        $id = isset($_GET['id']) ? (int) $_GET['id'] : null;

        $product = new \Lib\Models\Product();
        $brandObject = new \Lib\Models\Brand();
        $brands = $brandObject->menuBrands();

        $brand = null;
        if(!empty($id)) {
            $brand = $brandObject->getSingle($id);
        }

        $products = $product->brandProducts($id);
        ?>
<div class="top-brands just_for_you inner">
        <div class="container">
			<h3><a href="<?php echo home_url();?>"> Home </a><i class="fa fa-chevron-right"></i>
			 <?php if(!empty($id)) :?><?php echo $brand['name']; ?> 
                <?php endif; ?>
			</h3>
            <div class="agile_top_brands_grids for_you">
            
               <?php if(!empty($products)): ?>
                        <?php foreach($products as $product): ?>
                <div class="col-md-mobiles top_brand_left">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
                            
                                <figure>
                                        <div class="snipcart-thumb">
                                            <div class="home_image"><a href="<?php echo home_url(); ?>/pages/product-details.php?id=<?php echo $product['id']; ?>"><img alt="image" src="<?php echo _ADMIN_URL . "/uploads/products/" . $product['photo_name']; ?>"></a></div>
                                            <a href="<?php echo home_url(); ?>/pages/product-details.php?id=<?php echo $product['id']; ?>"> <p><?php echo $product['name']; ?></p></a>
                                            <h4>AUD <?php echo print_money($product['price']); ?> <?php if($product['price'] <$product['previous_price']): ?>
                                                <span>AUD <?php echo print_money($product['previous_price']); ?> </span>
                                            <?php endif; ?></h4>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <?php if($product['stock_quantity'] <= 0): ?>
          <?php else: ?>
                                            <div class="add_to_cart">
<a href="<?php echo route('cart', ['action' => 'add-to-cart', 'product_id' => $product['id']]); ?>">Add to cart</a>
                                            </div>
                                    </div>
                                <?php endif; ?>
                                </figure>
                                
                        </div>
                    </div>
                </div> 
            <?php endforeach; ?>
            <?php else: ?>
                <div class="no_branditems">
                <?php if(!empty($id)) :?>
                <p>No products found in <strong><?php echo $brand['name']; ?></strong>.</p>
                <?php else: ?>
                    <p>No products found !</p>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="top-brands brand_icon">
        <div class="container">
            <h3>Top Brands</h3>
            <div class="agile_top_brands_grids">
                <?php $i = 0; foreach($brands as $brand):if ($i == 8) { break; } ?>
                <div class="col_brand top_brand_left">
                    <div class="hover14 column">
                        <a href="<?php echo home_url(); ?>/pages/brand-items.php?id=<?php echo $brand['id']; ?>"><div class="agile_top_brand_left_grid">
                                <figure>
                                        <div class="snipcart-thumb">
                                            <img title=" " alt="images " src="<?php echo _ADMIN_URL . "/uploads/brands/" . $brand['photo_name']; ?>" >
                                    </div>
                                </figure>
                        </div></a>
                    </div>
                </div>
                <?php $i++; endforeach; ?>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
<!-- top-brands -->
<?php include_once"../partials/footer.php"; ?>