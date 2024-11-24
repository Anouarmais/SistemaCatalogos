<?php
session_start();
include 'coneccion.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Sanitizar entradas
$username = mysqli_real_escape_string($conexion, $username);

// Consulta que obtiene la contraseña y el campo admin
$validar_login = mysqli_query($conexion, "SELECT password, admin FROM usuarios WHERE username = '$username'");

if (mysqli_num_rows($validar_login) > 0) {
    $usuario = mysqli_fetch_assoc($validar_login);
    $hashed_password = $usuario['password'];

    // Verificar la contraseña
    if (password_verify($password, $hashed_password)) {
        $_SESSION['usuario'] = $username;
        $_SESSION['admin'] = $usuario['admin']; // Guardar el valor admin en la sesión

        // Redirigir según el valor de admin
        if ($usuario['admin'] == 1) {
            header("Location: ../../root/public/html/onceregistred.php");
        } else {
            header("Location: ../../root/public/html/onceregistred.php");
        }
        exit;
    } else {
        echo '
        <script>
            alert("Contraseña incorrecta.");
            window.location.href = "../../root/public/html/login.php";
        </script>
        ';
    }
} else {
    echo '
    <script>
        alert("Usuario no existe.");
        window.location.href = "../../root/public/html/login.php";
    </script>
    ';
}

