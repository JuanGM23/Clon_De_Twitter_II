<?php
require_once 'ProfileModel.php';

class ProfileController {
    private $profileModel;

    public function __construct() {
        $this->profileModel = new ProfileModel();
    }

    public function showProfile($userId) {
        $userData = $this->profileModel->getUserData($userId); 
        $isCurrentUser = ($userId == $_SESSION['userId']); 
        $isFollowing = $this->profileModel->checkIfUserIsFollowing($_SESSION['userId'], $userId);

        include '../profile/profile.php';
    }

    public function editProfileDescription($userId, $newDescription) {

        $this->profileModel->updateDescription($userId, $newDescription); 
        header("Location: ../profile/profile.php?userId=" . $userId);
        exit;
    }

    public function followUser($userToFollowId) {

        $this->profileModel->followUser($_SESSION['userId'], $userToFollowId); 
        header("Location: ../profile/profile.php?userId=" . $userToFollowId);
        exit;
    }

    public function unfollowUser($userToUnfollowId) {

        $this->profileModel->unfollowUser($_SESSION['userId'], $userToUnfollowId); 
        header("Location: ../profile/profile.php?userId=" . $userToUnfollowId);
        exit;
    }
}
?>
