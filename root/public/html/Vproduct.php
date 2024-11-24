<?php
include '../../../server/daos/coneccion.php';  
include '../../../server/daos/procesarcomentarios.php';

if (isset($_SESSION['usuario'])) {

    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
        echo '
        <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <a class="navbar-brand" href="onceregistred.php">
                    <img src="../img/logotipo.jpg" alt="Logo" width="40" height="34">
                </a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../../../server/daos/log_out.php">Log out</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../html/formprod.php">New</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="../html/panelusuarios.php">usuarios</a>
                    </li>
                </ul>
                    <form class="d-flex" role="search">
                            <button class="btn btn-outline-primary bolsa" type="button">Cesta</button>

                
              </form>
            
            </div>
        </nav>';
    } else {
        echo '
        <nav class="navbar navbar-expand-lg" style="background-color: #f8f9fa;">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="../img/logotipo.jpg" alt="Logo" width="40" height="34">
                </a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../../../server/daos/log_out.php">Log out</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Perfil</a>
                    </li>
                </ul>
                    <form class="d-flex" role="search">
                            <button class="btn btn-outline-primary bolsa" type="button">Cesta</button>

               
              </form>
            </div>
        </nav>';
    }
} else {
    echo '
      <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="../img/logotipo.jpg" alt="Logo" width="40" height="34" >
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
    ';
 
}$comentariosObj = new ProcesarComentarios($conexion);

// Obtenemos el nombre del producto desde la URL
$product_name = isset($_GET['name']) ? mysqli_real_escape_string($conexion, $_GET['name']) : '';

if ($product_name != '') {
    $query = "SELECT * FROM products WHERE name = '$product_name'";

    $result = mysqli_query($conexion, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);

        // Llama a la función para obtener los comentarios
        $comentarios = $comentariosObj->obtenerComentariosPorProducto($product_name);
    } else {
        echo "Producto no encontrado.";
        exit;
    }
} else {
    echo "Nombre de producto inválido.";
    exit;
}

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
    ´<link rel="stylesheet" href="../css/styleprod.css">
    <link rel="stylesheet" href="../thirdparty/web bootstrap/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="../thirdparty/web bootstrap/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/styleprod.css">
</head>
<body>


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
<div class="carrito" >
  <div class="arriba">
    <h3>Tu carrito está vacío</h3>
    <p>Compra ahora</p>
  </div>
  <table>
    <tbody></tbody>
  </table>
  <div class="abajo">
    <div class="precios">
      <p>Total</p>
      <p id="precio">1520.2</p>
    </div>
    <div class="botones">
      <button>Comprar</button>
      <button>Vaciar Cesta</button>
    </div>
  </div>

</div>



<div class="comentarios">
    <div class="titulo">
        <h1>Comentarios</h1>
    </div>

    <div class="valoraciones">
        <?php
        // Mostrar comentarios obtenidos de la clase ProcesarComentarios
        if (!empty($comentarios)) {
            foreach ($comentarios as $comentario) {
                echo '<div class="usuario">';
                echo '<label name="name">' . htmlspecialchars($comentario['name']) . '</label><br>';
                echo '<label name="comentario">' . htmlspecialchars($comentario['opinion']) . '</label>';
                echo '</div>';
            }
        } else {
            echo '<p>No hay comentarios para este producto.</p>';
        }
        ?>
    </div>
    
    <!-- Formulario siempre visible -->
    <div class="subirresena">
        <form id="commentForm" method="POST" action="../../../server/daos/procesarcomentarios.php">
            <textarea id="opinionText" name="opinion" style="resize: none;" placeholder="¿Qué te ha parecido el producto?" required></textarea>
            <input type="hidden" name="producto" value="<?php echo htmlspecialchars($product_name); ?>">
            <button type="submit">Comentar</button>
        </form>
    </div>
</div>


<script>
    document.getElementById('commentForm').addEventListener('submit', function(event) {
        event.preventDefault(); 

        <?php if (!isset($_SESSION['usuario'])): ?>
            alert("¡Debes iniciar sesión para comentar!"); 
        <?php else: ?>
            // Si está logueado, enviar el formulario usando AJAX
            const formData = new FormData(this); // Recoger los datos del formulario

            fetch(this.action, {
                method: this.method, // Método POST o el que uses
                body: formData // Enviar los datos del formulario
            })
            .then(response => response.text())
            .then(data => {
                // Limpiar el campo de comentario después de enviarlo
                document.getElementById('opinionText').value = '';
                location.reload();
            })
            .catch(error => {
                console.error('Error al enviar el comentario:', error); // Manejo de errores
            });
        <?php endif; ?>
    });
</script>


<footer>
    <p>Footer</p>
</footer>

<script src="../js/productos.js"></script>
<script src="../js/ajax.js"></script>
</body>
</html>