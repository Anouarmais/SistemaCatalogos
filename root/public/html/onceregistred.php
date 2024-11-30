<?php  
session_start();

if (!isset($_SESSION['usuario'])) {
    if (isset($_COOKIE['username']) && isset($_COOKIE['is_admin'])) {
        $_SESSION['usuario'] = $_COOKIE['username']; 
        $_SESSION['admin'] = $_COOKIE['is_admin'];   
    } else {
        echo '
        <script>
        alert("Please Log in");
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


<div class="container">
    <div class="flex-grow-1 p-3"></div>
</div>

<div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-danger">
    <div class="text-white mb-3 mb-md-0">
      Copyright © 2020. All rights reserved.
    </div>
</div>

<script src="../js/ajax.js"></script>
</body>
</html>
