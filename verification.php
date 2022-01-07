<?php session_start(); ?>
<html>
<!--Vérification de mot de passe au moment de la connexion -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vérification</title>
    <link rel="stylesheet" href="css/style.css">
    <!--Favicon-->
    <link rel="icon" type="image" href="images/favicon-gbaf.png" />
</head>
<!-- Si l'utilisateur est connecté  -->
<?php
if (isset($_SESSION['prenomnom'])) {
    header('Location: accueil_success.php');
}
?>

<!--Utilisateur non connecté-->
<?php {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Récupération des infos du formulaire 
        $identifiant = htmlentities(trim($_POST['f_identifiant']));
        $motdepasseconnexion = htmlentities(trim($_POST['f_motdepasseconnexion']));
        //connexion avec la base de données

        $conn = new PDO("mysql:host=localhost; dbname=dev;", 'dev', 'devpass');
        $sql = "SELECT * FROM `account` WHERE `username` = :username";
        $statement = $conn->prepare($sql);
        $statement->bindParam('username', $identifiant);
        $statement->execute();
        $row = $statement->fetch();
        $password = $row['password'];
        $nom = $row['last_name'];
        $prenom = $row['first_name'];
        $account_id = $row['account_id'];
        $username = $row['username'];

        if (empty($username)) //l'username n'existe pas dans la db
        {
            session_destroy();
            require '_header.php';
            require 'connexion.php';
            echo "<div class='centered redbold'>Identifiant inconnu<div>";
            require '_footer.php';
        } else {
            if (password_verify($motdepasseconnexion, $password)) //si le mot de passe est correct
            {
                $_SESSION['prenomnom'] = $prenom . ' ' . $nom;
                $_SESSION['account_id'] =  $account_id;
                $_SESSION['username'] = $username;
                header('Location: accueil_success.php');
            } else {//le mot de passe n'est pas correct
                session_destroy();
                require 'connexion.php';
                echo "<div class='centered redbold'>Mot de passe incorrect<div>";
            }
        }
    }
}



?>

</body>

</html>