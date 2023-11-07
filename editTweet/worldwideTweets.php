<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tweets de todo el mundo</title>
</head>
<body>
    <h1>Tweets de todo el mundo</h1>
    <ul>
        <?php foreach ($worldwideTweets as $tweet): ?>
            <li>
                <strong><?php echo htmlspecialchars($tweet['username']); ?>:</strong> 
                <?php echo htmlspecialchars($tweet['text']); ?> 
                <small><?php echo htmlspecialchars($tweet['created_at']); ?></small> 
            </li>
        <?php endforeach; ?>
    </ul>

    <?php if (isset($_SESSION['userId'])): ?>
        <h2>Publicar un Nuevo Tweet</h2>
        <form action="publishTweet.php" method="post">
            <label for="newTweet">Escribe tu tweet:</label><br>
            <textarea id="newTweet" name="tweet" rows="4" cols="50" required></textarea><br>
            <button type="submit">Publicar Tweet</button>
        </form>
    <?php else: ?>
        <p><a href="../login/login.php">Inicia sesión</a> para publicar tus propios tweets.</p>
    <?php endif; ?>
</body>
</html>
