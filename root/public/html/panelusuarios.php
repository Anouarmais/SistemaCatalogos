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

include_once '../../../server/daos/procesar-ususarios.php';
$usuarios = obtenerUsuarios();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../thirdparty/web bootstrap/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="../thirdparty/web bootstrap/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <title>Registred users</title>
    <link rel="stylesheet" href="../css/styleadminusuarios.css">
    <link rel="stylesheet" href="../css/styleprod.css">
</head>
<body>
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
        </nav>

<div class="registrados" style=" padding-left: 85px;">
    <h1>Users Registred</h1>
    <div class="usuarios">
        <?php foreach ($usuarios as $usuario): ?>
            <div class="usuario-card">
                <div class="usuario-info">
                    <label>Username:</label>
                    <label name="username"><?php echo htmlspecialchars($usuario['username']); ?></label>
                    <label id="rol">Rol:</label>
                    <label name="admin"><?php echo $usuario['admin'] == 1 ? 'administrador' : 'usuario'; ?></label>
                </div>
                <div>
                   
                    <form action="../../../server/daos/procesar-ususarios.php" method="POST" style="display:inline;">
                        <input type="hidden" name="usuario_id" value="<?php echo $usuario['id']; ?>">
                        <button type="submit" name="convertir_admin">Convert to admin</button>
                    </form>

                    
                    <form action="../../../server/daos/procesar-ususarios.php" method="POST" style="display:inline;">
                        <input type="hidden" name="usuario_id" value="<?php echo $usuario['id']; ?>">
                        <button type="submit" name="eliminar_usuario" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')">Delete</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<footer class="footer bg-primary text-white text-center py-3">
    <div class="container">
        <p class="mb-0">Copyright © 2024. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
