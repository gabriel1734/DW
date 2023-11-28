<!DOCTYPE html>
<html lang="en">
<?php  
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once("conectaDB.php");
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $senha = password_hash($senha.'paodebatata', PASSWORD_DEFAULT);
    try{
      $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");
      $stmt->bindParam(':nome', $nome);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':senha', $senha);
      $stmt->execute();
      header('Location: login.php?cadastro=1');
    } catch (PDOException $e){
      echo $e->getMessage();
    }
  }
?>


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
  <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
  <title>Cadastro</title>
</head>

<body>
  <section class="container container-fluid mt-4" style="max-width: 80%;">
    <form method="post">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nome</label>
        <input type="text" class="form-control" name='nome' id="exampleFormControlInput1" placeholder="name@example.com">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input type="email" class="form-control" name='email' id="exampleFormControlInput1" placeholder="name@example.com">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Senha</label>
        <input type="password" class="form-control" name="senha" id="senha">
        <button type="submit" class="btn btn-primary mt-3">Enviar</button>
      </div>
    </form>
  </section>
</body>

</html>