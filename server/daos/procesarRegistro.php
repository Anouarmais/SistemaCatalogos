<?php
include 'coneccion.php';

$username = mysqli_real_escape_string($conexion, $_POST['username']);
$password = mysqli_real_escape_string($conexion, $_POST['password']);
$fullname = mysqli_real_escape_string($conexion, $_POST['fullname']);
$email = mysqli_real_escape_string($conexion, $_POST['email']);
$ubicacion = mysqli_real_escape_string($conexion, $_POST['ubicacion']);
$phone = mysqli_real_escape_string($conexion, $_POST['phone']);

// Verifica si el username ya existe
$check_query = "SELECT * FROM usuarios WHERE username = '$username'";
$check_result = mysqli_query($conexion, $check_query);

if (mysqli_num_rows($check_result) > 0) {
    // Si el username ya existe, muestra una alerta y redirige de nuevo al formulario
    echo "<script>
        alert('El nombre de usuario ya está en uso. Por favor, elige otro nombre.');
        window.history.back();
    </script>";
} else {
    // Hash de la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Define el valor de admin como 0 (usuario regular)
    $admin = 0;

    // Inserta en la tabla usuarios
    $query = "
        INSERT INTO usuarios (username, password, admin, email, telefono, ubicacion, nombrecompleto) 
        VALUES ('$username', '$hashed_password', '$admin', '$email', '$phone', '$ubicacion', '$fullname')
    ";

    // Ejecuta la primera consulta
    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar) {
        // Obtiene el ID del usuario recién creado
        $last_id = mysqli_insert_id($conexion);

        // Inserta en la tabla cesta usando el ID del usuario
        $query2 = "INSERT INTO cesta (ID, username) VALUES ('$last_id', '$username')";
        $ejecutar2 = mysqli_query($conexion, $query2);

        if ($ejecutar2) {
            header("Location: ../../root/public/html/index.php");
        } else {
            echo "Error al insertar en la tabla cesta: " . mysqli_error($conexion);
        }
    } else {
        echo "Error al insertar registro en usuarios: " . mysqli_error($conexion);
    }
}
?>
