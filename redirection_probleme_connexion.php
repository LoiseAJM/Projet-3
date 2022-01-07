<?php session_start(); ?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Problème d'inscription</title>
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
<!-- Si l'utilisateur n'est pas connecté  -->
<?php require '_header.php'; ?>
<div class="boxed">
    <h1 class="centered"> Que se passe-t-il ? </h1><br>
    <p class="centered underline"><a href="oubli_identifiant.php">J'ai oublié mon identifiant</a></p><br>
    <p class="centered underline"> <a href="oubli_mot_de_passe.php">J'ai oublié mon mot de passe</a></p>
</div>

<?php require '_footer.php'; ?>

</html>