<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['admin'] != 1) {
    echo '
  <script>
    alert("Access denied. Only administrators can access this page.");
    window.location.href = "../html/index.php"; 
</script>

    ';
    session_destroy();
    die();
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
    <link rel="stylesheet" href="../css/styleformulario.css">
    <link rel="stylesheet" href="../css/styleprod.css">
</head>

<body>

    <div class="container-form">
        <div class="labeltitulo">
            <label for="">Add product</label>
        </div>

        <form action="../../../server/daos/procesarprod.php" method="POST" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <input type="file" name="archivo" id="archivo" required><br><br>
            </div>

      
            <div class="input-group mb-3">

                <input type="text" name="name" class="form-control" placeholder="Name" aria-label="Nombre" aria-describedby="basic-addon1" required>
            </div>
  
            <div class="input-group mb-3">
                <input type="number" name="price" class="form-control" placeholder="Price" aria-label="Cantidad (al dólar más cercano)" required>
            </div>

  
            <div class="input-group">
                <textarea name="description" class="form-control" placeholder="Description" aria-label="Con texto" required></textarea>
            </div>

         
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Add product</button>
            </div>
        </form>

    </div>
    <footer class="footer bg-primary text-white text-center py-3">
    <div class="container">
        <p class="mb-0">Copyright © 2024. All rights reserved.</p>
    </div>
</footer>



</body>

</html>