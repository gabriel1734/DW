<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="salva.php" method="post">
    <label for="ntime">Nome do time </label>
    <input type="text" name="ntime" id="ntime"> <br>
    <label for="ptime">Pontos do time </label>
    <input type="number" name="ptime" id="ptime"> <br>
    <input type="submit" value="Salvar">
  </form>
  <a href="mostra.php">Mostrar Times Cadastrados!</a>
</body>
</html>