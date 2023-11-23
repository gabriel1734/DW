<!DOCTYPE html>
<html lang="en">
<?php 
  session_start(); 
  require_once("conectaDB.php");
  $times = $pdo->prepare('SELECT * FROM times');
  $times->execute();
  if($times->rowCount() <= 0) {
    $times = array(null);
    echo "<script>alert('Não há times cadastrados!');</script>";
    echo "<script>window.location.href = 'index.php';</script>";
    return;
  }
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="resultado.php" method="post">
    <label for="timecasa">Time da Casa:</label>
    <select name="timecasa" id="timecasa">
    <?php
        foreach ($times as $key => $value) {
          echo "<option value='$value[nome]'>$value[nome]</option>";
        }
      ?>
    </select>
    <label for="timefora">Time de Fora:</label>
    <select name="timefora" id="timefora">
      <?php
        $times = $pdo->prepare('SELECT * FROM times');
        $times->execute();
        foreach ($times as $key => $value) {
          echo "<option value='$value[nome]'>$value[nome]</option>";
        }
      ?>
    </select>
    <input type="submit" value="Calcular">
  </form>
</body>
</html>