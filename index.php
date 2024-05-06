<?php
include_once "config.php";
if(isset($_GET['action'])) {
    // write code to add the product in cart table
    $action = $_GET['action'];
    if(file_exists( _ROOT_PATH . "/action/$action.php")) {
        include_once _ROOT_PATH . "/action/$action.php";
    }
    else {
        die("No action file found.");
    }
}
?>
<?php include_once "partials/header.php"; ?>
<?php
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
        if(file_exists(_ROOT_PATH . "/pages/$page.php")) {
            include_once _ROOT_PATH . "/pages/$page.php";
        }
        else {

            include_once _ROOT_PATH . "/pages/404.php";
        }
        ?>
<?php include_once "partials/footer.php"; ?>
<?php if(isset($_GET['action'])) {
    // write code to add the product in cart table
    $action = $_GET['action'];
    if(file_exists( _ROOT_PATH . "/action/$action.php")) {
        include_once _ROOT_PATH . "/action/$action.php";
    }
    else {
        die("No action file found.");
    }
} ?>