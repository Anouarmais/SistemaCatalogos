<?php
include 'coneccion.php';

// Recibir los datos del formulario
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$img = $_POST['imgPath']; // Aquí tomamos la ruta de la imagen desde el campo oculto 'imgPath'

// Escapar los valores para evitar inyecciones SQL
$name = mysqli_real_escape_string($conexion, $name);
$price = mysqli_real_escape_string($conexion, $price);
$description = mysqli_real_escape_string($conexion, $description);
$img = mysqli_real_escape_string($conexion, $img);

// Asegúrate de que la ruta de la imagen no esté vacía
if (empty($img)) {
    $img = null; // O puedes asignar una imagen por defecto si lo prefieres
}

// Consulta para insertar los datos en la base de datos
$query = "INSERT INTO products (name, price, description, img) VALUES ('$name', '$price', '$description', '$img')";

// Ejecutar la consulta
$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo '
    <script>
    alert("Producto añadido satisfactoriamente");
    window.location.href = "../../root/public/html/onceregistred.php"; // Redirigir al usuario
    </script>
    ';
    exit;
} else {
    echo "Error al insertar registro: " . mysqli_error($conexion);
}
?>
