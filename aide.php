<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Problème de connexion/title>
        <link rel="stylesheet" href="style.css">
        <!--Favicon-->
        <link rel="icon" type="image" href="images/favicon-gbaf.png" />
    </head>

    <body> 
             <!--Appel du header-->
            <?php require 'header.php'; ?>
            
            <div class="formulaire">
                
                <form>
                <h1 id="connexion">
                    Comment pouvons-nous vous aider ?
                </h1>
                    <div>
                        <input type="button" value = "J'ai oublié mon mot de passe">
                    </div>
                    
                    <div>
                        <label for="f_motdepasseconnexion">Mot de passe :</label>
                        <input type="password" name="f_motdepasseconnexion"placeholder="Votre mot de passe">
                    </div>

                    <div>
                        <input type ="submit" value ="Envoyer"/>
                    </div>
                    <div class="centered"><a href="inscription.php">Je n'ai pas encore de compte</a>
                    <div class="centered"><a href="#">Je n'arrive pas à me connecter</a>
                    </div>
                </form>
            </div> 
            

            <!--Appel du footer-->
            <?php require 'footer.php' ; ?>            
        </body>

</html>