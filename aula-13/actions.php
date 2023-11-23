<?php
require_once("conectaDB.php");

// if(!isset($_SESSION['user'])){
//   die();
// }

if(isset($_FILES['image']) && isset($_POST['action']) && $_POST['action'] == 'sendImage' && isset($_POST['id'])){
  $image = $_FILES['image'];
  $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
  $name = md5($image['name'].date('Y-m-d H:i:s')).'.'.$ext;
  $path = 'uploads/'.$name;
  $sql = "INSERT INTO imagens (nome, id_dono) VALUES (:nome, :id)";
  
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':nome', $name);
  $stmt->bindParam(':id', $_POST['id']);
  $stmt->execute();
  
  move_uploaded_file($image['tmp_name'], $path);
  
  if($stmt->rowCount() > 0){
    echo json_encode(array('status' => 'success', 'message' => 'Imagem enviada com sucesso!'));
  } else {
    echo json_encode(array('status' => 'error', 'message' => 'Erro ao enviar imagem!'));
  }
}

if(isset($_POST['action']) && $_POST['action'] == 'likeImage' && isset($_POST['id']) && isset($_POST['id_user'])){
  
  $id = $_POST['id'];
  $sql = "SELECT * FROM imagens WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  
  if($stmt->rowCount() == 0){
    echo json_encode(array('status' => 'error', 'message' => 'Imagem não encontrada!'));
    die();
  }
  
  $sql = "SELECT * FROM likes WHERE id_imagem = :id AND id_usuario = :id_user";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':id_user', $_POST['id_user']);
  $stmt->execute();
  
  if($stmt->rowCount() > 0){
    $sql = "DELETE FROM likes WHERE id_imagem = :id AND id_usuario = :id_user";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':id_user', $_POST['id_user']);
    $stmt->execute();
    echo json_encode(array('status' => 'success', 'message' => 'like_retirado'));
    die();
  }



  $sql = "INSERT INTO likes (id_imagem, id_usuario) VALUES (:id, :id_user)";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':id_user', $_POST['id_user']);
  $stmt->execute();
  
  if($stmt->rowCount() > 0){
    echo json_encode(array('status' => 'success', 'message' => 'Imagem curtida com sucesso!'));
  } else {
    echo json_encode(array('status' => 'error', 'message' => 'Erro ao curtir imagem!'));
  }
 
}

if(isset($_POST['action']) && $_POST['action'] == 'dislikeImage' && isset($_POST['id']) && isset($_POST['id_user'])){
  $id = $_POST['id'];
  $sql = "SELECT * FROM imagens WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->execute();

  if ($stmt->rowCount() == 0) {
    echo json_encode(array('status' => 'error', 'message' => 'Imagem não encontrada!'));
    die();
  }

  $sql = "SELECT * FROM dislikes WHERE id_imagem = :id AND id_usuario = :id_user";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':id_user', $_POST['id_user']);
  $stmt->execute();

  if ($stmt->rowCount() > 0) {
    $sql = "DELETE FROM dislikes WHERE id_imagem = :id AND id_usuario = :id_user";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':id_user', $_POST['id_user']);
    $stmt->execute();
    echo json_encode(array('status' => 'success', 'message' => 'dislike_retirado'));
    die();
  }



  $sql = "INSERT INTO dislikes (id_imagem, id_usuario) VALUES (:id, :id_user)";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':id_user', $_POST['id_user']);
  $stmt->execute();

  if ($stmt->rowCount() > 0) {
    echo json_encode(array('status' => 'success', 'message' => 'Imagem descurtida com sucesso!'));
  } else {
    echo json_encode(array('status' => 'error', 'message' => 'Erro ao descurtir a imagem!'));
  }
}