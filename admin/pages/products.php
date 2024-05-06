<?php
include_once "../../config.php";

$item = new \Lib\Models\Product();
$items = $item->listProducts();
?>
<?php include_once "../partials/header.php";?>
<?php include_once "../partials/navigation.php";?>
  <main class="app-content">
                <?php if(isset($_SESSION['error'])) : ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>

                <?php if(isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>
              <div class="title_left">
                <h3>Products</h3>
              </div>
                <div class="title_right">
                  <h3>
                  <a href="../actions/product_add.php">
                          <span class="fa fa-plus"></span> Add Product</a></h3>
              </div>
             <table class="table">
                        <thead>
                          <tr class="headings">
                            <th>#</th>
                            <th>Name </th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>Stock </th>
                            <th>Comments</th>
                            <th>Status</th>
                            <th><span class="nobr">Action</span>
                          </tr>
                        </thead>

                        <tbody>
                        <?php if(count($items)) : ?>
                            <?php $counter = 1; ?>
                            <?php foreach($items as $item): ?>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <?php echo $counter; ?>
                            </td>
                            <td class=" "><?php echo $item['name']; ?></td>
                            <td class=" "><?php echo $item['brand_name']; ?></td>

                            <td class=" "><?php echo $item['price']; ?></td>
                            <td class=" "><?php echo $item['stock_quantity']; ?></td>
                            <td class=""> <a href="comments.php?id=<?php echo $item['id']; ?>" target="_blank"> comments</a></td>
                            <td class=" ">
                                <?php if($item['status'] == 1): ?>
                                <a>Active</a>
                                <?php else: ?>
                                <a >Inactive</a>
                                <?php endif; ?>
                            </td>
                            <td class="">
                                <a href="../actions/product_edit.php?id=<?php echo $item['id']; ?>">Edit</a> |
                                <a onclick="if(confirm('Are you sure to delete this item ?')){return true;}else{return false;}" href="../actions/product_delete.php?id=<?php echo $item['id']; ?>">Delete</a>
                            </td>
                          </tr>
                            <?php $counter++; ?>
                        <?php endforeach; ?>
                        <?php else :?>
                            <tr>
                                <td colspan="7" class="text-center">No item(s) found.</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                      </table>
              
            <div class="clearfix"></div>
 </main>         
<?php include_once "../partials/footer.php";?>