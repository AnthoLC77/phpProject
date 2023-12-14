<?php
include_once 'connexion.php';
include_once '../vue/confirm.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  $id = $_GET['id'];

  if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
    try {
      $query = "DELETE FROM users WHERE id = :id";
      $statement = $db->prepare($query);
      $statement->bindValue(':id', $id, PDO::PARAM_INT);
      $statement->execute();

      header('Location: ../vue/users.php');
      exit();
    } catch (PDOException $e) {
      echo "Erreur : " . $e->getMessage();
      header('Location: ../index.php');
      exit();
    }
  }
} else {
  header('Location: ../index.php');
  exit();
}
