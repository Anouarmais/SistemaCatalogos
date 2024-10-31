<?php 
include 'coneccion.php';

// Asegúrate de que las variables están definidas
$username = $_POST['username'];
$password = $_POST['password'];

// Asegúrate de que los datos están correctamente escapados para prevenir SQL Injection
$username = mysqli_real_escape_string($conexion, $username);
$password = mysqli_real_escape_string($conexion, $password);

// Corrige la sintaxis de la consulta SQL
$query = "INSERT INTO usuarios(username, password) VALUES ('$username', '$password')";

$ejecutar = mysqli_query($conexion, $query);

// Verifica si la consulta se ejecutó correctamente
if ($ejecutar) {
    echo "Registro insertado correctamente.";
} else {
    echo "Error al insertar registro: " . mysqli_error($conexion);
}

?>
