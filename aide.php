<html>


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Problème de connexion/title>
        <link rel="stylesheet" href="css/style.css">
        <!--Favicon-->
        <link rel="icon" type="image" href="images/favicon-gbaf.png" />
    </head>

    <body>
    <?php    
   if(!empty ($_SESSION['prenomnom'])) //l'utilisateur est pas connecté
               {
          header('Location: accueil_success.php');
               }
               ?>

             <!--Appel du header-->
            <?php require '_header.php'; ?>
            
            <div class="formulaire">
                
                <form>
                <h1 id="connexion">
                    Comment pouvons-nous vous aider ?
                </h1>
                
                    <div class="centered"><a href="inscription.php">Je n'ai pas encore de compte</a>
                    <div class="centered"><a href="#">Je n'arrive pas à me connecter</a>
                    </div>
                </form>
            </div> 
            

            <!--Appel du footer-->
            <?php require '_footer.php' ; ?>            
        </body>

</html>