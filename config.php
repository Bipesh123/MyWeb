<?php
session_start();
if(empty($_SESSION['order_id'])){
        $_SESSION['order_id']=uniqid();
    }
/**
 * Site Configuration
 */
define('_SITE_NAME',        'Online Smartphone Shopping');
define('_ROOT_PATH',        __DIR__);
define('_ADMIN_PATH',        _ROOT_PATH . "/admin");
define('_ROOT_URL',         'http://' . $_SERVER['HTTP_HOST']);
define('_ADMIN_URL',         _ROOT_URL . "/admin");
/**
 * Loads the classes automatically
 *
 * @param $className
 */
function __autoload($className) {
    $classNames = str_replace('\\', '/', $className);
    $classFileName = __DIR__ . "/$classNames.php";
    if(file_exists($classFileName)) {
        include $classFileName;
    }
}
include_once _ROOT_PATH . "/Lib/functions.php";
/**
 * Database configuration
 */
define('_DATABASE_HOST',        'localhost');
define('_DATABASE_USER',        'root');
define('_DATABASE_PASSWORD',    '');
define('_DATABASE_NAME',        'mobileshopping');
/**
 * If visitor accessing admin page, then check if the adimn user is logged in or not
 */
if(strpos($_SERVER['REQUEST_URI'], 'admin') !== false) {
    $user = new \Lib\Models\User();
    $currentPage = basename($_SERVER['SCRIPT_NAME']);
    if ($currentPage != 'login.php' && !$user->isAdminLogin()) {
        $_SESSION['error'] = "Your session has been expired , please login.";
        header("Location: " . _ROOT_URL . "/admin/pages/login.php");
        die;
    }
}

if(strpos($_SERVER['REQUEST_URI'], 'checkout') !== false) {
    $customer = new \Lib\Models\Customer();
    $currentPage = basename($_SERVER['SCRIPT_NAME']);
    if ($currentPage != 'login.php' && !$customer->isCUstomerLogin()) {
        $_SESSION['error'] = "Your session has been expired , please login.";
        header("Location: " . _ROOT_URL . "/pages/checkout/login.php");
        die;
    }
}





