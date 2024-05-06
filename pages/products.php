<?php include_once"../config.php"; ?>
  <?php include_once"../partials/header.php"; ?>
  <?php    $item = new \Lib\Models\Product();
                $items = $item->listFeaturedItems();
                $brand = new \Lib\Models\Brand();
             $brands = $brand->menuBrands();
                ?>
<div class="top-brands just_for_you">
        <div class="container">
<h3> <a href="<?php echo home_url(); ?>">Home</a>
                        <i class="fa fa-chevron-right"></i>Mobiles / Smartphones</h3>
            <div class="agile_top_brands_grids for_you">
            
                <?php foreach($items as $item):?>
                <div class="col-md-mobiles top_brand_left">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
                            
                                <figure>
                                        <div class="snipcart-thumb">
                                            <div class="home_image"><a href="<?php echo home_url(); ?>/pages/product-details.php?id=<?php echo $item['id']; ?>"><img alt="image" src="<?php echo _ADMIN_URL . "/uploads/products/" . $item['photo_name']; ?>"></a></div>
                                            <a href="<?php echo home_url(); ?>/pages/product-details.php?id=<?php echo $item['id']; ?>"> <p><?php echo $item['name']; ?></p></a>
                                            <h4>AUD <?php echo print_money($item['price']); ?> <?php if($item['price'] <$item['previous_price']): ?>
                                                <span>AUD <?php echo print_money($item['previous_price']); ?> </span>
                                            <?php endif; ?></h4>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="add_to_cart">
<a href="<?php echo route('cart', ['action' => 'add-to-cart', 'product_id' => $item['id']]); ?>">Add to cart</a>
                                            </div>
                                    </div>
                                </figure>
                                
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php include_once"../partials/footer.php"; ?>