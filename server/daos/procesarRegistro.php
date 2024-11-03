<?php 
include 'coneccion.php';

$username = $_POST['username'];
$password = $_POST['password'];

$username = mysqli_real_escape_string($conexion, $username);
$password = mysqli_real_escape_string($conexion, $password);

$query = "INSERT INTO usuarios(username, password) VALUES ('$username', '$password')";

$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo "Registro insertado correctamente.";
} else {
    echo "Error al insertar registro: " . mysqli_error($conexion);
}

?>
