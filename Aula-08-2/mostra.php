<?php
  session_start();
  $ntime = $_SESSION["ntime"];
  $ptime = $_SESSION["ptime"];
  foreach ($ntime as $key => $value) {
    echo "$value: $ptime[$key] pontos<br>";
  }
  echo "<a href='times.php'>Definir resultado</a> <br>";
  echo "<a href='index.php'>Voltar</a> <br>";
  echo "<a href='limpa.php'>Limpar</a> <br>";
?>