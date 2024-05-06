<?php
include_once "../config.php";

$error = null;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $category = new \Lib\Models\Customer();

    // check if the given username already exists or not
    try {
        $category->create($_POST);
        $_SESSION['success'] = "Your account was created successfully!";
        header("Location: login.php");
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

<?php include_once"../partials/header.php"; ?>
  <body>
    <div class="login">
        <?php if(isset($error)) : ?>
                      <div class="alert alert-danger">
                          <?php echo $error; ?>
                      </div>
                      <?php endif; ?>
                    <br />
    <div class="login_title">
   <h4> Create your Mobileshopping Account</h4>
   <P>Already member? <a href="<?php echo home_url(); ?>/pages/login.php"> Login</a> here.</P>
  </div>
        <form method="post" action="" name="frmLogin" id="frmLogin">
            <div class="loginbox">
            <div class="login-col1">
            <p>Full Name*</p>
            <input type="text" name="full_name" value="<?php echo isset($_POST['full_name']) ? $_POST['full_name'] : ''; ?>" placeholder="First Last" required=""/>
            <p>Email Address*</p>
            <input type="email" placeholder="Please enter your email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" required=""/>
            <P>Phone Number*</P>
            <input type="tel" name="phone_no" placeholder="eg: 9861037414" pattern="[9]{1}[78]{1}[0-9]{8}"  required=""/>
        </div>
        <div class="login-col2 signup">
            <p>Password*</p>
            <input type="password" name="password" placeholder="Enter Password" minlength="8" required=""/>
            <input type="submit" name="btnLogin" value="Sign Up">

        </div>
        </div>
        </form>
  </div>
 <?php include_once"../partials/footer.php"; ?>