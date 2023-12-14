<?php include '../controleur/register.php'?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="form">
        <a href="../index.php" class="back_btn"><img src="../images/back.png"> Retour</a>
        <h2>Ajouter un utilisateur</h2>
        <p class="erreur_message">
        </p>
        <form action="" method="POST">
            <label>Nom</label>
            <input type="text" name="lastname">
            <label>Prénom</label>
            <input type="text" name="firstname">
            <label>Email</label>
            <input type="email" name="email">
            <label>Mot de passe</label>
            <input type="password" name="password">
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>

</html>