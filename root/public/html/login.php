<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../thirdparty/css/bootstrap.min.css">
  <script src="../thirdparty/js/bootstrap.min.js"></script>
</head>
<body>
<form action="../../../server/daos/procesarinciosesion.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Usuario</label>
    <input type="text" class="form-control"  name="username" >
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
    <input type="password" name="password" class="form-control" >
  </div>
 
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
</body>
</html>