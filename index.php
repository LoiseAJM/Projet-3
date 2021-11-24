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
            
            <div class="formulaire">
                
           <!-- <form method="post" action="<?php //echo htmlspecialchars($_SERVER["accueil.php"]);?>"> -->
           <form method="post" action="<?php echo htmlspecialchars("accueil.php");?>"> 

                <h1 id="connexion">
                    Connexion
                </h1>
                    <div>
                        <label for="f_identifiant"> Identifiant :</label>
                        <input type="text" name="f_identifiant" placeholder="Votre identifiant">
                    </div>
                    
                    <div>
                        <label for="f_motdepasseconnexion">Mot de passe :</label>
                        <input type="password" name="f_motdepasseconnexion"placeholder="Votre mot de passe">
                    </div>

                    <div>
                        <input type ="submit" value ="Envoyer"/>
                    </div>
                    <div class="lien_formulaire"><a href="inscription.php">Je n'ai pas encore de compte</a>
                    <div class="lien_formulaire"><a href="#">Je n'arrive pas à me connecter</a>
                    </div>
                </form>
            </div> 
            

            <!--Appel du footer-->
            <?php require 'footer.php' ; ?>            
        </body>

        
       
</html>