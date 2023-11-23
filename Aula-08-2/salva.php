  <?php
    require_once("time.php");
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      session_start();
      $time = new Time($_POST["ntime"], $_POST["ptime"]);
       
      if(isset($_SESSION["ntime"])){
        array_push($_SESSION["ntime"], $time->getNomeTime());
        
        array_push($_SESSION["ptime"], $time->getPontosTime());
        
        $_SESSION['json_times'] = json_decode($_SESSION['json_times']);
        
        array_push($_SESSION['json_times'], array("nome" => $time->getNomeTime(), "pontos" => $time->getPontosTime()));
        
        $_SESSION['json_times'] = json_encode($_SESSION['json_times']);
      } else {
        $_SESSION["ntime"] = array($time->getNomeTime());
        $_SESSION["ptime"] = array($time->getPontosTime());
        $_SESSION['json_times'] = json_encode(array(array("nome" => $time->getNomeTime(), "pontos" => $time->getPontosTime())));
      }
      
    }
    echo $_SESSION['json_times'];
    echo "Time salvo com sucesso!";
    echo "<br>";
    echo "<a href='mostra.php'>Mostrar Time</a>";
  ?>