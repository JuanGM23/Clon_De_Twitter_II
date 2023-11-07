<?php
session_start();
require_once 'Database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tweet'])) {

    if (!isset($_SESSION['userId'])) {
        header("Location: ../login/login.php");
        exit;
    }

    $tweetText = htmlspecialchars($_POST['tweet']);
    $userId = $_SESSION['userId']; 

    try {
        $db = new Database();
        $conn = $db->getConnection();

        $query = "INSERT INTO publications (userId, text, createDate) VALUES (:userId, :tweet, NOW())";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
        $stmt->bindParam(":tweet", $tweetText, PDO::PARAM_STR);

        if ($stmt->execute()) {
            header("Location: ../timeline/timeline.php");
            exit;
        } else {
            echo "Error al publicar el tweet. Por favor, intenta nuevamente.";
        }
    } catch (PDOException $e) {
        echo "Error de base de datos: " . $e->getMessage();
    }
} else {
    header("Location: ../index.php");
    exit;
}
?>
