<?php session_start(); ?>
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
if (isset($_SESSION['prenomnom'])) {
    header('Location: accueil_success.php');
}
?>
<!--Si l'utilisateur n'est pas connecté -->
<body>
    <meta http-equiv="refresh" content="4;index.php">
    <?php require '_header.php'; ?>
    <div class="boxed">
        <p> Inscription réalisée avec succès, vous allez être redirigé vers la page de connexion</p>
        <p> Si vous n'êtes pas redirigé, cliquez ici : <a href="index.php">Page d'accueil</a></p>

    </div>

    <?php require '_footer.php' ?>
</body>

</html>