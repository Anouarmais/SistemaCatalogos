<?php  
    session_start();
    if(!isset($_SESSION['usuario'])){
        echo'
        <script>
        alert("Por favor debes iniciar sesión");
        window.location="index.php"; // Cambié "wiwndow" a "window"
        </script>
        ';
        session_destroy();
        die();  
    }


// Verifica si hay una sesión iniciada
if (isset($_SESSION['usuario'])) {
  // Verifica si es un administrador
  if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
      // Barra de navegación para administradores
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

                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
          </div>
      </nav>';
  } else {
      // Barra de navegación para usuarios normales
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
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
        
          </div>
      </nav>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../thirdparty/web bootstrap/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="../thirdparty/web bootstrap/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/styleprod.css">
    

</head>
<body>
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

  
  

    <!-- Contenido principal expandible -->
     <div class="container">

     
    <div class="flex-grow-1 p-3">
    </div>
    </div>
  
  <script src="../js/ajax.js"></script>
</body>
</html>