<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/style.css">
    <!--Favicon-->
    <link rel="icon"   href="images/favicon-gbaf.png" />
</head>

<body> <?php if ((isset($_SESSION['prenomnom']))) {
            header('Location: accueil_success.php');
        } else {
            header('Location: connexion.php');
        }
        ?>

</body>


</html>