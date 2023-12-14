<?php
include_once 'connexion.php';
include_once '../vue/login.php';

if (isset($_POST['button'])) {
    try {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE email = :email";
        $statement = $db->prepare($query);
        $statement->execute(array(":email" => $email));

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user["password"])) {
                session_start();
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["firstname"] = $user["firstname"];
                $_SESSION["lastname"] = $user["lastname"];
                $_SESSION["user_role"] = $user["role"];

                $token = bin2hex(random_bytes(32));

                setcookie("auth_token", $token, time() + 3600, "/");


                if ($user["role"] === "admin") {
                    header("location: ../vue/dashboard.php");
                    exit;
                } else {
                    header("location: ../vue/welcome.php");
                    exit;
                }


                header("location: ../vue/welcome.php");
                exit;
            } else {
                echo "Mot de passe incorrect";
            }
        } else {
            echo "Utilisateur non trouvé";
        }
    } catch (PDOException $e) {
        echo "Erreur" . $e->getMessage() . "";
    }
}
