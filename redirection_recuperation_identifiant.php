<?php session_start(); ?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Récupération de mot de passe</title>
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
<?php require '_header.php'; ?>
<div class="boxed">
    <p> Votre identifiant est : <bold class="redbold"> <?php echo $_SESSION['identifiant'] ?></bold>
    </p>
    <meta http-equiv="refresh" content="5;index.php">
    <?php session_destroy(); ?>
    <p>Vous allez être redirigé vers la page de connexion dans 5 secondes, si la redirection ne fonctionne pas, cliquez ici : <a href="index.php">Connexion</a></p>
    <?php require '_footer.php' ?>
</div>

<body>
</body>

</html>