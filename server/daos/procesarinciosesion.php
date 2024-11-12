<?php
session_start();
include 'coneccion.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Sanitizar entradas
$username = mysqli_real_escape_string($conexion, $username);
$password = mysqli_real_escape_string($conexion, $password);

// Consulta que obtiene el campo admin también
$validar_login = mysqli_query($conexion, "SELECT username, admin FROM usuarios WHERE username = '$username' AND password = '$password'");

if (mysqli_num_rows($validar_login) > 0) {
    $usuario = mysqli_fetch_assoc($validar_login);
    $_SESSION['usuario'] = $username;
    $_SESSION['admin'] = $usuario['admin']; // Guardar el valor admin en la sesión

    // Redirigir según el valor de admin
    if ($usuario['admin'] == 1) {
        header("Location: ../../root/public/html/adminpage.php");
    } else {
        header("Location: ../../root/public/html/onceregistred.php");
    }
    exit;
} else {
    echo '
    <script>
        alert("Usuario no existe.");
        window.location.href = "../../root/public/html/login.php";
    </script>
    ';
    exit;
}
