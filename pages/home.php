<!-- //top-brands -->
<?php    $item = new \Lib\Models\Product();
                $items = $item->listFeaturedItems();
                $brand = new \Lib\Models\Brand();
             $brands = $brand->menuBrands();
                ?>

<?php include_once _ROOT_PATH ."/partials/banner.php"; ?>
<div class="top-brands just_for_you">
        <div class="container">
<h3>Mobiles / Smartphones</h3>
            <div class="agile_top_brands_grids for_you">
            
                <?php $i = 0; foreach($items as $item):if ($i == 10) { break; } ?>
                <div class="col-md-mobiles top_brand_left">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
                            
                                <figure>
                                        <div class="snipcart-thumb">
                                            <div class="home_image"><a href="pages/product-details.php?id=<?php echo $item['id']; ?>"><img alt="image" src="<?php echo _ADMIN_URL . "/uploads/products/" . $item['photo_name']; ?>"></a></div>
                                            <a href="pages/product-details.php?id=<?php echo $item['id']; ?>"> <p><?php echo $item['name']; ?></p></a>
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
                                            <?php if($item['stock_quantity'] <= 0): ?>
          <?php else: ?>
                                            <div class="add_to_cart">
<a href="<?php echo route('cart', ['action' => 'add-to-cart', 'product_id' => $item['id']]); ?>">Add to cart</a>
                                            </div>
                                            <?php endif; ?>
                                    </div>
                                </figure>
                                
                        </div>
                    </div>
                </div>

                <?php $i++; endforeach; ?>
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
                        <a href="pages/brand-items.php?id=<?php echo $brand['id']; ?>"><div class="agile_top_brand_left_grid">
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