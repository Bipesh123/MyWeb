<?php
$sessionId  = session_id();
$error = null;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $category = new \Lib\Models\Checkout();

    // check if the given username already exists or not
    try {
        $category->create($_POST);
        $_SESSION['success'] = "";
        header("Location: /pages/success.php");
        die();
    }
    catch(\Lib\Core\BroadwayException $exception) {
        $error = $exception->getMessage();
    }
    catch(\Exception $exception) {
        $error = $exception->getMessage();
    }
}
?>
      <div id="cart_content">
            <div class="container">
                  <?php if(isset($error)) : ?>
                      <div class="alert alert-danger">
                          <?php echo $error; ?>
                      </div>
                      <?php endif; ?>

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo home_url(); ?>">Home</a>
                        </li>
                        <li>Checkout</li>
                    </ul>
                </div>
                <div class="col-md-9" id="checkout">

                    <div class="box">
                        <form enctype="multipart/form-data"  method="post">
                            <h1>Checkout</h1>

                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="firstname">Firstname</label>
                                            <input type="text" class="form-control" id="firstname" name="first_name" required="" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="lastname">Lastname</label>
                                            <input type="text" class="form-control" id="lastname" name="last_name" required="" value="">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="company">Email</label>
                                            <input type="email" class="form-control" placeholder="Please enter your email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="street">Street</label>
                                            <input type="text" class="form-control" id="street"name="street" required="" value="">
                                        </div>
                                    </div>
                                </div>
                                <?php $uid=$_SESSION['cid']; ?>
                                <input type ="hidden" value="<?php echo $_SESSION['_customer']['full_name']; ?>" name="customer_name">
                              <!-- <?php    print_r($uid);?> -->
                                <!-- /.row -->
                                <?php $sid=$_SESSION['order_id']; ?>
                                <input type ="hidden" value="<?php echo $sid; ?>" name="session_id">
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="phone">Telephone</label>
                                            <input type="text" class="form-control" name="phone" placeholder="Please enter your phone number" data-meta="Field" value="" inputmode="numeric" pattern="[0-9]*"  required=""/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Payment Method</label><br>
                                            <input type="radio" class="cashdelivery" id="payment">Cash on Delivery<br>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.row -->
                            </div>

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="<?php echo route('cart'); ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to basket</a>
                                </div>
                                <div class="pull-right">  <button type="submit" class="btn btn-primary">Submit<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
