<?php  
include '../../../server/daos/coneccion.php';

session_start();

if (!isset($_SESSION['usuario'])) {
    if (isset($_COOKIE['username']) && isset($_COOKIE['is_admin'])) {
        $_SESSION['usuario'] = $_COOKIE['username']; 
        $_SESSION['admin'] = $_COOKIE['is_admin']; 
    } else {
        echo '
        <script>
        alert("Please log in");
        window.location="index.php";
        </script>';
        session_destroy();
        exit();
    }
}

if (isset($_SESSION['usuario'])) {
    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
        echo '
        <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd; padding-left: 120px">
            <div class="container-fluid">
                <a class="navbar-brand" href="onceregistred.php">
                    <img src="../img/logotipo.jpg" alt="Logo" width="40" height="34">
                </a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../html/formprod.php">New Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../html/panelusuarios.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../html/basket.php">Basket</a>
                    </li>
                        <li class="nav-item">
                        <a class="nav-link" href="../../../server/daos/log_out.php">Log out</a>
                    </li>
                </ul>
            </div>
        </nav>';
    } else {
        echo '
        <nav class="navbar navbar-expand-lg" style="background-color: #f8f9fa; padding-left:120px">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="../img/logotipo.jpg" alt="Logo" width="40" height="34">
                </a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                   
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../html/basket.php">Basket</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="../../../server/daos/log_out.php">Log out</a>
                    </li>
                </ul>
            </div>
        </nav>';
    }
}

$usuario = $_SESSION['usuario']; 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['eliminar'])) {
    $producto_id = $_POST['eliminar'];

    $deleteQuery = "DELETE FROM cesta WHERE username = '$usuario' AND producto = '$producto_id'";
    if (mysqli_query($conexion, $deleteQuery)) {
        echo '<script>alert("Product removed from the cart.");</script>';
    } else {
        echo 'Error al eliminar producto: ' . mysqli_error($conexion);
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comprar'])) {
    
    $usuario = $_SESSION['usuario'];  

    $deleteQuery = "DELETE FROM cesta WHERE username = '$usuario'";

    if (mysqli_query($conexion, $deleteQuery)) {
     
    } else {
        echo 'Error al eliminar los productos: ' . mysqli_error($conexion);
    }
}




$query = "SELECT * FROM cesta WHERE username = '$usuario'";
$result = mysqli_query($conexion, $query);

$productosEnCarrito = [];
while ($row = mysqli_fetch_assoc($result)) {
    $productoQuery = "SELECT * FROM products WHERE name = '{$row['producto']}'";
    $productoResult = mysqli_query($conexion, $productoQuery);
    if ($producto = mysqli_fetch_assoc($productoResult)) {
        $productosEnCarrito[] = $producto;
    }
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesta de Compras</title>
    <link rel="stylesheet" href="../thirdparty/web bootstrap/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="../thirdparty/web bootstrap/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/styleformulario.css">
</head>
<body>

<div class="container mt-5">
    <h3>Cesta de Compras</h3>
    <hr>

    <?php if (count($productosEnCarrito) > 0): ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productosEnCarrito as $producto): ?>
                    <tr>
                        <td><?= htmlspecialchars($producto['name']); ?></td>
                        <td><?= number_format($producto['price'], 2); ?> €</td>
                        <td>
                            <form action="basket.php" method="POST" style="display:inline;">
                                <input type="hidden" name="eliminar" value="<?= $producto['name']; ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="d-flex justify-content-between">
    <h5>Total: <?= number_format(array_sum(array_column($productosEnCarrito, 'price')), 2); ?> €</h5>
    <form action="basket.php" method="POST" style="display:inline;">
        <input type="hidden" name="comprar" value="1"> 
        <button type="submit" class="btn btn-success">Buy</button>
    </form>
</div>

    <?php else: ?>
        <p>You have no products in the Basket.</p>
    <?php endif; ?>

</div>

</body>
</html>
