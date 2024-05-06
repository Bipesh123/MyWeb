<?php include_once"../config.php"; ?>
  <?php include_once"../partials/header.php"; ?>
  <body>
<?php    
                $brand = new \Lib\Models\Brand();
             $brands = $brand->menuBrands();
                ?>
 <div class="top-brands brands">
        <div class="container">
            <h3>All Brands</h3>
            <div class="agile_top_brands_grids">
                <?php foreach($brands as $brand): ?>
                <div class="col-md-2 top_brand_left">
                    <div class="hover14 column">
                        <a href="<?php echo home_url(); ?>/pages/brand-items.php?id=<?php echo $brand['id']; ?>"><div class="agile_top_brand_left_grid">
                                <figure>
                                        <div class="snipcart-thumb">
                                            <img title=" " alt="images " src="<?php echo _ADMIN_URL . "/uploads/brands/" . $brand['photo_name']; ?>" > <p><?php echo $brand['name']; ?></p>
                                    </div>
                                </figure>
                        </div></a>
                    </div>
                </div>
                <?php endforeach; ?>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
<!-- top-brands -->
<?php include_once"../partials/footer.php"; ?>