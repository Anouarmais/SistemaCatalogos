<?php
session_start();
include 'coneccion.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conexion, $username);

    $validar_login = mysqli_query($conexion, "SELECT password, admin FROM usuarios WHERE username = '$username'");

    if (mysqli_num_rows($validar_login) > 0) {
        $usuario = mysqli_fetch_assoc($validar_login);
        $hashed_password = $usuario['password'];

        if (password_verify($password, $hashed_password)) {
            $_SESSION['usuario'] = $username;
            $_SESSION['admin'] = $usuario['admin']; 

            
                setcookie('username', $username, time() + 3600 * 24 * 30, "/");
            

            if ($usuario['admin'] == 1) {
                header("Location: ../../root/public/html/onceregistred.php");
            } else {
                header("Location: ../../root/public/html/onceregistred.php");
            }
            exit;
        } else {
            $_SESSION['error_message'] = "Incorrect Password.";
            header("Location: ../../root/public/html/login.php");
            exit;
        }
    } else {
        $_SESSION['error_message'] = "Usuario not exists.";
        header("Location: ../../root/public/html/login.php");
        exit;
    }
} else {
    $_SESSION['error_message'] = "Please enter your username and password.";
    header("Location: ../../root/public/html/login.php");
    exit;
}
?>
