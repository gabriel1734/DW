  <?php
    
    require_once("time.php");
    require_once("conectaDB.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
      session_start();
      $time = new Time($_POST["ntime"], $_POST["ptime"]);
       
      

      $stmt = $pdo->prepare('INSERT INTO times (nome, pontos) VALUES (:nome, :pontos)');
      $stmt->execute(array(
        ':nome' => $time->getNomeTime(),
        ':pontos' => $time->getPontosTime()
      ));

      if($stmt->rowCount() > 0) {
        echo "Time salvo com sucesso!";
      } else {
        echo "<script>alert('Erro ao salvar time!');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
      }
    }
    echo "<br>";
    echo "<a href='mostra.php'>Mostrar Time</a>";
  ?>