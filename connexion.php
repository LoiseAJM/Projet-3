<?php session_start(); ?>
<html>
    <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Connexion</title>
            <link rel="stylesheet" href="css/style.css">
            <!--Favicon-->
            <link rel="icon" type="image" href="images/favicon-gbaf.png" />
    </head>
    <body>
        <!-- Redirection si l'utilisateur est déjà connecté -->
        <?php
            if(isset ($_SESSION['prenomnom'])){
                header('Location: accueil_success.php');
        }?>

        <?php require '_header.php'?>

        <form class="form_style" method="post" action="<?php echo htmlspecialchars("verification.php");?>"> 

            <h1 id="connexion">
                Connexion
            </h1>
            <div>
                <label for="f_identifiant"> Identifiant :</label>
                <input required= "true" type="text" name="f_identifiant" placeholder="Votre identifiant">
            </div>
            
            <div>
                <label for="f_motdepasseconnexion">Mot de passe :</label>
                <input required= "true"  type="password" name="f_motdepasseconnexion"placeholder="Votre mot de passe">
            </div>

            <div>
                <input type ="submit" value ="Envoyer"/><br><br>
            </div>
            <div class="centered underline">
                <a href="inscription.php">Je n'ai pas encore de compte</a>
            </div>
            <br>
            <div class="centered underline">
                <a href="redirection_probleme_connexion.php">Je n'arrive pas à me connecter</a>
            </div>
        </form>
        <?php require '_footer.php'?>
    </body>
</html>
        
