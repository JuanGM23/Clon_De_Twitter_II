<?php
require_once 'Database.php';
$worldwideTweets = []; 
$totalPages = 1; 
$page = 1;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 600px;
            width: 100%;
            animation: fadeIn 0.5s ease;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            color: #333;
        }

        .form-group button {
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 12px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #45a049;
        }

        .tweets-list {
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }

        .tweets-list li {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            text-align: left;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .tweets-list li:hover {
            transform: translateY(-5px);
        }

        .tweets-list small {
            color: #777;
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination a {
            margin: 0 5px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .pagination a.active {
            color: #4caf50;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h1>Bienvenido a Vedruitter, <?php echo isset($userData['username']) ? htmlspecialchars($userData['username']) : ''; ?>!</h1>

        <div class="form-group">
            <form action="../editTweet/publishTweet.php" method="post">
                <label for="tweet">Escribe un nuevo tweet:</label><br>
                <textarea id="tweet" name="tweet" rows="4" cols="50" required></textarea><br>
                <button type="submit">Publicar Tweet</button>
            </form>
        </div>

        <h2>Ver Tweets</h2>
        <ul class="tweets-list">
            <?php foreach ($worldwideTweets as $tweet): ?>
                <li>
                    <?php echo htmlspecialchars($tweet['text']); ?> 
                    <br>
                    <small>Publicado por: <?php echo htmlspecialchars($tweet['username']); ?> | Publicado el: <?php echo htmlspecialchars($tweet['created_at']); ?></small> 
                </li>
            <?php endforeach; ?>
        </ul>

        <!-- Paginación -->
        <div class="pagination">
            <?php
            
            for ($i = 1; $i <= $totalPages; $i++) {
                $activeClass = ($i == $page) ? 'class="active"' : '';
                echo '<a href="timeline.php?page=' . $i . '" ' . $activeClass . '>' . $i . '</a>';
            }
            ?>
        </div>

        <a href="../profile/profile.php">Ver mi perfil</a> | <a href="../logout/logout.php">Cerrar Sesión</a>
    </div>
</body>
</html>


