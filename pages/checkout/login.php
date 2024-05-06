<?php
include_once "../../config.php";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new \Lib\Models\Customer();
    $username = $_POST['email'];
    $password = $_POST['password'];
    /**
     * $loginResult variable will either contain false (if login failed)
     * Or user's data in associative array if successful login
     */
    try {
        $loginResult = $user->checkLogin($username, $password);

        if ($loginResult) {
            $_SESSION['cid']=$username;
            header("Location:" . _ROOT_URL . "/?page=checkout");
            die;
        } else {
            $_SESSION['error'] = "Invalid login details";
            header("Location: login.php");
            die;
        }
    }
    catch (\Lib\Core\ShoppingException $exception) {
        $_SESSION['error'] = $exception->getMessage();
        header("Location: login.php");
        die;
    }

}

?>

<?php include_once"../../partials/header.php"; ?>
  <body>
    <div class="login">
    <div class="login_title">
   <h4> Welcome to Mobileshopping! Please login.</h4>
   <P>New member?<a href="<?php echo home_url(); ?>/pages/signup.php">  Register </a> here.</P>
  </div>
        <form method="post" action="" name="frmLogin" id="frmLogin">
            <div class="loginbox">
              <?php if(isset($_SESSION['error'])) : ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>
            <div class="login-col1">
            <p>Email*</p>
            <input type="text" name="email" placeholder="Please enter your Email" required=""/>
            <p>Password*</p>
            <input id="password-field" type="password" name="password" placeholder="Please enter your password" required=""/>
             <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
        </div>
        <div class="login-col2">
            <input type="submit" name="btnLogin" value="Login">
        </div>
        </div>
        </form>
  </div>
    
<?php include_once"../../partials/footer.php"; ?>