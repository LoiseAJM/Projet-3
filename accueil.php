<!--Utilisateur connecté-->
<html>
    <head>
        <meta charset="utf-8">
        <title>GBAF</title>
        <link rel="stylesheet" href="style.css">
        <!--Favicon-->
        <link rel="icon" type="image" href="images/favicon-gbaf.png" />

    </head>
    <body>   
        <!--Appel du header-->
         <?php require 'header.php'; ?>

        <div class="container">
       

            <!--Section présentation -->
            <section id="presentation">
                <h1>Le GBAF</h1>
                <p>Le <strong> Groupement Banque Assurance Français (GBAF) </strong> est une fédération représentant 
                    les 6 grands groupes français : BNP Paribas, BPCE, Crédit Agricole, Crédit Mutuel-CIC, Société Générale
                     et La Banque Postale.</p>
                <p>Le GBAF est le représentant de la profession bancaire et des assureurs sur tous
                    les axes de la réglementation financière française. Sa mission est de promouvoir
                    l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des
                    pouvoirs publics.
                    </p>

            </section>

            <!--Section acteurs-->
            <section id="acteurs">Section acteurs </section>
         
 
    //connexion avec la base de données

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
               echo ("Login réussi");
              
           }else{
               echo ("Erreur de login");
           }
    }  
   
        ?>

            <!--Appel du footer-->
           
        </div> 
         <?php require 'footer.php'; ?>
    </body>
</html>