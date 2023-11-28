<!DOCTYPE html>
<html lang="en">
<?php include_once("conectaDB.php"); ?>
<?php $url = 'http://localhost/DW/aula-13/'; ?>

<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $senha = $_POST["senha"];
  try {
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (password_verify($senha . 'paodebatata', $user['senha'])) {
      $_SESSION['user'] = $user;
    } else {
      header('Location: login.php?erro=1');
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}


if (!isset($_SESSION['user'])) {
  header('Location: login.php?erro=1');
}
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo $url ?>../node_modules/bootstrap/dist/css/bootstrap.min.css">
  <script src="<?php echo $url ?>../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo $url ?>../node_modules/bootstrap-icons/font/bootstrap-icons.css">
  <script src="js/index.js"></script>
  <title>aula_13</title>
</head>

<body>
  <input type="hidden" id="mainUrl" value="<?php echo $url ?>" />
  <nav class="navbar navbar-dark bg-dark navbar-expand-xxl">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">DW Aula-13</a>
      <ul class="navbar-nav">
        <li><a class="btn btn-primary ms-md-2" href="<?php echo $url ?>login.php?deslogar=1" role="button">Sair</a></li>
        </li>
      </ul>
    </div>
  </nav>
  <section class="mt-5  container container-fluid">
    <div class="row">
      <div class="col">
        <div class="alert alert-primary" role="alert">
          <div class="row align-items-end">
            <div class="col-10">
              <label for="formFile" class="form-label">Insira uma imagem aqui</label>
              <input class="form-control" type="file" accept="image/*" id="formImageFile">
            </div>
            <div class="col-auto">
              <button type="button" class="btn btn-primary btn-lg" id="sendImage" onclick="sendImage(<?php echo $_SESSION['user']['id']; ?>);">Enviar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row text-center">
      <?php
      $sql = "SELECT
      i.nome AS img_nome,
      i.id AS img_id,
      COALESCE(likes_count, 0) AS likes,
      COALESCE(dislikes_count, 0) AS dislikes,
      CASE
          WHEN ul.id_imagem IS NOT NULL THEN 1
          ELSE 0
      END AS usuario_deu_like,
      CASE
          WHEN ud.id_imagem IS NOT NULL THEN 1
          ELSE 0
      END AS usuario_deu_dislike
  FROM imagens AS i
      LEFT JOIN (
          SELECT
              id_imagem,
              COUNT(id) AS likes_count
          FROM likes
          GROUP BY
              id_imagem
      ) AS likes_sub ON i.id = likes_sub.id_imagem
      LEFT JOIN (
          SELECT
              id_imagem,
              COUNT(id) AS dislikes_count
          FROM dislikes
          GROUP BY
              id_imagem
      ) AS dislikes_sub ON i.id = dislikes_sub.id_imagem
      LEFT JOIN (
          SELECT id_imagem
          FROM likes
          WHERE
              id_usuario = :id
      ) AS ul ON i.id = ul.id_imagem
      LEFT JOIN (
          SELECT id_imagem
          FROM dislikes
          WHERE
              id_usuario = :id
      ) AS ud ON i.id = ud.id_imagem;";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':id', $_SESSION['user']['id']);
      $stmt->execute();
      $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach ($images as $image) {

        $dislike = $image['usuario_deu_like'] == 1 ? 'disabled' : '';
        $like = $image['usuario_deu_dislike'] == 1 ? 'disabled' : '';

        echo '
                <div class="col mb-3">
                  <div class="card" style="width: 18rem;">
                    <img src="uploads/' . $image['img_nome'] . '" class="card-img-top" alt="...">
                    <div class="card-body">
                      <div class="row text-center">
                        <div class="col">
                          <button class="btn btn-primary" id="btn_like-' . $image['img_id'] . '" onclick="likeImage(' . $image['img_id'] . ',' . $_SESSION['user']['id'] . ')" ' . $like . '><i class="bi bi-heart-fill"></i> <span id="likes-' . $image['img_id'] . '">' . $image['likes'] . '</span></button>
                        </div>
                        <div class="col">
                      <button class="btn btn-danger" id="btn_dislike-' . $image['img_id'] . '" onclick="dislikeImage(' . $image['img_id'] . ',' . $_SESSION['user']['id'] . ')" ' . $dislike . '><i class="bi bi-arrow-down"> <span id="dislikes-' . $image['img_id'] . '">' . $image['dislikes'] . '</span></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>';
      }
      ?>
    </div>
  </section>
</body>

</html>