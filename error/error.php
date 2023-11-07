<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .error-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .error-message {
            font-size: 24px;
            font-weight: bold;
            color: #ff0000;
            margin-bottom: 10px;
        }

        .error-description {
            font-size: 18px;
            color: #333333;
            margin-bottom: 20px;
        }

        .action-buttons {
            display: flex;
            gap: 20px;
        }

        .action-button {
            background-color: #4caf50;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            padding: 12px 20px;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .action-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-message">¡Oops! Algo salió mal.</div>
        <div class="error-description">
            Lamentablemente, no se pudo procesar tu solicitud en este momento.
            Por favor, intenta de nuevo más tarde o contacta al soporte técnico.
        </div>
        <div class="action-buttons">
            <a href="../index.php" class="action-button">Ir a la Página Principal</a>
            <a href="../contact_support/contact_support.php" class="action-button">Contactar al Soporte Técnico</a>
        </div>
    </div>
</body>
</html>
