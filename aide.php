<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Problème de connexion/title>
        <link rel="stylesheet" href="css/style.css">
        <!--Favicon-->
        <link rel="icon" type="image" href="images/favicon-gbaf.png" />
    </head>

    <!-- Si l'utilisateur est connecté -->
    <?php    
   if(isset ($_SESSION['prenomnom'])){
    header('Location: accueil_success.php');
    }
    ?>  

    <body>
        <!-- Appel du header -->
        <?php require '_header.php'; ?>

        <!-- Formulaire -->
        <form class="form_style">
            <h1 id="connexion">
                Comment pouvons-nous vous aider ?
            </h1>
            <div class="centered"><a href="inscription.php">Je n'ai pas encore de compte</a></div>
            <div class="centered"><a href="#">Je n'arrive pas à me connecter</a></div>
        </form>

        <!--Appel du footer-->
        <?php require '_footer.php' ; ?>            
    </body>

</html>