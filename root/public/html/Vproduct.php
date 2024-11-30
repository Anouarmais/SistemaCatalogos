<?php
include '../../../server/daos/coneccion.php';  
include '../../../server/daos/procesarcomentarios.php';

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
  
    </div>
  </nav>
    ';
 
}$comentariosObj = new ProcesarComentarios($conexion);

$product_name = isset($_GET['name']) ? mysqli_real_escape_string($conexion, $_GET['name']) : '';

if ($product_name != '') {
    $query = "SELECT * FROM products WHERE name = '$product_name'";

    $result = mysqli_query($conexion, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);

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
    <link rel="stylesheet" href="../css/styleprod.css">
    <link rel="stylesheet" href="../thirdparty/web bootstrap/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="../thirdparty/web bootstrap/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container-title" style="padding-left:120px"><?php echo $product['name']; ?></div>

<main>
<div class="success"><?php if (isset($_SESSION['message'])) {
  
}?></div>
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
        <?php if (isset($_SESSION['usuario'])): ?>
        <div class="container-add-cart">
            <form action="../../../server/daos/procesarcarrito.php" method="POST">
                <input type="hidden" name="producto" value="<?php echo htmlspecialchars($product['name']); ?>">
                <button type="submit" class="btn-add-to-cart">
                    <i class="fa-solid fa-plus"></i> Add to cart
                </button>
            </form>
        </div>
        <?php endif; ?>


    </div>
</main>




<div class="comentarios">
    <div class="titulo">
        <h1>Rewards</h1>
    </div>

    <div class="valoraciones">
        <?php
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
    
    <div class="subirresena">
        <form id="commentForm" method="POST" action="../../../server/daos/procesarcomentarios.php">
            <textarea id="opinionText" name="opinion" style="resize: none;" placeholder="¿What do you think of the product?" required></textarea>
            <input type="hidden" name="producto" value="<?php echo htmlspecialchars($product_name); ?>">
            <button type="submit">Comment</button>
        </form>
    </div>
</div>


<script>
    document.getElementById('commentForm').addEventListener('submit', function(event) {
        event.preventDefault(); 

        <?php if (!isset($_SESSION['usuario'])): ?>
            alert("¡Debes iniciar sesión para comentar!"); 
        <?php else: ?>
         
            const formData = new FormData(this); 

            fetch(this.action, {
                method: this.method, 
                body: formData
            })
            .then(response => response.text())
            .then(data => {
               
                document.getElementById('opinionText').value = '';
                location.reload();
            })
            .catch(error => {
                console.error('Error al enviar el comentario:', error); 
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