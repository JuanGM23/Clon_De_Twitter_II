<?php
session_start();
require_once 'UserController.php';

if (!isset($_SESSION['userId'])) {
    header("Location: ../login/login.php");
    exit;
}

$userController = new UserController();
$userData = $userController->getUserById($_SESSION['userId']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newDescription = $_POST['description'];

    $userController->editDescription($_SESSION['userId'], $newDescription);

    header("Location: ../profile/profile.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-group button {
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 12px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Perfil</h1>
        <form action="editProfileForm.php" method="post" class="form-group">
            <label for="description">Descripción:</label>
            <textarea id="description" name="description" rows="4" cols="50"><?php echo htmlspecialchars($userData['description']); ?></textarea><br>
            <button type="submit">Guardar Descripción</button>
        </form>
    </div>
</body>
</html>
