
<?php 
include '../../../server/daos/InfoProfile.php' ;

if (!isset($_SESSION['usuario'])) {
    echo '
    <script>
    alert("Por favor debes iniciar sesión");
    window.location="../html/index.php";
    </script>';
    session_destroy();
    die();  
}

// Verifica si hay una sesión iniciada
if (isset($_SESSION['usuario'])) {
    // Verifica si es un administrador
    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
        // Barra de navegación para administradores
        echo '
             <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
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
    } else {
        echo '
         <nav class="navbar navbar-expand-lg" style="background-color: #f8f9fa; ">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="../img/logotipo.jpg" alt="Logo" width="40" height="34">
                </a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                   
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
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
    <link rel="stylesheet" href="../css/styleprod.css">
    <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="../thirdparty/web bootstrap/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="../thirdparty/web bootstrap/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>


<style type="text/css">


html {
    -webkit-text-size-adjust: 100%;
    -ms-text-size-adjust: 100%;
    text-size-adjust: 100%;
    line-height: 1.4;
}


* {
    margin: 0;
    padding: 0;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

body {
    color: #404040;
    font-family: "Arial", Segoe UI, Tahoma, sans-serifl, Helvetica Neue, Helvetica;
}

.navbar>.container, .navbar>.container-fluid, .navbar>.container-lg, .navbar>.container-md, .navbar>.container-sm, .navbar>.container-xl, .navbar>.container-xxl {
    display: flex;
    flex-wrap: inherit;
    align-items: center;
    justify-content: space-between;
    margin-left: 90px;

}
.seccion-perfil-usuario .perfil-usuario-body,
.seccion-perfil-usuario {
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
    align-items: center;
}

.seccion-perfil-usuario .perfil-usuario-header {
    width: 100%;
    display: flex;
    justify-content: center;
    background: linear-gradient(#00ffff, transparent);
    margin-bottom: 1.25rem;
}

.seccion-perfil-usuario .perfil-usuario-portada {
    display: block;
    position: relative;
    width: 90%;
    height: 10rem;
    background-image: linear-gradient(45deg, #00ffff, #317FFF);
    border-radius: 0 0 20px 20px;

}

.seccion-perfil-usuario .perfil-usuario-portada .boton-portada {
    position: absolute;
    top: 1rem;
    right: 1rem;
    border: 0;
    border-radius: 8px;
    padding: 12px 25px;
    background-color: rgba(0, 0, 0, .5);
    color: #fff;
    cursor: pointer;
}

.seccion-perfil-usuario .perfil-usuario-portada .boton-portada i {
    margin-right: 1rem;
}

.seccion-perfil-usuario .perfil-usuario-avatar {
    display: flex;
    width: 180px;
    height: 10px;
    align-items: center;
    justify-content: center;
    border: 7px solid #FFFFFF;
    background-color: #DFE5F2;
    border-radius: 50%;
    box-shadow: 0 0 12px rgba(0, 0, 0, .2);
    position: absolute;
    bottom: -40px;
    left: calc(50% - 90px);
    z-index: 1;
}

.seccion-perfil-usuario .perfil-usuario-avatar img {
    width: 100%;
    position: relative;
    border-radius: 50%;
}

.seccion-perfil-usuario .perfil-usuario-avatar .boton-avatar {
    position: absolute;
    left: -2px;
    top: -2px;
    border: 0;
    background-color: #fff;
    box-shadow: 0 0 12px rgba(0, 0, 0, .2);
    width: 45px;
    height: 45px;
    border-radius: 50%;
    cursor: pointer;
}

.seccion-perfil-usuario .perfil-usuario-body {
    width: 70%;
    position: relative;
    max-width: 750px;
}

.seccion-perfil-usuario .perfil-usuario-body .titulo {
    display: block;
    width: 100%;
    font-size: 1.75em;
    margin-bottom: 0.5rem;
}

.seccion-perfil-usuario .perfil-usuario-body .texto {
    color: #848484;
    font-size: 0.95em;
}

.seccion-perfil-usuario .perfil-usuario-footer,
.seccion-perfil-usuario .perfil-usuario-bio {
    display: flex;
    flex-wrap: wrap;
    padding: 1.5rem 2rem;
    box-shadow: 0 0 12px rgba(0, 0, 0, .2);
    background-color: #fff;
    border-radius: 15px;
    width: 100%;
}

.seccion-perfil-usuario .perfil-usuario-bio {
    margin-bottom: 1.25rem;
    text-align: center;
}

.seccion-perfil-usuario .lista-datos {
    width: 50%;
    list-style: none;
}

.seccion-perfil-usuario .lista-datos li {
    padding: 5px 0;
}

.seccion-perfil-usuario .lista-datos li>.icono {
    margin-right: 1rem;
    font-size: 1.2rem;
    vertical-align: middle;
}

.seccion-perfil-usuario .redes-sociales {
    position: absolute;
    right: calc(0px - 50px - 1rem);
    top: 0;
    display: flex;
    flex-direction: column;
}

.seccion-perfil-usuario .redes-sociales .boton-redes {
    border: 0;
    background-color: #fff;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    color: #fff;
    box-shadow: 0 0 12px rgba(0, 0, 0, .2);
    font-size: 1.3rem;
}

.seccion-perfil-usuario .redes-sociales .boton-redes+.boton-redes {
    margin-top: .5rem;
}

.seccion-perfil-usuario .boton-redes.facebook {
    background-color: #5955FF;
}

.seccion-perfil-usuario .boton-redes.twitter {
    background-color: #35E1BF;
}

.seccion-perfil-usuario .boton-redes.instagram {
    background: linear-gradient(45deg, #FF2DFD, #40A7FF);
}


@media (max-width: 750px) {
    .seccion-perfil-usuario .lista-datos {
        width: 100%;
    }

    .seccion-perfil-usuario .perfil-usuario-portada,
    .seccion-perfil-usuario .perfil-usuario-body {
        width: 95%;
    }

    .seccion-perfil-usuario .redes-sociales {
        position: relative;
        flex-direction: row;
        width: 100%;
        left: 0;
        text-align: center;
        margin-top: 1rem;
        margin-bottom: 1rem;
        align-items: center;
        justify-content: center
    }

    .seccion-perfil-usuario .redes-sociales .boton-redes+.boton-redes {
        margin-left: 1rem;
        margin-top: 0;
    }
}
</style>

<div class="carrito" >
  <div class="arriba">
    <h3>Tu carrito está vacío</h3>
    <p>Compra ahora</p>
  </div>
  <table>
    <tbody></tbody>
  </table>
  <div class="abajo">
    <div class="precios">
      <p>Total</p>
      <p id="precio">1520.2</p>
    </div>
    <div class="botones">
      <button>Comprar</button>
      <button>Vaciar Cesta</button>
    </div>
  </div>

</div>






    <section class="seccion-perfil-usuario">
    <div class="perfil-usuario-header">
        <div class="perfil-usuario-portada">
           
        </div>
    </div>
    <div class="perfil-usuario-body">
        <div class="perfil-usuario-bio">
            <h3 class="titulo"><?php echo htmlspecialchars($nombrecompleto); ?></h3>
        </div>
        <div class="perfil-usuario-footer">
            <ul class="lista-datos">
                <li><i class="icono fas fa-map-signs"></i> E-mail: <?php echo htmlspecialchars($email); ?></li>
                <li><i class="icono fas fa-building"></i> Usuario: <?php echo htmlspecialchars($username); ?></li>
            </ul>
            <ul class="lista-datos">
                <li><i class="icono fas fa-map-marker-alt"></i> Ubicación: <?php echo htmlspecialchars($ubicacion); ?></li>
                <li><i class="icono fas fa-phone-alt"></i> Teléfono: <?php echo htmlspecialchars($telefono); ?></li>
            </ul>
        </div>
    </div>
</section>
<footer class="footer bg-primary text-white text-center py-3">
    <div class="container">
        <p class="mb-0">Copyright © 2020. All rights reserved.</p>
    </div>
</footer>

<style>
.mensaje a {
    color: inherit;
    margin-right: .5rem;
    display: inline-block;
}
.mensaje a:hover {
    color: #309B76;
    transform: scale(1.4)
}
</style>
<script src="../js/ajax.js"></script>

</body>

</html>