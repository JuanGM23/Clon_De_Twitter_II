<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tweet</title>
</head>
<body>
    <h1>Editar Tweet</h1>
    <?php
    $tweetId = $_GET['tweetId'];

    $tweet = obtenerTweetPorId($tweetId); 

    if ($tweet) {
    ?>
    <form action="updateTweet.php" method="post">
        <input type="hidden" name="tweetId" value="<?php echo $tweet['id']; ?>">
        <label for="editedTweet">Editar Tweet:</label>
        <textarea id="editedTweet" name="editedTweet" rows="4" cols="50" required><?php echo htmlspecialchars($tweet['text']); ?></textarea><br>
        <button type="submit">Guardar Cambios</button>
    </form>
    <?php
    } else {
        echo "<p>El tweet no existe o no tienes permisos para editarlo.</p>";
    }
    ?>
    <br>
    <a href="../timeline/timeline.php">Volver al Timeline</a>
</body>
</html>
