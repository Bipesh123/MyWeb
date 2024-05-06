<?php
include_once "../config.php"; 
$category = new \Lib\Models\Checkout();
$_SESSION['order_id']=null;

?>
<?php include_once"../partials/header.php"; ?>
 <div id="cart_content">
  <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo home_url(); ?>">Home</a>
                        </li>
                        <li>Success</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
                <div class="successtext">
                <div class=" col-md-12 cart_empty">
                    <p>Thank You!</p>
                    <p>Your orders was submitted successfully</p>
                    <p>we'll call You for further process after verification</p>
                                    <a href="<?php echo route('home'); ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                </div>
            </div>
            </div>
<?php include_once"../partials/footer.php"; ?>