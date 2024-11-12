<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../thirdparty/web bootstrap/bootstrap-5.3.3-dist/css/bootstrap.min.css">
  <script src="../thirdparty/web bootstrap/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</head>

<body>
  <!-- Navbar arriba, fuera del contenedor flex -->
  <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="../img/logotipo.jpg" alt="Logo" width="40" height="34">
      </a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="../html/login.php">Log in</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <!-- Contenedor flex debajo de la navbar -->
  <div class="d-flex" style="height: calc(100vh - 56px);">
    <!-- Barra lateral -->
    <div class="flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">Sidebar</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="#" class="nav-link active" aria-current="page">Home</a>
        </li>
        <li><a href="#" class="nav-link text-white">Dashboard</a></li>
        <li><a href="#" class="nav-link text-white">Orders</a></li>
        <li><a href="#" class="nav-link text-white">Products</a></li>
        <li><a href="#" class="nav-link text-white">Customers</a></li>
      </ul>
      <hr>
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
          <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
          <strong>mdo</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
          <li><a class="dropdown-item" href="#">New project...</a></li>
          <li><a class="dropdown-item" href="#">Settings</a></li>
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
      </div>
    </div>

    <!-- Contenido principal expandible -->
    <div class="flex-grow-1 p-3">
      <!-- Aquí iría el contenido principal de la página -->
    </div>
  </div>
  
  <script src="../js/ajax.js"></script>
</body>

</html>
