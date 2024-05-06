<?php
include_once "../../config.php";

$error = null;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $brand = new \Lib\Models\Brand();

    try {
        $brandPhotos = _ADMIN_PATH . "/uploads/brands";
        $postData = $_POST;
        $postData['photo_name'] = null;
        if(is_uploaded_file($_FILES['photo_name']['tmp_name'])) {
            $fileName = basename($_FILES['photo_name']['name']);
            move_uploaded_file($_FILES['photo_name']['tmp_name'], $brandPhotos . "/" . $fileName);
            $postData['photo_name'] = $fileName;
        }
        $brand->create($postData);
        $_SESSION['success'] = "Brand added successfully!";
        header("Location: ../pages/brands.php");
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
   <h4> Add Brand</h4>
   <P><a href="../pages/brands.php"> << Back</a></P>
  </div>
        <form enctype="multipart/form-data" method="post" id="brand_edit" name="brand_edit" action="">
            <div class="loginbox">
            <div class="login-col1">
            <p>Brand*</p>
            <input type="text" name="name" vlaue="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>"placeholder="Brand name" required=""/>
         
             <p>Photo</p>
             <input type="file" id="photo_name" name="photo_name" value="">
          </div>
        <div class="login-col2 signup">
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