<?php include '../controleur/loginConnect.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="form">
        <a href="../index.php" class="back_btn"><img src="../images/back.png"> Retour</a>
        <form action="" method="POST">
                <label>Email</label>
                <input type="email" name="email">
                <label>Mot de passe</label>
                <input type="password" name="password">
                <input type="submit" value="Se connecter" name="button">
        </form>
    </div>
    
</body>
</html>