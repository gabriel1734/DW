<?php 
  session_start();
  session_destroy();
  echo "Sessão limpa!";
  echo "<br>";
  echo "<a href='index.php'>Voltar</a>";
?>