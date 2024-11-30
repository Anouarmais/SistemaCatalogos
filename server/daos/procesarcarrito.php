<?php
include 'coneccion.php';


session_start();
$usuario = $_SESSION['usuario']; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['producto'])) {
    $producto = mysqli_real_escape_string($conexion, $_POST['producto']); 

    $checkQuery = "SELECT * FROM cesta WHERE username = '$usuario' AND producto = '$producto'";
    $checkResult = mysqli_query($conexion, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $message = "This product is already in your cart.";
    } else {
        $query = "INSERT INTO cesta (username, producto) VALUES ('$usuario', '$producto')";
        $result = mysqli_query($conexion, $query);

        if ($result) {
            $message = "Product added to the cart successfully!";
        } else {
            
            $message = "Error adding the product to the cart: " . mysqli_error($conexion);
        }
    }

    echo "<script>
            alert('$message');
            
                window.location.href = '../../root/public/html/Vproduct.php?name=' + encodeURIComponent('$producto');
             
          </script>";
    exit();
}



$query = "SELECT producto FROM cesta WHERE username = '$usuario'";
$result = mysqli_query($conexion, $query);


if ($result && mysqli_num_rows($result) > 0) {
    echo "<h3>Productos en tu carrito:</h3>";
    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>" . htmlspecialchars($row['producto']) . "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Your cart is empty.</p>";
}

mysqli_close($conexion);
?>
