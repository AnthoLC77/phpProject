<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header('location: ../index.php');
    exit;
}

if ($_SESSION["user_role"] !== 'admin') {
    header('location: ../index.php');
    exit;
}

if (!isset($_COOKIE['auth_token'])) {
    session_destroy();
    header('location: ../index.php');
    exit;
}
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Utilisateurs</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>
            <?php
            echo "Bienvenue ". $_SESSION["firstname"] .' '. $_SESSION["lastname"] . ''. '(' . $_SESSION["user_role"] . ')'
            ?> 
        </h1>
        <div id="inscription">
            <div id="navbar" >
                <button class="btn_home"><a href="users.php">Utilisateurs</a></button>
                <button name="button" class="btn_home connexion"><a href="../controleur/welcomeLogout.php">Deconnexion</a></button>
            </div>
        </div>
</body>
</html>