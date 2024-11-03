<?php  
    session_start();

    if(!isset($_SESSION['usuario'])){
        echo'
        <script>
        alert ("Por favor debes iniciar secion");
        wiwndow.location="../html/index.php";
        </script>
        ';
        session_destroy();
        die();  
    
    }



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../thirdparty/css/bootstrap.min.css">
    <script src="../thirdparty/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
      <div class="container-fluid">
        <!-- Logo de la primera navbar -->
        <a class="navbar-brand" href="#">
          <img src="/root/public/img/logotipo.jpg" alt="Logo" width="40" height="34">
        </a>
        
        <!-- Opciones de navegación siempre visibles -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          
          <li class="nav-item">
            <a class="nav-link" href="../../../server/daos/log_out.php">log out</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>  
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li>
        </ul>

        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </nav>
</body>
</html>