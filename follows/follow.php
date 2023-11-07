<?php
require_once 'UserController.php';

$userController = new UserController();
$userController->followUser($_SESSION['userId'], $_POST['userToFollowId']);
?>
