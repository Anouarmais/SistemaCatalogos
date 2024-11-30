<?php
include 'coneccion.php'; 

$query = "SELECT * FROM products";
$result = mysqli_query($conexion, $query);

if ($result) {
    $products = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
    echo json_encode($products);
} else {
    echo json_encode([]);
}

mysqli_close($conexion);
?>
