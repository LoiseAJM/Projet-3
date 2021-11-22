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
            <div class="conteneur">
                <div class="formulaire">
                    <h1>
                        Créer un compte
                    </h1>
                    
                    <!--<form action="/connexion.php" method="post">-->
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

                        <div>
                            <label for="nom">Nom : </label>
                            <input type="text" name="nom" placeholder="Votre nom" class="form_input">
                        </div>
                        
                        <div>
                            <label for="prenom">Prénom :</label>
                            <input type="text" name="prenom" placeholder="Votre prénom" class="form_input">
                        </div>
                        <div >
                            <label for="username">Identifiant :</label>
                            <input type="text" name="username"  placeholder="Username" class="form_input">
                        </div>
                        <div>
                            <label for="password">Mot de passe :</label>
                            <input type="password" name="password"  placeholder="Mot de passe" class="form_input">
                        </div>
                        <div >
                            <label for="questionsecrete">Question secrète :</label>
                            <input type="text" name="questionsecrete" placeholder="Question secrète" class="form_input">
                        </div>
                        <div >
                            <label for="reponse">Réponse :</label>
                            <input type="text" name="reponse" placeholder="Réponse" class="form_input">
                        </div>
                        <div>
                            <input type="submit" value="Envoyer"/>
                    
                        </div>
                    </form>
                </div>
            </div>

            <?php

//if(isset($_POST["submit"])) 
if ($_SERVER["REQUEST_METHOD"] == "POST")
{                   $username=htmlentities(trim($_POST['username']));
                    $nom=htmlentities(($_POST['nom']));
                    $prenom=htmlentities($_POST['prenom']);
                    $password=htmlentities($_POST['password']);
                    $questionsecrete=htmlentities($_POST['questionsecrete']);
                    $reponse=htmlentities($_POST['reponse']);
    

try {
  $conn = new PDO("mysql:host=localhost; dbname=dev;", 'dev', 'devpass');
  //Exception : Mode Erreur de PDO 
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO `account`( `last_name`, `first_name`, `username`, `password`, `question`, `answer`) 
  VALUES ( :nom, :prenom, :username, :password, :questionsecrete, :reponse )";
  // use exec() because no results are returned
  $statement=$conn->prepare($sql);
  $statement->bindParam('nom', $nom);
  $statement->bindParam('prenom', $prenom);
  $statement->bindParam('password', $password);
  $statement->bindParam('questionsecrete', $questionsecrete);
  $statement->bindParam('reponse', $reponse);
  $statement->bindParam('username', $username);
  $statement->execute();
  echo "Inscription réalisée avec succès";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
}
?>
            <?php 
/*            


                    if($username && $nom && $prenom && $motdepasse && $questionsecrete && $reponse)
                        {
                        $connect = mysql_connect('localhost', 'root','') or die ("Impossible de se connecter à la base de données");
                        mysql_select_db('extranet');
                        $query =mysql_query("INSERT INTO account VALUES ('','$nom','$prenom','$username','$password','$questionsecrete','$reponse')
                        die ("Inscription terminée <a href="index.php" Vous pouvez vous connecter</a> ) 

                        }
                    else echo "Veuillez saisir tous les champs";
                }
  */      ?>

        <?php require 'footer.php'; ?>
    </body>
</html>