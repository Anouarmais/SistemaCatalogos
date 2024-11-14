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
<nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
      <div class="container-fluid">
   
        <a class="navbar-brand" href="onceregistred.php">
          <img src="../img/logotipo.jpg" alt="Logo" width="40" height="34">
        </a>
        
   
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          
          <li class="nav-item">
            <a class="nav-link" href="../../../server/daos/log_out.php">log out</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link " aria-disabled="true" href="profile.php">Perfil</a>
          </li>


        
        </ul>

        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <div class="d-flex" style="height: calc(100vh - 56px);">
    <!-- Barra lateral -->


    <!-- Contenido principal expandible -->
    <div class="flex-grow-1 p-3">
      <!-- Aquí iría el contenido principal de la página -->
    </div>
  </div>
  <script src="../js/ajax.js"></script>
</body>
</html>