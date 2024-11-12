<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../thirdparty/web bootstrap/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="../thirdparty/web bootstrap/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/styleregister.css">
</head>
<body>
<nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
      <div class="container-fluid">
        <!-- Logo de la primera navbar -->
        <a class="navbar-brand" href="index.php">
          <img src="../img/logotipo.jpg" alt="Logo" width="40" height="34">
        </a>
        
        <!-- Opciones de navegación siempre visibles -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         
          <li class="nav-item">
            <a class="nav-link" href="../html/login.php">log in</a>
          </li>
         
        
        </ul>

        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <section class="vh-100" style="background-color: #e3f2fd;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="../img/registrar.webp" width="1500px"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

              <form action="../../../server/daos/procesarRegistro.php" method="POST">
  <!-- Nombre completo -->
  <div class="form-outline mb-4">
    <label class="form-label" for="fullname">Nombre completo</label>
    <input type="text" id="fullname" name="fullname" class="form-control form-control-lg" required />
  </div>

  <!-- Correo electrónico -->
  <div class="form-outline mb-4">
    <label class="form-label" for="email">Correo electrónico</label>
    <input type="email" id="email" name="email" class="form-control form-control-lg" required />
  </div>

  <!-- Usuario -->
  <div class="form-outline mb-4">
    <label class="form-label" for="username">Usuario</label>
    <input type="text" id="username" name="username" class="form-control form-control-lg" required />
  </div>

  <!-- Contraseña -->
  <div class="form-outline mb-4">
    <label class="form-label" for="password">Contraseña</label>
    <input type="password" id="password" name="password" class="form-control form-control-lg" required />
  </div>

  <!-- Ubicación -->
  <div class="form-outline mb-4">
    <label class="form-label">Ubicación</label>
    <input type="text" id="ubi" name="ubicacion" class="form-control form-control-lg" required />
  </div>

  <!-- Número de teléfono -->
  <div class="form-outline mb-4">
    <label class="form-label" for="phone">Número de teléfono</label>
    <input type="tel" id="phone" name="phone" class="form-control form-control-lg" />
  </div>

  <div class="pt-1 mb-4">
    <button type="submit" class="btn btn-dark btn-lg btn-block">Enviar</button>
  </div>
</form>



              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      Copyright © 2020. All rights reserved.
    </div>
    <!-- Copyright -->

    <!-- Right -->
    <div>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-google"></i>
      </a>
      <a href="#!" class="text-white">
        <i class="fab fa-linkedin-in"></i>
      </a>
    </div>
    <!-- Right -->
  </div>
</section>
</form>
</body>
</html>