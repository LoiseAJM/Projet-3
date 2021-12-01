<html>
    <head>
        <meta charset="utf-8">
        <title>GBAF</title>
        <link rel="stylesheet" href="style.css">
        <!--Favicon-->
        <link rel="icon" type="image" href="images/favicon-gbaf.png" />
    </head>
    <body>
        <?php require 'header.php'; ?>
        <!--Clos la session ouverte dans le header-->
        <?php session_destroy(); ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"> 
            <h1>
                J'ai oublié mon identifiant
            </h1>
            <div>
                <label for="prenom"> Prénom :</label>
                <input type="text" name="prenom" placeholder="Prénom">
                <label for="nom"> Nom de famille :</label>
                <input type="text" name="nom" placeholder="Nom">
                <input type="submit" value="Envoyer"/>
            </div>
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
        {          
        $nom=htmlentities(trim($_POST['nom']));
        $prenom=htmlentities(trim($_POST['prenom']));

        //connexion avec la base de données
        $conn = new PDO("mysql:host=localhost; dbname=dev;", 'dev', 'devpass');
        $sql="SELECT * FROM `account` WHERE `last_name` = :nom AND `first_name` = :prenom ;";
        $statement = $conn->prepare($sql);
        $statement->bindParam('prenom', $prenom);
        $statement->bindParam('nom', $nom);
        $statement->execute(); 
        $row = $statement->fetch() ;

        if($row['username'] == NULL)
            {  
            echo "<div class='centered redbold'>Désolé, il n'existe pas de compte à ce nom.</div> 
            <div class ='centered' > Souhaitez-vous <a href='inscription.php'>créer un compte ?</a> </div>
            <br><div class ='centered' ><a href='index.php'>Revenir à l'accueil</a> </div>";
            }
        else
            { 
            session_start();
            $_SESSION['identifiant'] = $row['username'];
            echo '<meta http-equiv="refresh" content="0;redirection_recuperation_identifiant.php">' ;
            }
        } ?>
        <?php require 'footer.php'; ?>
    </body>
</html>