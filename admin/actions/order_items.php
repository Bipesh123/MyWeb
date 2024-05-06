<?php
include_once "../../config.php";
$user = new \Lib\Models\Cart();
$sessionId = $_GET['id'];
$users = $user->listCart($sessionId);
?>

<?php include_once "../partials/header.php";?>
<?php include_once "../partials/navigation.php";?>
  <main class="app-content">
                   <div class="title_left">
                <h3>Order Items</h3>
              </div>
                <div class="title_right">
                  <h3>
                  <a href="../pages/orders.php"><< Back</a></h3>
              </div>
                
             <table class="table">
                        <thead>
                          <tr class="headings">
                            <th>S.N.</th>
                            <th>product Name </th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                          </tr>
                        </thead>

                        <tbody>
                            <?php $total = 0; ?>
                                        
                        <?php if(count($users)) : ?>
                            <?php $counter = 1; ?>
                            <?php foreach($users as $user): ?>
                                <?php 
                                            $total += $user['total'];
                                            ?>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <?php echo $counter; ?>
                            </td>
                            <td class=" "><?php echo $user['product_name']; ?></td>

                            <td class=" "><?php echo $user['price']; ?></td>
                            <td class=" "><?php echo $user['quantity']; ?></td>
                            <td class=" "><?php echo $user['total']; ?></td>
                            <td class=" "><?php $id=$user['product_id'];
                            $q=$user['quantity']; 
                            $i=$user['id']; 
                            $check=$user['status'];
                            if($check==0){?>
                            <a href='approve.php?aid=<?php echo $id; ?>&q=<?php echo $q; ?>&id=<?php echo $i; ?>'>Approve</a>
                          <?php }
                          else{

                            echo 'approved';
                          } ?>
                             </td>
                          </tr>
                            <?php $counter++; ?>
                        <?php endforeach; ?>
                        <?php else :?>
                            <tr>
                                <td colspan="7" class="text-center">No order Item(s) found.</td>
                            </tr>
                        <?php endif; ?>
                        
                        </tbody>

                      </table>
                      <div class="total">
                        <h3>Total =
                       <?php echo print_price($total); ?></h3>
                   </div>
              
            <div class="clearfix"></div>
 </main>         
<?php include_once "../partials/footer.php";?>