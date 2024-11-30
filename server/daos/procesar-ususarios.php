<?php
include_once 'coneccion.php'; 

function obtenerUsuarios() {
    global $conexion;
    $query = "SELECT id, username, admin FROM usuarios";
    $result = mysqli_query($conexion, $query);
    
    $usuarios = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $usuarios[] = $row;
        }
    }
    
    return $usuarios;
}

function convertirEnAdmin($usuario_id) {
    global $conexion;
    $query = "UPDATE usuarios SET admin = 1 WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, 'i', $usuario_id);
    $result = mysqli_stmt_execute($stmt);

    return $result;
}

function eliminarUsuario($usuario_id) {
    global $conexion;
    $query = "DELETE FROM usuarios WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, 'i', $usuario_id);
    $result = mysqli_stmt_execute($stmt);

    return $result;
}

if (isset($_POST['convertir_admin'])) {
    $usuario_id = $_POST['usuario_id'];
    if (convertirEnAdmin($usuario_id)) {
        echo "<script> window.location.href = '../../root/public/html/panelusuarios.php';</script>";
    } else {
        echo "<script>alert('Error convert user.'); window.location.href = '../../root/public/html/panelusuarios.php';</script>";
    }
}

if (isset($_POST['eliminar_usuario'])) {
    $usuario_id = $_POST['usuario_id'];
    if (eliminarUsuario($usuario_id)) {
        echo "<script> window.location.href = '../../root/public/html/panelusuarios.php';</script>";
    } else {
        echo "<script>alert('Error delete user.'); window.location.href = '../../root/public/html/panelusuarios.php';</script>";
    }
}
?>
