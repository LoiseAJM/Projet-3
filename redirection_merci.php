<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Confirmation de vote</title>
    <link rel="stylesheet" href="css/style.css">
    <!--Favicon-->
    <link rel="icon"   href="images/favicon-gbaf.png" />
</head>
<!-- Si l'utilisateur n'est pas connecté  -->
<?php if (empty($_SESSION['prenomnom']))
{
    session_destroy();
    header('Location: index.php');
}
?>

<!-- Si l'utilisateur est connecté  -->
<meta http-equiv="refresh" content="4;accueil_success.php">
<?php require '_header.php'; ?>
<div class="boxed">
    <p> Merci d'avoir donné votre avis sur ce partenaire.</p>
    <p> Si vous n'êtes pas redirigé, cliquez ici : <a href="accueil_success.php"><span class="underline">Accueil</span></a></p>

</div>
<?php require '_footer.php' ?>

<body>
</body>

</html>