<?php

require_once 'UserController.php';

session_start(); 


$userController = new UserController();

if(isset($_SESSION['userId']) && isset($_POST['description'])) {
    $userId = $_SESSION['userId'];
    $description = htmlspecialchars($_POST['description']); 

    if (!empty($description)) {
        $userController->editDescription($userId, $description);
        header("Location: ../profile/profile.php"); 
        exit;
    } else {
        $_SESSION['error'] = "La descripción no puede estar vacía.";
        header("Location: editProfileForm.php"); 
        exit;
    }
} else {
    $_SESSION['error'] = "Error: No se pudo editar la descripción.";
    header("Location: editProfileForm.php"); 
    exit;
}
?>
