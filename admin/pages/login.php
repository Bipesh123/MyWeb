<?php
include_once "../../config.php";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new \Lib\Models\User();
    $username = $_POST['username'];
    $password = $_POST['password'];

    /**
     * $loginResult variable will either contain false (if login failed)
     * Or user's data in associative array if successful login
     */
    try {
        $loginResult = $user->checkLogin($username, $password);

        if ($loginResult) {
            header("Location: ../index.php");
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

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
          
<link rel="stylesheet" type="text/css" href="<?php echo admin_url(); ?>/css/style.css">
  </head>

  <body>
      <div class="loginbox-admin">
    <img src="<?php echo admin_url(); ?>/images/avatar.png" class="avatar">
        <h1>Welcome</h1>
        <form method="post" action="" name="frmLogin" id="frmLogin">
           <?php if(isset($_SESSION['error'])) : ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username" required=""/>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" required=""/>
            <input type="submit" name="btnLogin" value="Login">
        </form>
        
    </div>
    
  </body>
</html>
