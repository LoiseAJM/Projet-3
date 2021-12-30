<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ajax connexion</title>
</head>
<?php session_start(); ?>

    <body>

        <?php
  
  $identifiant=htmlentities(trim($_GET['f_identifiant']));
  $motdepasseconnexion=htmlentities(trim($_GET['f_motdepasseconnexion']));
 //connexion avec la base de données
    //connexion avec la base de données
 $conn = new PDO("mysql:host=localhost; dbname=dev;", 'dev', 'devpass');
 $sql="SELECT * FROM `account` WHERE `username` = :username";
 $statement = $conn->prepare($sql);
 $statement->bindParam('username', $identifiant);
 $statement->execute(); 
 $row = $statement->fetch() ;
 $password = $row['password'] ;
 $nom = $row['last_name'];
 $prenom = $row['first_name'];
 $account_id= $row['account_id'];

        if($row['username'] == NULL)
            {  echo("Nom d'utilisateur inconnu");

            }
        if (password_verify($motdepasseconnexion, $password)) //si le mot de passe est correct
        {   
            $_SESSION['prenomnom'] = $prenom . ' ' . $nom;
            $_SESSION['account_id'] =  $account_id;
            $_SESSION['username'] = $username;
            echo("Mot de passe correct")          
        }
        else
            {  echo("Mot de passe erroné");
            }
         ?>
        

    </body>
</html>