<html>
<head>
<title>Redirection</title>
</head>
<?php require 'header.php'; ?>
<div class="boxed">
<p> Votre identifiant est : <?php echo $_SESSION['identifiant'] ;?> </p>
<?php session_destroy(); ?>
<p> Vous allez être redirigé vers la page de connexion, si la redirection ne fonctionne pas,  cliquez ici : <a href="index.php">Connexion</a></p>
<?php require 'footer.php'?>
</div>

<body>
</body>
</html>