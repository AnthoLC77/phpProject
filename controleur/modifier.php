<?php
include_once 'connexion.php';

// Affichage des données de l'utilisateur 
if (isset($_GET["id"])) {
    $id = $_GET['id'];
    try {
        $query = "SELECT * FROM users WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        //var_dump($user);

    } catch (PDOException $e) {
        header('location:../index.php');
        echo "Erreur" . $e->getMessage();
    }
}
?>

<?php
// Récupération des données de l'utilisateur
include_once '../vue/modif.php';
if (isset($_POST['button'])) {
    try {
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "UPDATE users SET lastname = '$lastname', firstname = '$firstname', email = '$email', password = '$password' WHERE id = $id";

        $db->exec($query);
        header('Location: ../vue/users.php');
    } catch (PDOException $e) {
        echo 'Erreur' . $e->getMessage();
    }
}
?> 
