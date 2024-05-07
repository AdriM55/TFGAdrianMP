<?php

session_start();
require_once("bd/bd.php");

// Verificar si se envió el formulario de registro
if (isset($_POST["usuario"]) && isset($_POST["contrasena"])) {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    // Consulta SQL para verificar si el usuario ya existe
    $consulta = "SELECT COUNT(*) FROM usuarios WHERE nombre_usuario = '$usuario'";

    try {
        // Conectar a la base de datos
        $conexionBD = new ConexionBD();
        $conexion = $conexionBD->obtenerConexion();

        // Ejecutar la consulta
        $resultado = $conexion->query($consulta);

        // Obtener el número de filas encontradas
        $num_filas = $resultado->fetchColumn();

        // Verificar si el usuario ya existe
        if ($num_filas > 0) {
            $_SESSION["error_registro"] = "El usuario ya existe";
        } else {
            // Insertar el nuevo usuario en la base de datos
            $consulta_insertar = "INSERT INTO usuarios (nombre_usuario, contrasena) VALUES ('$usuario', '$contrasena')";
            $conexion->exec($consulta_insertar);

            $_SESSION["exito_registro"] = "Registro exitoso. Ahora puedes iniciar sesión.";
            header("Location: login.php");
            exit();
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
    <title>Registro</title>
</head>
<body>

    <h1>Registro</h1>

    <form method="post" action="registro.php">
        Usuario: <input type="text" name="usuario"><br>
        Contraseña: <input type="password" name="contrasena"><br>
        <input type="submit" value="Registrarse">
    </form>
    
    <div style="color: green;">
        <p>
            <?php 
            if (isset($_SESSION["exito_registro"])) {
                echo $_SESSION["exito_registro"];
                unset($_SESSION["exito_registro"]); 
            }
            ?>
        </p>
    </div>
    
    <div style="color: red;">
        <p>
            <?php 
            if (isset($_SESSION["error_registro"])) {
                echo $_SESSION["error_registro"];
                unset($_SESSION["error_registro"]); 
            }
            ?>
        </p>
    </div>
    <button class="volver-inicio"><a href="login.php">Volver al inicio de sesión</a></button>
</body>
</html>
