<?php
// Incluir la conexión a la base de datos
include '../../../server/daos/coneccion.php';  // Asegúrate de que la ruta sea correcta

// Obtener el nombre del producto de la URL
$product_name = isset($_GET['name']) ? mysqli_real_escape_string($conexion, $_GET['name']) : '';

// Verificar que el nombre no esté vacío
if ($product_name != '') {
    // Consultar la base de datos para obtener los detalles del producto
    $query = "SELECT * FROM products WHERE name = '$product_name'";
    $result = mysqli_query($conexion, $query);

    // Comprobar si el producto existe
    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
    } else {
        // Si no se encuentra el producto, redirigir o mostrar un error
        echo "Producto no encontrado.";
        exit;
    }
} else {
    echo "Nombre de producto inválido.";
    exit;
}

// Cerrar la conexión
mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pagina Producto</title>
    <link rel="stylesheet" href="../css/stylepagprod.css" />
    <link rel="stylesheet" href="../thirdparty/web bootstrap/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="../thirdparty/web bootstrap/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="navvbar">
      <!-- Navbar arriba, fuera del contenedor flex -->
  <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="../img/logotipo.jpg" alt="Logo" width="40" height="34">
      </a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="../html/login.php">Log in</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </nav>
    </div>

    <div class="container-title"><?php echo $product['name']; ?></div>

    <main>
        <div class="container-img">
            <div class="imgprod">
                <img src="http://localhost/SistemaCatalogos/root/public/img/<?php echo $product['img']; ?>" alt="imagen-producto" />
            </div>
        </div>
        <div class="container-info-product">
            <div class="container-price">
                <span><?php echo $product['price']; ?> €</span>
            </div>

            <div class="container-details-product">
                <!-- Detalles adicionales del producto si los tienes -->
                <p><?php echo $product['description']; ?></p>
            </div>

            <div class="container-add-cart">
                <button class="btn-add-to-cart">
                    <i class="fa-solid fa-plus"></i> Añadir al carrito
                </button>
            </div>

            <div class="container-description">
                <div class="title-description">
                    <h4>Descripción</h4>
                </div>
                <div class="text-description">
                    <p><?php echo $product['description']; ?></p>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>Footer</p>
    </footer>

    <script src="../js/productos.js"></script>
</body>
</html>
