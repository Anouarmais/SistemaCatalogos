<?php
session_start();
include 'coneccion.php'; 
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$usuario = $_SESSION['usuario'];

$sql = "SELECT nombrecompleto, email, username, ubicacion, telefono FROM usuarios WHERE username = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    $nombrecompleto = $fila['nombrecompleto'];
    $email = $fila['email'];
    $username = $fila['username'];
    $ubicacion = $fila['ubicacion'];
    $telefono = $fila['telefono'];
} else {
    echo '
    <script>
    alert("User not found");
    window.location="../html/index.php";
    </script>';
    session_destroy();
    die();  
}

$stmt->close();
$conexion->close();
?>
