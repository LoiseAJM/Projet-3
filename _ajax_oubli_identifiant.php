
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ajax Oubli d'identifiant</title>
</head>


    <body>

        <?php //session_destroy(); ?>
        <?php
   // if ($_SERVER["REQUEST_METHOD"] == "GET")
       // {       
            

        $r_nom=htmlentities(trim($_GET['r_nom']));
        $r_prenom=htmlentities(trim($_GET['r_prenom']));

        //connexion avec la base de données
        $conn = new PDO("mysql:host=localhost; dbname=dev;", 'dev', 'devpass');
        $sql="SELECT `username` FROM `account` WHERE `last_name` = :nom AND `first_name` = :prenom ;";
        $statement = $conn->prepare($sql);
        $statement->bindParam('prenom', $r_prenom);
        $statement->bindParam('nom', $r_nom);
        $statement->execute(); 
        $row = $statement->fetch() ;

        if($row['username'] == NULL)
            {  echo("erreur username");

            }
        else
            {  echo($row['username']);
            }
       // }
         ?>
        

    </body>
</html>