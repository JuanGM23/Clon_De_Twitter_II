<?php
require_once 'TweetModel.php';

class TweetController {
    private $tweetModel;

    public function __construct() {
        $this->tweetModel = new TweetModel();
    }

    public function publishTweet($userId, $text) {

        $text = htmlspecialchars($text);
        $this->tweetModel->publishTweet($userId, $text);
        header("Location: ../timeline/timeline.php");
        exit;
    }

    public function showTimeline($userId, $page, $tweetsPerPage) {

        $timelineTweets = $this->tweetModel->getPaginatedTweets($userId, $page, $tweetsPerPage);
        $totalTweets = $this->tweetModel->getTotalTweets($userId);
        $totalPages = ceil($totalTweets / $tweetsPerPage);
        include '../timeline/timeline.php';
    }

}
?>
