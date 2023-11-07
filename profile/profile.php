<?php
session_start();

if (!isset($_SESSION['userId'])) {
    header("Location: ../login/login.php");
    exit;
}

require_once 'Database.php'; 

$db = new Database();
$conn = $db->getConnection();

$userId = $_SESSION['userId'];

$query = "SELECT id, username, description FROM users WHERE id = :userId";
$stmt = $conn->prepare($query);
$stmt->bindParam(":userId", $userId);
$stmt->execute();

$userData = $stmt->fetch(PDO::FETCH_ASSOC);


$isCurrentUser = true; 
$isFollowing = false; 

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
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
            max-width: 600px;
            width: 100%;
            animation: fadeIn 0.5s ease;
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

        .follow-button {
            margin-top: 10px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Perfil de <?php echo htmlspecialchars($userData['username']); ?></h1>
        <p>Descripción: <?php echo htmlspecialchars($userData['description']); ?></p>

        <form action="../editProfile/editProfile.php" method="post" class="form-group">
            <label for="description">Descripción:</label>
            <textarea id="description" name="description" rows="4" cols="50"><?php echo htmlspecialchars($userData['description']); ?></textarea><br>
            <button type="submit">Guardar Descripción</button>
        </form>

        <?php if (!$isCurrentUser): ?>
            <div class="follow-button">
                <?php if ($isFollowing): ?>
                    <form action="../follows/unfollow.php" method="post">
                        <input type="hidden" name="userToUnfollowId" value="<?php echo $userData['id']; ?>">
                        <button type="submit">Dejar de Seguir</button>
                    </form>
                <?php else: ?>
                    <form action="../follows/follow.php" method="post">
                        <input type="hidden" name="userToFollowId" value="<?php echo $userData['id']; ?>">
                        <button type="submit">Seguir</button>
                    </form>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
