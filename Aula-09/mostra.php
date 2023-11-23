<?php
  require_once("conectaDB.php");
  $stmt = $pdo->prepare('SELECT * FROM times');
  $stmt->execute();
  if($stmt->rowCount() > 0) {
    echo "
      <table>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Pontos</th>
        </tr>";
    foreach ($stmt as $key => $value) {
      echo "
              <tr>
                <td>$value[id]</td>
                <td>$value[nome]</td>
                <td>$value[pontos]</td>
              </tr>
      ";
    }
    echo "</table>";
  } else {
    echo "<script>alert('Não há times cadastrados!');</script>";
    echo "<script>window.location.href = 'index.php';</script>";
    return;
  }
  echo "<a href='times.php'>Definir resultado</a> <br>";
  echo "<a href='index.php'>Voltar</a> <br>";
  echo "<a href='limpa.php'>Limpar</a> <br>";
?>
<style>
  table {
    border: 1px solid black;
    border-collapse: collapse;
  }
  th, td {
    border: 1px solid black;
    padding: 5px;
  }
</style>