<?php
include_once "../../config.php";

$user = new \Lib\Models\Checkout();
$users = $user->all();
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
                <h3>Orders</h3>
              </div>
                
             <table class="table">
                        <thead>
                          <tr class="headings">
                            <th>S.N.</th>
                            <th>First Name </th>
                            <th>Street</th>
                            <th>Phone</th>
                            <th>Customer Name</th>
                            <th>Order Status</th>
                            <th>Order Date</th>
                            <th>Order Items</th>
                            <th><span class="nobr">Action</span>
                          </tr>
                        </thead>

                        <tbody>
                        <?php if(count($users)) : ?>
                            <?php $counter = 1; ?>
                            <?php foreach($users as $user): ?>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <?php echo $counter; ?>
                            </td>
                            <td class=" "><?php echo $user['first_name']; ?></td>

                            <td class=" "><?php echo $user['street']; ?></td>
                            <td class=" "><?php echo $user['phone']; ?></td>
                            <td class=" "><?php echo $user['customer_name']; ?></td>


                          <td class=" ">
                                <?php if($user['order_status'] == 0): ?>
                                <az>Pending</a>
                                <?php else: ?>
                                <a><?php echo "approved"; ?></a>
                                <?php endif; ?>
                            </td>
                             <td class=" "><?php echo $user['created_date']; ?></td>
                             <td class=" "><a href="../actions/order_items.php?id=<?php echo $user['session_id']; ?>"> View </a></td>
                            <td class=" last">
                                <a onclick="if(confirm('Are you sure to delete this user ?')){return true;}else{return false;}" href="../actions/order_delete.php?id=<?php echo $user['id']; ?>">Delete</a>
                            </td>
                          </tr>
                            <?php $counter++; ?>
                        <?php endforeach; ?>
                        <?php else :?>
                            <tr>
                                <td colspan="7" class="text-center">No orders(s) found.</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                      </table>
              
            <div class="clearfix"></div>
 </main>         
<?php include_once "../partials/footer.php";?>