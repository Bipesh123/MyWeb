<?php
include_once "../../config.php";

$user = new \Lib\Models\User();
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
                <h3>Users</h3>
              </div>
                <div class="title_right">
                  <h3>
                  <a href="../actions/user_add.php">
                          <span class="fa fa-plus"></span> Add User</a></h3>
              </div>
             <table class="table">
                        <thead>
                          <tr class="headings">
                            <th>S.N.</th>
                            <th>Full Name </th>
                            <th>Username</th>
                            <th>Image</th>
                            <th>Email</th>
                            <th>Status </th>
                            <th>Last Login </th>
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
                            <td class=" "><?php echo $user['full_name']; ?></td>
                            <td class=" "><?php echo $user['username']; ?></td>
                            <td class="logo-image"> <img src="<?php echo _ADMIN_URL . "/uploads/users/" . $user['photo_name']; ?>" class="img"></td>

                            <td class=" "><?php echo $user['email']; ?></td>
                            <td class=" ">
                                <?php if($user['status'] == 1): ?>
                                <a>Active</a>
                                <?php else: ?>
                                <a >Inactive</a>
                                <?php endif; ?>
                            </td>
                            <td class="a-right a-right "><?php echo !empty($user['last_login']) ? $user['last_login'] : 'Never Login'; ?></td>
                            <td class=" last">
                                <a href="../actions/user_edit.php?id=<?php echo $user['id']; ?>">Edit</a> |
                                <a onclick="if(confirm('Are you sure to delete this user ?')){return true;}else{return false;}" href="../actions/user_delete.php?id=<?php echo $user['id']; ?>">Delete</a>
                            </td>
                          </tr>
                            <?php $counter++; ?>
                        <?php endforeach; ?>
                        <?php else :?>
                            <tr>
                                <td colspan="7" class="text-center">No user(s) found.</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                      </table>
              
            <div class="clearfix"></div>
 </main>         
<?php include_once "../partials/footer.php";?>