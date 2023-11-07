<?php
session_start();

if (!isset($_SESSION['userId'])) {

    header("Location: ../login/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['userToUnfollowId'])) {

    require_once 'UserController.php';

    $userController = new UserController();

    $userController->unfollowUser($_SESSION['userId'], $_POST['userToUnfollowId']);

    header("Location: ../profile/profile.php");
    exit();
} else {

    header("Location: ../error/error.php");
    exit();
}
?>
