<?php
include_once 'connexion.php';

// Ajouter un utilisateur  
if (isset($_POST['button'])) {
    try {
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        // Préparation de la requête 

        // $error = array();
        // $req = $pdo -> prepare('SELECT email FROM users WHERE email = :email');
        // $req -> execute(array(':email' => $email));
        // $user = $req->fetch();
        // if ($user) {
        //     echo 'Cet email est deja utilisé sur un autre compte';
        // };

        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users(lastname, firstname, email, password) VALUES (:lastname, :firstname , :email, :password)";

        $statement = $db->prepare($query);

        // Exécution de la requête 

        $statement->execute(array(
            ":lastname" => $lastname,
            ":firstname" => $firstname,
            ":email" => $email,
            "password" => $password
        ));

        echo "Utilisateur ajouté avec succès!";
    } catch (PDOException $e) {
        echo "Erreur" . $e->getMessage() . "";
    }

    header("location: ../vue/login.php");
};

?>
