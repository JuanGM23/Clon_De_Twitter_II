<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactar Soporte Técnico</title>
</head>
<body>
    <h1>Contactar Soporte Técnico</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $mensaje = $_POST["mensaje"];

        echo "<p>Gracias por ponerte en contacto con nuestro equipo de soporte técnico. Te responderemos pronto.</p>";

    } else {

    ?>
    
    <form action="contact_support.php" method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br>
        
        <label for="email">Correo Electrónico:</label><br>
        <input type="email" id="email" name="email" required><br>
        
        <label for="mensaje">Mensaje:</label><br>
        <textarea id="mensaje" name="mensaje" rows="4" cols="50" required></textarea><br>
        
        <button type="submit">Enviar Mensaje</button>
    </form>

    <?php } ?>

</body>
</html>
