<?php
  require_once("time.php");
  session_start();
  $timecasa = new Time($_POST["timecasa"]);
  $timefora = new Time($_POST["timefora"]);

  echo "<a href='times.php'>Voltar</a> <br>";

  if($timecasa->getNomeTime() == $timefora->getNomeTime()) {
    echo "Times iguais!";
    return;
  }

  $times = json_decode($_SESSION['json_times']);


  $tcasa = array_search($timecasa->getNomeTime(), array_column($times, 'nome'));
  $tfora = array_search($timefora->getNomeTime(), array_column($times, 'nome'));

  $timecasa->setPontosTime($times[$tcasa]->pontos);
  $timefora->setPontosTime($times[$tfora]->pontos);

  if($timecasa->getPontosTime() > $timefora->getPontosTime()) {
    echo "O time da casa ganhou!";
  } else if($timecasa->getPontosTime() < $timefora->getPontosTime()) {
    echo "O time de fora ganhou!";
  } else {
    echo "Empate!";
  }
  
?>