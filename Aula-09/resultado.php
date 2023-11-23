<?php
  require_once("time.php");
  require_once("conectaDB.php");
  
  $timecasa = new Time($_POST["timecasa"]);
  $timefora = new Time($_POST["timefora"]);

  echo "<a href='times.php'>Voltar</a> <br>";

  if($timecasa->getNomeTime() == $timefora->getNomeTime()) {
    echo "Times iguais!";
    return;
  }

  $tcasa = $pdo->prepare("SELECT * FROM times WHERE nome = :nome LIMIT 1");
  $tcasa->execute(array(
    ':nome' => $timecasa->getNomeTime()
  ));

  if($tcasa->rowCount() <= 0) {
    echo "Time da casa não existe!";
    return;
  }

  $resultado1 = $tcasa->fetch(PDO::FETCH_ASSOC);

  $tfora = $pdo->prepare("SELECT * FROM times WHERE nome = :nome LIMIT 1" );
  $tfora->execute(array(
    ':nome' => $timefora->getNomeTime()
  ));

  if($tfora->rowCount() <= 0) {
    echo "Time de fora não existe!";
    return;
  }

  $resultado2 = $tfora->fetch(PDO::FETCH_ASSOC);
  
  $timecasa->setNomeTime($resultado1['nome']);
  $timefora->setNomeTime($resultado2['nome']);
  $timecasa->setPontosTime($resultado1['pontos']);
  $timefora->setPontosTime($resultado2['pontos']);

  if($timecasa->getPontosTime() > $timefora->getPontosTime()) {
    echo "O time da casa ganhou!";
  } else if($timecasa->getPontosTime() < $timefora->getPontosTime()) {
    echo "O time de fora ganhou!";
  } else {
    echo "Empate!";
  }
  
?>