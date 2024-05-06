<?php
include_once "../../config.php";

$error = null;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $user = new \Lib\Models\User();

    try {
        $userPhotos = _ADMIN_PATH . "/uploads/users";
        $postData = $_POST;
        $postData['photo_name'] = null;
        if(is_uploaded_file($_FILES['photo_name']['tmp_name'])) {
            $fileName = basename($_FILES['photo_name']['name']);
            move_uploaded_file($_FILES['photo_name']['tmp_name'], $userPhotos . "/" . $fileName);
            $postData['photo_name'] = $fileName;
        }
        $user->create($postData);
        $_SESSION['success'] = "User added successfully!";
        header("Location: ../pages/users.php");
        die();
    }
    catch(\Lib\Core\ShoppingException $exception) {
        $error = $exception->getMessage();
    }
    catch(\Exception $exception) {
        $error = $exception->getMessage();
    }
}
?>
    <?php include_once "../partials/header.php"; ?>
        <?php include_once "../partials/navigation.php"; ?>
        <main class="app-content">
          <?php if(isset($error)) : ?>
                      <div class="alert alert-danger">
                          <?php echo $error; ?>
                      </div>
                      <?php endif; ?>
                    <br />
        <div class="login">
    <div class="login_title">
   <h4> Add User</h4>
   <P><a href="../pages/users.php"> << Back</a></P>
  </div>
        <form enctype="multipart/form-data" method="post" id="user_add" name="user_add" action="">
            <div class="loginbox">
            <div class="login-col1">
            <p>Full Name*</p>
            <input type="text" name="full_name" vlaue="<?php echo isset($_POST['full_name']) ? $_POST['full_name'] : ''; ?>"placeholder="First Last" required=""/>
            <p>Email Address*</p>
            <input type="email" placeholder="Please enter your email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>"required=""/>
             <p>Userame*</p>
            <input type="text" name="username" vlaue="" placeholder="Username" required=""/>
            <p>Password*</p>
            <input type="password" name="password" placeholder="Enter Password" minlength="8" required=""/>
           
          </div>
        <div class="login-col2 signup">
         
             <p>Photo</p>
             <input type="file" id="photo_name" name="photo_name" value="">
            <div class="radio">
            <p>Status*</p>
            <input type="radio" name="status" value="1"> &nbsp; Active &nbsp;
                              <input type="radio" name="status" value="0"> Inactive
            <input type="submit" name="btnLogin" value="Submit">
            </div>
        </div>
        </div>
        </form>
  </div>
</main>
<?php include_once "../partials/footer.php";?>