<?php
session_start();
include 'coneccion.php'; // Incluye tu archivo de conexión a la base de datos

class ProcesarComentarios {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Función para insertar un comentario en la base de datos
    public function insertarComentario($usuario, $opinion, $producto) {
        $opinion = mysqli_real_escape_string($this->conexion, $opinion);
        $producto = mysqli_real_escape_string($this->conexion, $producto);

        $query = "INSERT INTO opinion (name, opinion, producto) VALUES ('$usuario', '$opinion', '$producto')";

        if (mysqli_query($this->conexion, $query)) {
            return true;
        } else {
            return "Error: " . mysqli_error($this->conexion);
        }
    }

    // Función para obtener los comentarios de un producto específico
    public function obtenerComentariosPorProducto($producto) {
        $producto = mysqli_real_escape_string($this->conexion, $producto);
        $query = "SELECT * FROM opinion WHERE producto = '$producto'";

        $result = mysqli_query($this->conexion, $query);

        $comentarios = [];
        if ($result && mysqli_num_rows($result) > 0) {
            while ($comentario = mysqli_fetch_assoc($result)) {
                $comentarios[] = $comentario;
            }
        }

        return $comentarios;
    }
}

// Instancia de la clase ProcesarComentarios
$comentariosObj = new ProcesarComentarios($conexion);

// Lógica para manejar la inserción de un comentario si se ha enviado un formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_SESSION['usuario'];
    $opinion = $_POST['opinion'];
    $producto = $_POST['producto'];

    // Insertar el comentario utilizando la clase ProcesarComentarios
    $resultado = $comentariosObj->insertarComentario($usuario, $opinion, $producto);

    if ($resultado === true) {
        echo "<script>
            window.history.back();
        </script>";
    } else {
        echo "Error: " . $resultado;
    }
}
?>
