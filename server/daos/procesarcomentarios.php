<?php
session_start();
include 'coneccion.php'; 

class ProcesarComentarios {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

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


$comentariosObj = new ProcesarComentarios($conexion);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_SESSION['usuario'];
    $opinion = $_POST['opinion'];
    $producto = $_POST['producto'];


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
