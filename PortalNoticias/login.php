<?php

session_start();
require_once("bd/bd.php");

// Redirigir si ya hay una sesión activa
if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] != null) {
    header("Location: index.php");
    exit(); // Finalizar el script para evitar ejecución adicional
}

// Verificar si se envió el formulario de inicio de sesión
if (isset($_POST["usuario"]) && isset($_POST["contrasena"])) {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    // Consulta SQL sin usar consulta preparada
    $consulta = "SELECT COUNT(*) FROM usuarios WHERE nombre_usuario = '$usuario' AND contrasena = '$contrasena'";

    try {
        // Conectar a la base de datos
        $conexionBD = new ConexionBD();
        $conexion = $conexionBD->obtenerConexion();

        // Ejecutar la consulta
        $resultado = $conexion->query($consulta);

        // Obtener el número de filas encontradas
        $num_filas = $resultado->fetchColumn();

        // Verificar si se encontraron resultados
        if ($num_filas > 0) {
            $_SESSION["usuario"] = $usuario;
            header("Location: index.php");
            exit();
        } else {
            $_SESSION["error"] = "Usuario o contraseña incorrecto";
        }
    } catch (PDOException $e) {
        die("Error al conectar a la base de datos: " . $e->getMessage());
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
    
    <form method="get" action="registro.php">
        <input type="submit" value="Registro">
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
