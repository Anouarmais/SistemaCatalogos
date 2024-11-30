<?php
include 'coneccion.php';
require_once '../actions/movefiles.php';

$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$imgTemp = $_FILES['archivo']['tmp_name'];
$img = $_FILES['archivo']['name'];

if (isset($img) && isset($imgTemp)) {
    moveFile($imgTemp, $img);
} else {
    echo "Coloque un archivo";
}

$name = mysqli_real_escape_string($conexion, $name);
$price = mysqli_real_escape_string($conexion, $price);
$description = mysqli_real_escape_string($conexion, $description);
$img = mysqli_real_escape_string($conexion, (string) $img);


if (empty($img)) {
    $img = null; 
}

$query = "INSERT INTO products (name, price, description, img) VALUES ('$name', '$price', '$description', '$img')";


if($ejecutar = mysqli_query($conexion, $query)
){
    header("Location: ../../root/public/html/onceregistred.php");

}


