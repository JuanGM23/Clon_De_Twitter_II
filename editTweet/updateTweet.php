<?php
require_once 'TweetModel.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tweetId"]) && isset($_POST["editedTweet"])) {

    $tweetId = $_POST["tweetId"];
    $editedTweet = htmlspecialchars($_POST["editedTweet"]); 

    $tweetModel = new TweetModel();

    $tweetModel->actualizarTweet($tweetId, $editedTweet);

    header("Location: ../timeline/timeline.php");
    exit;
} else {
    header("Location: ../error/error.php");
    exit;
}
?>
