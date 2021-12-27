<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Redirection</title>
    <link rel="stylesheet" href="css/style.css">
    <!--Favicon-->
    <link rel="icon" type="image" href="images/favicon-gbaf.png" />
</head>
<?php if(empty ($_SESSION['prenomnom'])) //l'utilisateur n'est pas connecté
               {
               session_destroy();
               header('Location: index.php');
               }
               ?>
               
<meta http-equiv="refresh" content="4;accueil_success.php">
<?php require '_header.php'; ?>
<div class="boxed">
<p> Vous avez déjà voté pour ce partenaire, on ne peut voter qu'une seule fois.</p>
<p> Si vous n'êtes pas redirigé, cliquez ici : <a href="accueil_success.php">accueil</a></p>
<?php require '_footer.php'?>
</div>

<body>
</body>
</html>