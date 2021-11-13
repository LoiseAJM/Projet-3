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
                            <label for="Identifiant"> Identifiant :</label>
                            <input type="text" name="nom" id="nom" placeholder="Votre nom" class="form_input">
                        </div>
                        
                        <div>
                            <label for="prenom">Mot de passe :</label>
                            <input type="text" name="prenom" id="prenom" placeholder="Votre prénom" class="form_input">
                        </div>

                        <div>
                            <button class="submit">Envoyer
                            </button>
                        </div>
                    </form>
                </div>  
                <div>
                <a href="connexion.php"><button type="button">Je n'ai pas de compte</button></a>

                </div>
            </div>
        <?php require 'footer.php'; ?>
    </body>
</html>