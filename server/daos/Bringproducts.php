<?php
// Incluir la conexión a la base de datos
include 'coneccion.php';  // La ruta debería ser relativa a este archivo

// Realizar la consulta a la base de datos
$query = "SELECT * FROM products";
$result = mysqli_query($conexion, $query);

// Comprobar si la consulta fue exitosa
if ($result) {
    $products = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;  // Almacenar cada producto en el array
    }
    // Devolver los productos en formato JSON
    echo json_encode($products);
} else {
    // Si hay error en la consulta, devolver un arreglo vacío
    echo json_encode([]);
}

// Cerrar la conexión (opcional)
mysqli_close($conexion);
?>
