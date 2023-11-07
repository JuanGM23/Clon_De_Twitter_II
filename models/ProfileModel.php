<?php
require_once 'Database.php';

class ProfileModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getUserData($userId) {

        $query = "SELECT * FROM users WHERE id = :userId";
        $params = array(':userId' => $userId);
        $userData = $this->db->query($query, $params)->fetch();
        return $userData;
    }

    public function updateDescription($userId, $newDescription) {

        $query = "UPDATE users SET description = :description WHERE id = :userId";
        $params = array(':description' => $newDescription, ':userId' => $userId);
        $this->db->execute($query, $params);
    }

    public function checkIfUserIsFollowing($followerId, $userToFollowId) {

        $query = "SELECT * FROM follows WHERE users_id = :followerId AND userToFollowId = :userToFollowId";
        $params = array(':followerId' => $followerId, ':userToFollowId' => $userToFollowId);
        $follow = $this->db->query($query, $params)->fetch();
        return ($follow !== false);
    }

    public function followUser($followerId, $userToFollowId) {

        $query = "INSERT INTO follows (users_id, userToFollowId) VALUES (:followerId, :userToFollowId)";
        $params = array(':followerId' => $followerId, ':userToFollowId' => $userToFollowId);
        $this->db->execute($query, $params);
    }

    public function unfollowUser($followerId, $userToUnfollowId) {

        $query = "DELETE FROM follows WHERE users_id = :followerId AND userToFollowId = :userToUnfollowId";
        $params = array(':followerId' => $followerId, ':userToUnfollowId' => $userToUnfollowId);
        $this->db->execute($query, $params);
    }
}
?>
