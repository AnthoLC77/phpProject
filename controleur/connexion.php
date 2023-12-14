<?php
  //connexion à la base de données

// Nom du serveur
$host = "localhost";
// Nom d'utilisateur
$username = 'root';
// Mot de passe 
$password = '';
// Nom de la basede données 
$database = "crud-users";

try {
    $db = new PDO("mysql:host=$host;dbname=$database", $username, $password);
} catch (PDOException $e) {
    die ("Echec de la connexion : " . $e->getMessage());
}
?>