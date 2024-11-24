<?php
session_start();
if (isset($_SESSION['usuario'])) {
  echo '
        <script>
       
        window.location="onceregistred.php"; // Cambié "wiwndow" a "window"
        </script>
        ';
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


</head>

<body>
 <!-- Navbar arriba, fuera del contenedor flex -->
<nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <!-- Logotipo -->
    <a class="navbar-brand" href="index.php">
      <img src="../img/logotipo.jpg" alt="Logo" width="40" height="34">
    </a>
    
    <!-- Menú de navegación -->
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="../html/login.php">Log in</a>
      </li>
    </ul>
    <button class="btn btn-outline-primary bolsa" type="button">Cesta</button>
    
    <!-- Formulario de búsqueda -->
    <form class="d-flex me-3" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    
    <!-- Botón de la cesta en la navbar -->
  
  </div>
</nav>






<!-- Aquí sigue el carrito -->
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



  <!-- Parte de la cesta fin -->

  <!-- Contenido principal expandible -->
  <div class="container">


    <div class="flex-grow-1 p-3">
      <!-- Aquí iría el contenido principal de la página -->
    </div>
  </div>



  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      Copyright © 2020. All rights reserved.
    </div>

  </div>

  <script src="../js/ajax.js"></script>
</body>

</html>