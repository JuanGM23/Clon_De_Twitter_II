<?php
require_once 'UserModel.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function followUser($userId, $userToFollowId) {

        $this->userModel->followUser($userId, $userToFollowId);
    }

    public function unfollowUser($userId, $userToUnfollowId) {

        $this->userModel->unfollowUser($userId, $userToUnfollowId);
    }

    public function editDescription($userId, $description) {

        $this->userModel->updateUserDescription($userId, $description);
        header("Location: ../profile/profile.php");
        exit();
    }
}
?>
