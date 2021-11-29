<?php session_start(); ?>
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
            <div class="container">
                
                    <!--<form action="/connexion.php" method="post">-->
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
                        <h1>
                            Créer un compte
                        </h1>
                        <div>
                            <label for="f_nom">Nom : </label>
                            <input type="text" name="f_nom" placeholder="Votre nom">
                        </div>
                        
                        <div>
                            <label for="f_prenom">Prénom :</label>
                            <input type="text" name="f_prenom" placeholder="Votre prénom">
                        </div>
                        <div >
                            <label for="f_username">Identifiant :</label>
                            <input type="text" name="f_username"  placeholder="Votre identifiant">
                        </div>
                        <div>
                            <label for="f_password">Mot de passe :</label>
                            <input type="password" name="f_password"  placeholder="Mot de passe">
                        </div>
                        <div >
                            <label for="f_questionsecrete">Question secrète :</label>
                            <input type="text" name="f_questionsecrete" placeholder="Question secrète">
                        </div>
                        <div >
                            <label for="f_reponse">Réponse :</label>
                            <input type="text" name="f_reponse" placeholder="Réponse" >
                        </div>
                        <div>
                            <input type="submit" value="Envoyer"/>
                    
                        </div>
                    </form>
                </div>


            <?php


if ($_SERVER["REQUEST_METHOD"] == "POST")
{                   $username=htmlentities(trim($_POST['f_username']));
                    $nom=htmlentities(($_POST['f_nom']));
                    $prenom=htmlentities($_POST['f_prenom']);
                    $password=htmlentities($_POST['f_password']);
                    $questionsecrete=htmlentities($_POST['f_questionsecrete']);
                    $reponse=htmlentities($_POST['f_reponse']);

if (    ($username != NULL ) 
    and ($nom != NULL ) 
    and ($prenom != NULL ) 
    and ($password != NULL ) 
    and ($questionsecrete != NULL ) 
    and ($reponse != NULL ) ) //vérifie qu'aucun champ n'est vide

    {
    //try, catch = gestion des erreurs, execution en bloc complet uniquement
    try {
        $conn = new PDO("mysql:host=localhost; dbname=dev;", 'dev', 'devpass');
        //Exception : Mode Erreur de PDO 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO `account`( `last_name`, `first_name`, `username`, `password`, `question`, `answer`) 
        VALUES ( :att_nom, :att_prenom, :att_username, :att_password, :att_questionsecrete, :att_reponse )";
     
    // use exec() because no results are returned
        $statement=$conn->prepare($sql);
        $statement->bindParam('att_nom', $nom);
        $statement->bindParam('att_prenom', $prenom);
        $statement->bindParam('att_password', $password);
        $statement->bindParam('att_questionsecrete', $questionsecrete);
        $statement->bindParam('att_reponse', $reponse);
        $statement->bindParam('att_username', $username);
        $statement->execute();
        echo "<meta http-equiv='refresh' content='0;redirection_inscription_reussie.php'>";
        } 
    catch(PDOException $e) 
        {
        echo $sql . "<br>" . $e->getMessage();
        }
    $conn = null;
    }
else {echo "<div class='centered redbold'>Les champs ne doivent pas être nuls.<div>";}
}


?>

<?php require 'footer.php'; ?>
    </body>
</html>