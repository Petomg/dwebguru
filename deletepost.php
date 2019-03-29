<?php
  require_once "pdo.php";

  if(isset($_POST['postid'])){
    $sql = "DELETE FROM posts WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
      ':id' => $_POST['postid'] ));

  };

  header('Location:all.php');
  return;
 ?>
