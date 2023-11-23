<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>

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
      if (isset($_SESSION["ntime"])) {
        foreach ($_SESSION["ntime"] as $key => $value) {
          echo "<option value='$value'>$value</option>";
        }
      }
      ?>
    </select>
    <label for="timefora">Time de Fora:</label>
    <select name="timefora" id="timefora">
      <?php
      if (isset($_SESSION["ntime"])) {
        foreach ($_SESSION["ntime"] as $key => $value) {
          echo "<option value='$value'>$value</option>";
        }
      }
      ?>
    </select>
    <input type="submit" value="Salvar">
  </form>
</body>
</html>