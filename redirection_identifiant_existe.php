<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Redirection</title>
    <link rel="stylesheet" href="css/style.css">
    <!--Favicon-->
    <link rel="icon" type="image" href="images/favicon-gbaf.png" />
</head>
 <!-- Si l'utilisateur est connecté  -->
 <?php
        if(isset ($_SESSION['prenomnom'])){
            header('Location: accueil_success.php');
            }
    ?>
<meta http-equiv="refresh" content="4;inscription.php">
<?php require '_header.php'; ?>
<div class="boxed">
<p> Cet identifiant existe déjà, merci d'en choisir un autre.</p>
<p> Si vous n'êtes pas redirigé, cliquez ici : <a href="inscription.php">Inscription</a></p>
<?php require '_footer.php'?>
</div>

<body>
</body>
</html>