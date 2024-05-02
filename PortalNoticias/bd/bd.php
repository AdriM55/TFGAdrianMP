<?php
// Definir las constantes para la conexión a la base de datos
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "portalnoticias");

class ConexionBD {
  
    // Propiedad para almacenar la conexión PDO
    protected $conexion;

    // Constructor para establecer la conexión
    function __construct() {
        try {
            // Crear una nueva conexión PDO
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
            $this->conexion = new PDO($dsn, DB_USER, DB_PASS);

            // Configurar atributos de la conexión
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Manejar cualquier error al establecer la conexión
            die("Error al conectar a la base de datos: " . $e->getMessage());
        }
    }
    
    // Método para obtener la conexión
    function obtenerConexion() {
        return $this->conexion;
    }

    // Método para cerrar la conexión
    function cerrarConexion() {
        $this->conexion = null;
    }
}
?>
