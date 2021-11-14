<html>
    <head>
        <meta charset="utf-8">
        <title>Connexion</title>
        <link rel="stylesheet" href="style.css">
        <!--Favicon-->
        <link rel="icon" type="image" href="images/favicon-gbaf.png" />
    </head>
    <body>
    <!--Appel du header-->
        <?php require 'header.php'; ?>
            <div class="conteneur1">
                <div class="formulaire1">
                    <h1 id="connexion">
                        Connexion
                    </h1>
                    <form>
                        <div>
                            <label for="identifiant"> Identifiant :</label>
                            <input type="text" name="nom" id="nom" placeholder="Votre identifiant" class="form_input">
                        </div>
                        
                        <div>
                            <label for="motdepasseconnexion">Mot de passe :</label>
                            <input type="password" name="motpdepasseconnexion" id="motdepasseconnexion" placeholder="Votre mot de passe" class="form_input">
                        </div>

                        <div>
                            <button class="submit">Envoyer
                            </button>
                        </div>
                    </form>
                </div>  
                <div>
                <a href="connexion.php">Je veux créer un compte</a>

                </div>
            </div>
        <?php require 'footer.php'; ?>
    </body>
</html>