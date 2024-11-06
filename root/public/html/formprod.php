<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    echo '
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
    <link rel="stylesheet" href="../thirdparty/web bootstrap/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="../thirdparty/web bootstrap/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/styleformulario.css">
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

                <li class="nav-item">
                    <a class="nav-link" href="../html/formprod.php">New</a>
                </li>

            </ul>

            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container-form">
    <div class="labeltitulo">
        <label for="">Añadir producto</label>
    </div>

    <form action="../../../server/daos/procesarprod.php" method="POST">
        <!-- Nombre del producto -->
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1" required>
        </div>

        <!-- Imagen del producto (solo ruta) -->
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="img" lang="es">
            <label class="custom-file-label" for="customFile">Selecciona un archivo</label>
            <!-- Aquí guardamos solo la ruta -->
            <input type="hidden" id="imgPath" name="imgPath">
        </div>

        <!-- Precio del producto -->
        <div class="input-group mb-3">
            <input type="number" name="price" class="form-control" placeholder="Precio" aria-label="Cantidad (al dólar más cercano)" required>
        </div>

        <!-- Descripción del producto -->
        <div class="input-group">
            <textarea name="description" class="form-control" placeholder="Descripción" aria-label="Con texto" required></textarea>
        </div>

        <!-- Botón para enviar -->
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Añadir producto</button>
        </div>
    </form>
</div>





</body>

</html>