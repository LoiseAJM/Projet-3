<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ajax Oubli d'identifiant</title>
</head>

<body>

    <?php
    $r_nom = htmlentities(trim($_GET['r_nom']));
    $r_prenom = htmlentities(trim($_GET['r_prenom']));

    //connexion avec la base de données
    $conn = new PDO("mysql:host=localhost; dbname=dev;", 'dev', 'devpass');
    $sql = "SELECT `username` FROM `account` WHERE `last_name` = :nom AND `first_name` = :prenom ;";
    $statement = $conn->prepare($sql);
    $statement->bindParam('prenom', $r_prenom);
    $statement->bindParam('nom', $r_nom);
    $statement->execute();
    $row = $statement->fetch();

    if ($row['username'] == NULL) {
        echo ("erreur username");
    } else {
        echo ('<div class="bottom_space"><span>Votre identifiant est :</span>' . ' ' . '<span class="redbold">' . $row['username'] . 
        '</span></div>');
        echo ('<p class="centered underline"> <a href="index.php">Revenir à l&#039accueil</a></p>');
    }
    ?>


</body>

</html>