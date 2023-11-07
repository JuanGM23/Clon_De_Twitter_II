<?php
require_once 'Database.php';

class TweetModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function publishTweet($userId, $text) {
        $conn = $this->db->getConnection();
        if ($conn) {
            try {

                $query = "INSERT INTO publications (userId, text, createDate) VALUES (:userId, :text, NOW())";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
                $stmt->bindParam(':text', $text, PDO::PARAM_STR);
                $stmt->execute();

            } catch (PDOException $e) {

                echo "Error de base de datos: " . $e->getMessage();
            }
        }
    }

    public function getPaginatedTweets($userId, $page, $tweetsPerPage) {
        $conn = $this->db->getConnection();
        if ($conn) {
            try {

                $startIndex = ($page - 1) * $tweetsPerPage;

                $query = "SELECT * FROM publications WHERE userId = :userId ORDER BY createDate DESC LIMIT :startIndex, :tweetsPerPage";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
                $stmt->bindParam(':startIndex', $startIndex, PDO::PARAM_INT);
                $stmt->bindParam(':tweetsPerPage', $tweetsPerPage, PDO::PARAM_INT);
                $stmt->execute();

                $tweets = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $tweets;
            } catch (PDOException $e) {

                echo "Error de base de datos: " . $e->getMessage();
            }
        }
        return null;
    }

    public function getTotalTweets($userId) {
        $conn = $this->db->getConnection();
        if ($conn) {
            try {

                $query = "SELECT COUNT(*) as total FROM publications WHERE userId = :userId";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['total'];
            } catch (PDOException $e) {

                echo "Error de base de datos: " . $e->getMessage();
            }
        }
        return 0;
    }
}
?>
