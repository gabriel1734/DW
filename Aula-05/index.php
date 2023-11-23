<!DOCTYPE html>
<html>

<head>
  <title>Resultado da Partida</title>
</head>

<body>
  <h1>Resultado da Partida</h1>
  <form method="post">
    <h2>Time Casa:</h2>
    <label for="casa_nome">Nome do Time:</label>
    <select name="casa_nome" id="casa_nome">
      <option value="Corinthians">Corinthians</option>
      <option value="Palmeiras">Palmeiras</option>
      <option value="São Paulo">São Paulo</option>
      <option value="Portuguesa">Portuguesa</option>
      <option value="Vasco">Vasco</option>
    </select>
    <label for="casa_brasao">Imagem do Brasão:</label>
    <input type="text" name="casa_brasao"><br>
    <label for="casa_gp">GP:</label>
    <input type="number" name="casa_gp"><br>
    <label for="casa_gc">GC:</label>
    <input type="number" name="casa_gc"><br>
    <label for="casa_sg">SG:</label>
    <input type="number" name="casa_sg"><br>
    <label for="casa_percent">%</label>
    <input type="number" name="casa_percent"><br>
    <label for="casa_vitorias">Vitórias últimos 5 jogos:</label>
    <select name="casa_vitorias" id="casa_vitorias">
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2" selected>2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select> <br>
    <label for="casa_empates">Empates últimos 5 jogos:</label>
    <select name="casa_empates" id="casa_empates">
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2" selected>2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select> <br>
    <label for="casa_derrotas">Derrotas últimos 5 jogos:</label>
    <select name="casa_derrotas" id="casa_derrotas">
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2" selected>2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select> <br>

    <h2>Time Fora:</h2>
    <label for="fora_nome">Nome do Time:</label>
    <select name="fora_nome" id="fora_nome">
      <option value="Corinthians">Corinthians</option>
      <option value="Palmeiras">Palmeiras</option>
      <option value="São Paulo">São Paulo</option>
      <option value="Portuguesa">Portuguesa</option>
      <option value="Vasco">Vasco</option>
    </select> <br>
    <label for="fora_brasao">Imagem do Brasão:</label>
    <input type="text" name="fora_brasao"><br>
    <label for="fora_gp">GP:</label>
    <input type="number" name="fora_gp"><br>
    <label for="fora_gc">GC:</label>
    <input type="number" name="fora_gc"><br>
    <label for="fora_sg">SG:</label>
    <input type="number" name="fora_sg"><br>
    <label for="fora_percent">%</label>
    <input type="number" name="fora_percent"><br>
    <label for="fora_vitorias">Vitórias últimos 5 jogos:</label>
    <select name="fora_vitorias" id="fora_vitorias">
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2" selected>2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select> <br>
    <label for="fora_empates">Empates últimos 5 jogos:</label>
    <select name="fora_empates" id="fora_empates">
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2" selected>2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select> <br>
    <label for="fora_derrotas">Derrotas últimos 5 jogos:</label>
    <select name="fora_derrotas" id="fora_derrotas">
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2" selected>2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select> <br>

    <input type="submit" value="Calcular Resultado">
  </form>



  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do time casa
    $casa_nome = $_POST["casa_nome"];

    $casa_brasao = $_POST["casa_brasao"];

    $casa_gp = $_POST["casa_gp"];
    $casa_gc = $_POST["casa_gc"];
    $casa_sg = $_POST["casa_sg"];
    $casa_percent = $_POST["casa_percent"];
    $casa_vitorias = $_POST["casa_vitorias"];
    $casa_empates = $_POST["casa_empates"];
    $casa_derrotas = $_POST["casa_derrotas"];

    // Obter os dados do time fora
    $fora_nome = $_POST["fora_nome"];

    $fora_brasao = $_POST["fora_brasao"];

    $fora_gp = $_POST["fora_gp"];
    $fora_gc = $_POST["fora_gc"];
    $fora_sg = $_POST["fora_sg"];
    $fora_percent = $_POST["fora_percent"];
    $fora_vitorias = $_POST["fora_vitorias"];
    $fora_empates = $_POST["fora_empates"];
    $fora_derrotas = $_POST["fora_derrotas"];

    $fora = 0;
    $casa = 0;
    // Calcular saldos
    if ($casa_sg > $fora_sg) {
      $casa++;
    } else {
      $fora++;
    }
    if ($casa_percent > $fora_percent) {
      $casa++;
    } else {
      $fora++;
    }
    if ($casa_vitorias > $fora_vitorias) {
      $casa++;
    } else {
      $fora++;
    }
    if ($casa_empates > $fora_empates) {
      $casa++;
    } else {
      $fora++;
    }
    if ($casa_derrotas > $fora_derrotas) {
      $casa++;
    } else {
      $fora++;
    }
    //definir resultado
    if ($fora > $casa) {
      $casa_nome = $fora_nome;
      $casa_brasao = $fora_brasao;
      $casa_saldo_gp = $fora_gp;
      $casa_saldo_gc = $fora_gc;
      $casa_saldo_sg = $fora_sg;
      $casa_saldo_percent = $fora_percent;
      $casa_saldo_vitorias = $fora_vitorias;
      $casa_saldo_empates = $fora_empates;
      $casa_saldo_derrotas = $fora_derrotas;
    }

    echo "<table border='1px'>
          <thead>
            <tr>
              <th>{$casa_nome}</th>
              <th><img src='{$casa_brasao}'style='max-width: 100px; max-height: 100px;'/></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>GP</td>
              <td>{$casa_gp}</td>
            </tr>
            <tr>
              <td>GC</td>
              <td>{$casa_gc}</td>
            </tr>
            <tr>
              <td>SG</td>
              <td>{$casa_sg}</td>
            </tr>
          </tbody>
        </table>
    ";
  }
  ?>
</body>

</html>