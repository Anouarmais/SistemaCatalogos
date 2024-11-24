<?php
include 'coneccion.php';

// Sanitize input to prevent SQL injection
$username = mysqli_real_escape_string($conexion, $_POST['username']);
$password = mysqli_real_escape_string($conexion, $_POST['password']);
$fullname = mysqli_real_escape_string($conexion, $_POST['fullname']);
$email = mysqli_real_escape_string($conexion, $_POST['email']);
$ubicacion = mysqli_real_escape_string($conexion, $_POST['ubicacion']);
$phone = mysqli_real_escape_string($conexion, $_POST['phone']);

// Verifica si el username ya existe
$check_query = "SELECT * FROM usuarios WHERE username = ?";
$check_stmt = mysqli_prepare($conexion, $check_query);
mysqli_stmt_bind_param($check_stmt, "s", $username);
mysqli_stmt_execute($check_stmt);
$check_result = mysqli_stmt_get_result($check_stmt);

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

    // Prepara la consulta para insertar el usuario
    $query = "
        INSERT INTO usuarios (username, password, admin, email, telefono, ubicacion, nombrecompleto) 
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ";
    $stmt = mysqli_prepare($conexion, $query);
    
    if ($stmt) {
        // Vincula los parámetros a la consulta preparada
        mysqli_stmt_bind_param($stmt, "ssissss", $username, $hashed_password, $admin, $email, $phone, $ubicacion, $fullname);
        
        // Ejecuta la consulta
        $ejecutar = mysqli_stmt_execute($stmt);

        if ($ejecutar) {
            // Obtiene el ID del usuario recién creado
            $last_id = mysqli_insert_id($conexion);
            echo "<script>
                window.location.href = '../../root/public/html/index.php'; 
            </script>";
        } else {
            echo "Error al insertar el usuario: " . mysqli_error($conexion);
        }

        // Cierra la declaración preparada
        mysqli_stmt_close($stmt);
    } else {
        echo "Error al preparar la consulta: " . mysqli_error($conexion);
    }
}

// Cierra la conexión
mysqli_close($conexion);
?>
