<?php
 include_once '../controleur/connexion.php';
 try {
    $query = "SELECT * FROM users";
    $statement = $db ->prepare($query);
    $statement -> execute();
    $users = $statement -> fetchAll(PDO::FETCH_ASSOC);
    //var_dump($users);
 } catch (PDOException $e) {
    echo "Erreur" .  $e->getMessage();
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
        <a href="../vue/registerForm.php" class="Btn_add"> <img src="../images/plus.png"> Ajouter</a>
        <a href="../vue/dashboard.php" class="back_btn"><img src="../images/back.png"> Retour</a>

        <table>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Mot de passe</th>
                <th>Role</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php 
                foreach ($users as $user) {
            ?>
                <tr>
                    <td><?php echo $user['lastname'] ?></td>
                    <td><?php echo $user['firstname'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td><?php echo $user['password'] ?></td>
                    <td><?php echo $user['role'] ?></td>
                    <td><a href="modif.php?id=<?php echo $user['id'] ?>"><img src="../images/edit.png"></a></td>
                    <td><a href="confirm.php?id=
                    <?php echo $user['id'] ?>"><img src="../images/trash.png"></a></td>
                </tr>
            <?php
                }
            ?>
            </tr>
        </table> 
    </div>
  </div> 
</body>
</html>