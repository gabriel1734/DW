<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
  <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
  <title>Document</title>
</head>

<body>
  <section class="container container-fluid mt-4" style="max-width: 80%;">
    <form action="index.php" method="post">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input type="email" class="form-control" name='email' id="exampleFormControlInput1" placeholder="name@example.com">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Senha</label>
        <input type="password" class="form-control" name="senha" id="senha">
        <button type="submit" class="btn btn-primary mt-3">Enviar</button>
        <a href="cadastro.php" class="btn btn-primary mt-3">Cadastrar</a>
      </div>
    </form>
  </section>
</body>

</html>