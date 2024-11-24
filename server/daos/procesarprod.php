<?php
include 'coneccion.php';
require_once '../actions/movefiles.php';

// Recibir los datos del formulario
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$imgTemp = $_FILES['archivo']['tmp_name'];// Aquí tomamos la ruta de la imagen desde el campo oculto 'imgPath'
$img = $_FILES['archivo']['name'];

if (isset($img) && isset($imgTemp)) {
    moveFile($imgTemp, $img);
} else {
    echo "Coloque un archivo";
}

// Escapar los valores para evitar inyecciones SQL
$name = mysqli_real_escape_string($conexion, $name);
$price = mysqli_real_escape_string($conexion, $price);
$description = mysqli_real_escape_string($conexion, $description);
$img = mysqli_real_escape_string($conexion, (string) $img);


if (empty($img)) {
    $img = null; 
}

// Consulta para insertar los datos en la base de datos
$query = "INSERT INTO products (name, price, description, img) VALUES ('$name', '$price', '$description', '$img')";

// Ejecutar la consulta
if($ejecutar = mysqli_query($conexion, $query)
){
    header("Location: ../../root/public/html/onceregistred.php");

}


