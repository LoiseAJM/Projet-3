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
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {          
       $identifiant=htmlentities(trim($_POST['f_identifiant']));
       $motdepasseconnexion=htmlentities(trim($_POST['f_motdepasseconnexion']));
   
       //connexion avec la base de données
       $conn = new PDO("mysql:host=localhost; dbname=dev;", 'dev', 'devpass');
       $sql="SELECT * FROM `account` WHERE `username` = :username and `password` = :password";
       $statement = $conn->prepare($sql);
       $statement->bindParam('username', $identifiant);
       $statement->bindParam('password', $motdepasseconnexion);
       $statement->execute(); 
       $row = $statement->fetch() ;
    
           if($row['username'] == $identifiant)
           {
               require 'accueil_success.php';
              
           }else{
            require 'header.php';
            require 'connexion.php' ;
            echo "<div class='centered redbold'>Identifiant et/ou mot de passe incorrects<div>";
            require 'footer.php';
            
           }
    }  
   
        ?>

            <!--Appel du footer-->
           
        </div> 
    </body>
</html>