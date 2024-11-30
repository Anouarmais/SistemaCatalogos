<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header("Location: onceregistred.php");
    exit();
}

if (isset($_COOKIE['username'])) {
    $_SESSION['usuario'] = $_COOKIE['username'];

    header("Location: onceregistred.php");
    exit();
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
<nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd; padding-left: 120px;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="../img/logotipo.jpg" alt="Logo" width="40" height="34">
    </a>
    
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="../html/login.php">Log in</a>
      </li>
    </ul>
   
    

  
  </div>
</nav>

  <div class="container">
    <div class="flex-grow-1 p-3">

    </div>
  </div>



  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-">
    <div class="text-white mb-3 mb-md-0">
      Copyright © 2024. All rights reserved.
    </div>

  </div>

  <script src="../js/ajax.js"></script>
</body>

</html>