<!DOCTYPE html>
<html lang="en">
<?php $url = 'http://localhost/DW/aula-13/'; ?>
<?php 
  if($_GET['deslogar']){
    session_start();
    session_destroy();
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Deslogado com sucesso!</strong> Você foi deslogado com sucesso!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
  }
  if($_GET['erro']){
    $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Erro!</strong> Usuário ou senha incorretos!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
  }
  if($_GET['cadastro']){
    $alert = '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Cadastro realizado com sucesso!</strong> Você foi cadastrado com sucesso!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
  }

?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo $url ?>../node_modules/bootstrap/dist/css/bootstrap.min.css">
  <script src="<?php echo $url ?>../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo $url ?>../node_modules/bootstrap-icons/font/bootstrap-icons.css">
  <title>Document</title>
</head>

<body>
  <section class="container container-fluid mt-4 w-50" >
    <?php echo $alert ?>
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