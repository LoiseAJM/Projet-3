<html>

    <head>
        <meta charset="utf-8">
        <title>Connexion</title>
        <link rel="stylesheet" href="style.css">
        <!--Favicon-->
        <link rel="icon" type="image" href="images/favicon-gbaf.png" />
    </head>

    <body> 
        <div class="container">
             <!--Appel du header-->
            <?php require 'header.php'; ?>
            
            <div class="formulaire">
                
                <form>
                <h1 id="connexion">
                    Connexion
                </h1>
                    <div>
                        <label for="identifiant"> Identifiant :</label>
                        <input type="text" name="nom" id="nom" placeholder="Votre identifiant" class="form_input">
                    </div>
                    
                    <div>
                        <label for="motdepasseconnexion">Mot de passe :</label>
                        <input type="password" name="motpdepasseconnexion" id="motdepasseconnexion" placeholder="Votre mot de passe" class="form_input">
                    </div>

                    <div>
                        <input type ="submit" value ="Envoyer"/>
                    </div>
                    <div class="lien_formulaire"><a href="inscription.php">Je n'ai pas encore de compte</a>
                    </div>
                </form>
            </div> 

            <!--Appel du footer-->
            <?php require 'footer.php' ; ?>
        <div>              
        </body>
</html>