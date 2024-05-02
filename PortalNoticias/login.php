<?php

session_start();

// Redirigir si ya hay una sesión activa
if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] != null) {
    header("Location: index.php");
    exit(); // Finalizar el script para evitar ejecución adicional
}

// Verificar si se envió el formulario de inicio de sesión
if (isset($_POST["usuario"]) && isset($_POST["contrasena"])) {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    // Aquí puedes realizar la validación del usuario y contraseña en tu base de datos
    if ($usuario == "pepe" && $contrasena == "") {
        $_SESSION["usuario"] = $usuario;
        header("Location: index.php");
        exit(); // Finalizar el script después de redirigir
    } else {
        $_SESSION["error"] = "Usuario o contraseña incorrecto";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>

    <h1>Iniciar sesión</h1>

    <form method="post" action="login.php">
        Usuario: <input type="text" name="usuario"><br>
        Contraseña: <input type="password" name="contrasena"><br>
        <input type="submit" value="Enviar">
    </form>
    
    <div style="color: red;">
        <p>
            <?php 
            if (isset($_SESSION["error"])) {
                echo $_SESSION["error"];
                unset($_SESSION["error"]); 
            }
            ?>
        </p>
    </div>
    <button class="volver-inicio"><a href="index.php">Volver al inicio</a></button>
</body>
</html>
