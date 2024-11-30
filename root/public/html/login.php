<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../thirdparty/web bootstrap/bootstrap-5.3.3-dist/css/bootstrap.min.css">
  <script src="../thirdparty/web bootstrap/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/stylelogin.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="../img/logotipo.jpg" alt="Logo" width="40" height="34">
      </a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="../html/login.php">log in</a>
        </li>
      </ul>
    </div>
  </nav>

  <section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="../img/login.webp" width="400px" class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form action="../../../server/daos/procesarinciosesion.php" method="POST">
            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
              <p class="lead fw-normal mb-0 me-3">Log in</p>
            </div>

            <div class="divider d-flex align-items-center my-4"></div>

            <div data-mdb-input-init class="form-outline mb-4">
              <input type="text" name="username" class="form-control form-control-lg" placeholder="Enter a valid username" required />
              <label class="form-label" for="form3Example3">Username</label>
            </div>

            <div data-mdb-input-init class="form-outline mb-3">
              <input type="password" name="password" class="form-control form-control-lg" placeholder="Enter password" required />
              <label class="form-label" for="form3Example4">Password</label>
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Log in</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">¿Don't you have an account?? <a href="register.php" class="link-danger">Sign up</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <?php
  if (isset($_SESSION['error_message'])) {
    echo "<script>alert('" . $_SESSION['error_message'] . "');</script>";
    unset($_SESSION['error_message']);
  }
  ?>

  <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <div class="text-white mb-3 mb-md-0">
      Copyright © 2024. All rights reserved.
    </div>
  </div>
</body>
</html>
