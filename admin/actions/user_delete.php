<?php
include_once "../../config.php";

$user = new \Lib\Models\User();

$id = (int) $_GET['id'];

$userPhotos = _ADMIN_PATH . "/uploads/users";

$userInfo = $user->getSingle($id);
if(file_exists($userPhotos . "/" . $userInfo['photo_name'])) {
    unlink($userPhotos . "/" . $userInfo['photo_name']);
}

$user->delete($id);
$_SESSION['success'] = "User has been deleted successfully!";
header("Location: ../pages/users.php");
die;