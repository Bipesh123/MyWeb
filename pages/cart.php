<?php
$cartObject = new \Lib\Models\Cart();
$sessionId = $_SESSION['order_id'];
$items = $cartObject->listCart($sessionId);
?>
        <div id="cart_content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo home_url(); ?>">Home</a>
                        </li>
                        <li>Shopping cart</li>
                    </ul>
                </div>
                      <?php if(!empty($items)): ?>
                <div class="col-md-10" id="basket">

                    <div class="box">

                        <form method="post" action="<?php echo route('cart', ['action' => 'update-cart']); ?>">

                            <h1>Shopping cart</h1>
                            <p class="text-muted">You currently have <?php echo $cartObject->getCartTotalQuantity($sessionId); ?> item(s) in your cart.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Quantity</th>
                                            <th>Unit price</th>
                                            <th colspan="2">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total = 0; ?>
                                        <?php foreach($items as $item):
                                            $total += $item['total'];
                                            ?>
                                        <tr>
                                            <td>
                                                
                                                <a href="<?php echo home_url(); ?>/pages/product-details.php?id=<?php echo $item['product_id']; ?>">
                                                    <img src="<?php echo _ADMIN_URL . "/uploads/products/" . $item['product_photo_name']; ?>" alt="image">
                                                </a>
                                            </td>
                                            <td><a href="<?php echo home_url(); ?>/pages/product-details.php?id=<?php echo $item['product_id']; ?>"><?php echo $item['product_name']; ?></a>
                                            </td>
                                            <td>
                                                <input name="quantity[<?php echo $item['id']; ?>]" type="number" value="<?php echo $item['quantity']; ?>" class="form-control" min="1" max="3">
                                            </td>
                                            <td>Rs. <?php echo print_price($item['price']); ?></td>
                                            <td>Rs. <?php echo print_price($item['total']); ?></td>
                                            <td>
                                                <a onclick="if(confirm('Are you sure to delete this item from the cart?')){return true;}else{return false;}" href="<?php echo route('cart', ['action' => 'delete-cart-item', 'id' => $item['id']]); ?>"><i class="fa fa-trash-o"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="4">Total</th>
                                            <th colspan="2">Rs. <?php echo print_price($total); ?></th>
                                        </tr>
                                        
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="<?php echo route('home'); ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-refresh"></i> Update basket</button>
                                    <a href="<?php echo route('checkout'); ?>" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>

                        </form>

                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col-md-9 -->
                <?php else: ?>
                    <div class=" col-md-12 cart_empty">
                    <p>Your shopping cart is empty!</p>
                                    <a href="<?php echo route('home'); ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                </div>
                <?php endif; ?>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
