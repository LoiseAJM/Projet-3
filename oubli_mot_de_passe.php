<?php session_start(); ?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Oubli de mot de pase</title>
    <link rel="stylesheet" href="css/style.css">
    <!--Favicon-->
    <link rel="icon" type="image" href="images/favicon-gbaf.png" />
</head>
 <!-- Si l'utilisateur est connecté  -->
 <?php
        if(isset ($_SESSION['prenomnom'])){
            header('Location: accueil_success.php');
            }
    ?>
    <body>
        <?php require '_header.php'; ?>
        <!--Clos la session ouverte dans le header-->
        <?php session_destroy(); ?>
        <form class="form_style" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"> 
            <h1>
                J'ai oublié mon mot de passe
            </h1>
            <div>
                <label for="f_identifiant"> Identifiant :</label>
                <input type="text" name="f_identifiant" placeholder="Votre identifiant">
                <input type="submit" value="Envoyer"/>
            </div>
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
        {          
            $identifiant=htmlentities(trim($_POST['f_identifiant']));

            //connexion avec la base de données
            $conn = new PDO("mysql:host=localhost; dbname=dev;", 'dev', 'devpass');
            $sql="SELECT * FROM `account` WHERE `username` = :username ;";
            $statement = $conn->prepare($sql);
            $statement->bindParam('username', $identifiant);
            $statement->execute(); 
            $row = $statement->fetch() ;

            if($row['username'] == $identifiant)
            {  
                $questionsecrete = $row['question'];
                $reponsesecrete = $row['answer'];
                $motdepasse = $row['password'];
                $account_id= $row['account_id'];
                session_start(); //nouvelle session pour stocker les infos suivantes
                $_SESSION['questionsecrete'] =$questionsecrete ;
                $_SESSION['reponsesecrete'] =$reponsesecrete ;
                $_SESSION['password'] =$motdepasse ;
                $_SESSION['account_id']=$account_id ;

                echo '<meta http-equiv="refresh" content="0;formulaire_question_secrete.php">';

            }else{
            echo "<div class='centered'>Désolé, cet identifiant n'existe pas. <br>Souhaitez-vous <a href='inscription.php'>créer un compte ?</a> </div>";
            
            
            }
        } ?>
        <?php require '_footer.php'; ?>
    </body>
</html>