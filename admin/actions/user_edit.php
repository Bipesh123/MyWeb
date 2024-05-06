<?php
include_once "../../config.php";

$user = new \Lib\Models\User();

$id = (int) $_GET['id'];
$userInfo = $user->getSingle($id);

if(!$userInfo) {
    $_SESSION['error'] = "User with ID $id not found!";
    header("Location: ../pages/users.php");
    die();
}
//print_r($userInfo);die;
$error = null;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // check if the given username already exists or not
    try {
        $userPhotos = _ADMIN_PATH . "/uploads/users";
        $postData = $_POST;
        $postData['photo_name'] = $postData['photo_name_old'];
        if(is_uploaded_file($_FILES['photo_name']['tmp_name'])) {
            $fileName = basename($_FILES['photo_name']['name']);
            move_uploaded_file($_FILES['photo_name']['tmp_name'], $userPhotos . "/" . $fileName);
            $postData['photo_name'] = $fileName;

            /**
             * Delete old file if the user has already
             */
            if(file_exists($userPhotos . "/" . $postData['photo_name_old'])) {
                unlink($userPhotos . "/" . $postData['photo_name_old']);
            }
        }

        $user->update($postData, $id);
        $_SESSION['success'] = "User information updated successfully!";
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
   <h4> Edit User</h4>
   <P><a href="../pages/users.php"> << Back</a></P>
  </div>
        <form enctype="multipart/form-data" method="post" id="user_edit" name="user_edit" action="">
            <div class="loginbox">
            <div class="login-col1">
            <p>Full Name*</p>
            <input value="<?php echo $userInfo['full_name']; ?>" type="text" id="full_name" name="full_name" required=""/>
            <p>Email Address*</p>
            <input type="email" name="email" value="<?php echo $userInfo['email']; ?>"required=""/>
             <p>Userame*</p>
            <input id="username" readonly value="<?php echo $userInfo['username']; ?>" class="form-control col-md-7 col-xs-12" type="text" name="username" required=""/>
            <p>Password*</p>
            <input minlength="8" autocomplete="off" id="password" class="form-control col-md-7 col-xs-12" type="password" name="password">
           
          </div>
        <div class="login-col2 signup">
          <p>Photo</p>
          <input type="hidden" name="photo_name_old" value="<?php echo $userInfo['photo_name']; ?>">
                                <?php if(!empty($userInfo['photo_name'])): ?>
                                <img width="100" src="<?php echo _ADMIN_URL . "/uploads/users/" . $userInfo['photo_name']; ?>" class="img">
                                <?php endif; ?>

                                <input type="file" class="form-control" id="photo_name" name="photo_name">
            <div class="radio">
            <p>Status*</p>
            <input type="radio"<?php echo $userInfo['status'] == 1 ? ' checked' : null; ?> name="status" value="1"> &nbsp; Active &nbsp;
                              <input type="radio"<?php echo $userInfo['status'] == 0 ? ' checked' : null; ?> name="status" value="0"> Inactive
            <input type="submit" name="btnLogin" value="Submit">
            </div>
        </div>
        </div>
        </form>
  </div>
</main>
<?php include_once "../partials/footer.php";?>
