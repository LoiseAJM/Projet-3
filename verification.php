<?php session_start(); ?>
<html>
<head>
        <meta charset="utf-8">
        <title>Connexion</title>
        <link rel="stylesheet" href="style.css">
        <!--Favicon-->
        <link rel="icon" type="image" href="images/favicon-gbaf.png" />
    </head>    
<!--Utilisateur connecté-->
    <?php
      {
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
       { $identifiant=htmlentities(trim($_POST['f_identifiant']));
        $motdepasseconnexion=htmlentities(trim($_POST['f_motdepasseconnexion']));
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
       
           if(empty ($row['username']))
               {
               session_destroy();
               require 'header.php';
               require 'connexion.php' ;
               echo "<div class='centered redbold'>Identifiant inconnu<div>";
               require 'footer.php';
               }
           else 
               {
               if (password_verify($motdepasseconnexion, $password))
                   {
                    $_SESSION['prenomnom'] = $prenom . ' ' . $nom;
                    echo '<meta http-equiv="refresh" content="0;accueil_success.php">' ;
                    
                   }
                else
                   {   
                    require 'header.php';
                    require 'connexion.php' ;
                    echo "<div class='centered redbold'>Mot de passe incorrect<div>";
                    require 'footer.php';
                   } 

                }

            }
        }
    
      
       
        ?>

    </body>
</html>