<?php 
include 'coneccion.php';

$username = mysqli_real_escape_string($conexion, $_POST['username']);
$password = mysqli_real_escape_string($conexion, $_POST['password']);
$fullname = mysqli_real_escape_string($conexion, $_POST['fullname']);
$email = mysqli_real_escape_string($conexion, $_POST['email']);
$ubicacion = mysqli_real_escape_string($conexion, $_POST['ubicacion']);
$phone = mysqli_real_escape_string($conexion, $_POST['phone']);

// Define el valor de admin como 0 (usuario regular)
$admin = 0;

// Inserta todos los valores en la tabla 'usuarios'
$query = "INSERT INTO usuarios (username, password, admin, email, telefono, ubicacion, nombrecompleto) VALUES ('$username', '$password', '$admin', '$email', '$phone', '$ubicacion', '$fullname')";

$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    header("Location: ../../root/public/html/index.php");
} else {
    echo "Error al insertar registro: " . mysqli_error($conexion);
}

?>
