<?php
require_once 'Database.php';

class UserModel {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }

    public function registerUser($username, $email, $password, $description) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO users (username, email, password, description) VALUES (:username, :email, :password, :description)";
        $params = array(
            ':username' => $username,
            ':email' => $email,
            ':password' => $hashedPassword,
            ':description' => $description
        );

        try {
            $conn = $this->db->getConnection();
            $stmt = $conn->prepare($query);
            $stmt->execute($params);
        } catch(PDOException $e) {

            echo "Error en el registro: " . $e->getMessage();
        }
    }

    public function loginUser($username, $password) {
        
    }

    public function getUserInfo($userId) {
    
        $query = "SELECT * FROM users WHERE id = :userId";
        $params = array(':userId' => $userId);

        try {
            $conn = $this->db->getConnection();
            $stmt = $conn->prepare($query);
            $stmt->execute($params);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        } catch(PDOException $e) {
                           
            echo "Error al obtener la información del usuario: " . $e->getMessage();
            return null;
        }
    }

    public function updateUserDescription($userId, $description) {

        $query = "UPDATE users SET description = :description WHERE id = :userId";
        $params = array(':description' => $description, ':userId' => $userId);

        try {
            $conn = $this->db->getConnection();
            $stmt = $conn->prepare($query);
            $stmt->execute($params);
        } catch(PDOException $e) {

            echo "Error al actualizar la descripción del usuario: " . $e->getMessage();
        }
    }
}
?>
