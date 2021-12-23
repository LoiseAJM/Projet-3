<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Confirmation de vote</title>
    <link rel="stylesheet" href="style.css">
    <!--Favicon-->
    <link rel="icon" type="image" href="images/favicon-gbaf.png" />
</head>
<?php if(empty ($_SESSION['prenomnom'])) //l'utilisateur n'est pas connecté
               {
               session_destroy();
               header('Location: login.php');
               }
               ?>
<meta http-equiv="refresh" content="4;accueil_success.php">
<?php require 'header.php'; ?>
<div class="boxed">
<p> Merci d'avoir donné votre avis sur ce partenaire.</p>
<p> Si vous n'êtes pas redirigé, cliquez ici : <a href="accueil_success.php">accueil</a></p>

</div>
<?php require 'footer.php'?>
<body>
</body>
</html>