<?php
$conexion = mysqli_connect("localhost", "root", "", "sistemacatalogos");
if (!$conexion) {
    die('Error de conexión: ' . mysqli_connect_error());
}
?>
