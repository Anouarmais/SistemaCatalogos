<?php
include_once 'coneccion.php'; // Incluye la conexión a la base de datos

// Función para obtener todos los usuarios
function obtenerUsuarios() {
    global $conexion; // Usa la conexión global ya establecida
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

// Función para convertir a un usuario en admin
function convertirEnAdmin($usuario_id) {
    global $conexion;
    $query = "UPDATE usuarios SET admin = 1 WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, 'i', $usuario_id); // 'i' es para integer
    $result = mysqli_stmt_execute($stmt);

    return $result;
}

// Función para eliminar un usuario
function eliminarUsuario($usuario_id) {
    global $conexion;
    $query = "DELETE FROM usuarios WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, 'i', $usuario_id); // 'i' es para integer
    $result = mysqli_stmt_execute($stmt);

    return $result;
}

// Verifica qué acción se debe ejecutar
if (isset($_POST['convertir_admin'])) {
    $usuario_id = $_POST['usuario_id'];
    if (convertirEnAdmin($usuario_id)) {
        echo "<script> window.location.href = '../../root/public/html/panelusuarios.php';</script>";
    } else {
        echo "<script>alert('Error al convertir el usuario.'); window.location.href = '../../root/public/html/panelusuarios.php';</script>";
    }
}

if (isset($_POST['eliminar_usuario'])) {
    $usuario_id = $_POST['usuario_id'];
    if (eliminarUsuario($usuario_id)) {
        echo "<script> window.location.href = '../../root/public/html/panelusuarios.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar el usuario.'); window.location.href = '../../root/public/html/panelusuarios.php';</script>";
    }
}
?>
