<html>
<head>
<title>Redirection</title>
</head>
<?php require 'header.php'; ?>
<div class="boxed">
<p> Votre identifiant est : <bold class="redbold"> <?php echo $_SESSION['identifiant']?></bold> </p>
<meta http-equiv="refresh" content="5;index.php">
<?php session_destroy(); ?>
<p>Vous allez être redirigé vers la page de connexion dans 5 secondes, si la redirection ne fonctionne pas,  cliquez ici : <a href="index.php">Connexion</a></p>
<?php require 'footer.php'?>
</div>

<body>
</body>
</html>