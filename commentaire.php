<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Commentaire</title>
        <link rel="stylesheet" href="style.css">
        <!--Favicon-->
        <link rel="icon" type="image" href="images/favicon-gbaf.png" />

        
    </head>
    <body>
        <!--Appel du header-->
        <?php require 'header.php'; ?>
                <!--Formulaire-->
                <form id="formulaire_inscription" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
                    <h1 id="titre_formulaire">
                        Protectpeople
                    </h1>
                    <div>
                    <label for="avis">Votre avis sur ce partenaire : </label><br>
                    <input type="radio" name="avis" value="1">Positif
                    <input type="radio" name="avis" value="0">Négatif
                    </div>
                    
                    <div>
                        <label for="commentaire">Commentaire sur ce partenaire : </label>
                        <input id = "commentaire" type="text" name="commentaire" required="true" placeholder="Commentaire">
                        <span id = "commentaire_erreur"></span>
                    </div>
                
                    <div>
                        <input id = "submit" type="submit" value="Envoyer"/>
                    </div>
                
                </form>

        <?php
            //Stockage des données du formulaire dans des variables
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $commentaire=htmlentities(trim($_POST['commentaire']));
                $avis=htmlentities(($_POST['avis']));
                $account_id = $_SESSION['account_id'];
                $acteur_id = 1;
                $date = date('Y-m-d H:i:s');

                $connect = new PDO("mysql:host=localhost; dbname=dev;", 'dev', 'devpass');
                $sql1="SELECT * FROM `post` WHERE `user_id` = :account_id";
                $statement1=$connect->prepare($sql1);
                $statement1->bindParam('account_id', $account_id);
                $statement1->execute();
                $row = $statement1->fetch() ;



                if (empty ($row['user_id'])) // on vérifie que l'utilisateur n'a pas déjà donné son avis
                {
                    try 
                    {
                        $conn = new PDO("mysql:host=localhost; dbname=dev;", 'dev', 'devpass');
                        //Exception : Mode Erreur de PDO 
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "INSERT INTO `post`( `user_id`, `acteur_id`, `date_add`, `post`) 
                        VALUES ( :account_id, :acteur_id, :date, :commentaire  )";
                    
                    // use exec() because no results are returned
                        $statement=$conn->prepare($sql);
                        $statement->bindParam('account_id', $account_id);
                        $statement->bindParam('acteur_id', $acteur_id);
                        $statement->bindParam('date', $date);
                        $statement->bindParam('commentaire', $commentaire);
                        $statement->execute();

                        $conn2 = new PDO("mysql:host=localhost; dbname=dev;", 'dev', 'devpass');
                        //Exception : Mode Erreur de PDO 
                        $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "INSERT INTO `vote`( `user_id`, `acteur_id`, `vote`) 
                        VALUES ( :account_id, :acteur_id, :avis )";
                    
                    // use exec() because no results are returned
                        $statement=$conn->prepare($sql);
                        $statement->bindParam('account_id', $account_id);
                        $statement->bindParam('acteur_id', $acteur_id);
                        $statement->bindParam('avis', $avis);
                        $statement->execute();
            
                    } 
                    catch(PDOException $e) 
                    {
                        echo $sql . "<br>" . $e->getMessage();
                    }
                    $conn = null;
                }
                else
                {
                    echo "<meta http-equiv='refresh' content='0;redirection_identifiant_existe.php'>";
                }
            }
            

        ?>

<?php require "footer.php"?>
<script type="text/javascript" src="monscript.js"></script>
    </body>
</html>