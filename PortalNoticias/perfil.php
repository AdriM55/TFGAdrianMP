<?php
session_start();

// Verificar si hay una sesión activa
if (!isset($_SESSION["usuario"]) || $_SESSION["usuario"] == null) {
    header("Location: login.php");
    exit(); // Finalizar el script para evitar ejecución adicional
}

// Simular el número de comentarios
$num_comentarios = 10; // Reemplazar esto con la cantidad real de comentarios del usuario

$nombre_usuario = $_SESSION["usuario"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>
<body>

    <p>Nombre de usuario: <?php echo $nombre_usuario; ?></p>

    <p>Número de comentarios: <?php echo $num_comentarios; ?></p>

    <a href="logout.php">Cerrar sesión</a>
    <a href="index.php">Volver al inicio</a>

</body>
</html>
