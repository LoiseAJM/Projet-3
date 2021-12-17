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
    <?php require 'header.php'; ?>
    <div class="page">

 <!--On récupère l'ID de l'acteur dans l'URL-->
<?php 
    $acteur_id= $_GET['id'];
    $url_commentaire_acteur='\'commentaire_acteur.php?id=' . $acteur_id . '\'';
?>
<!-- Connexion à la BDD pour récupérer les infos acteur-->
<?php
		$conn = new PDO("mysql:host=localhost; dbname=dev;", 'dev', 'devpass');
        $sql="SELECT * FROM `acteur` WHERE `acteur_id` = :acteur_id";
        $statement = $conn->prepare($sql);
        $statement->bindParam('acteur_id', $acteur_id);
        $statement->execute(); 
        $row = $statement->fetch() ;
        $acteur_name = $row['acteur_name'] ;
        $acteur_description = $row['acteur_description'];
        $acteur_description_encode = utf8_encode($acteur_description);
        $acteur_logo = $row['acteur_logo'];
        
	?>
        <div class= "boxed_80">    
            
            <div class="centered bottom_space">           
            <img class="image_logo" src=<?php echo $acteur_logo ?> width="20%"></img>
            </div>
            <h2 class="bottom_space"> <?php echo $acteur_name ?> </h2>
            <?php echo $acteur_description_encode ?>
        </div>

        <div class= "boxed_80"> 
          <?php $connect = new PDO("mysql:host=localhost; dbname=dev;", 'dev', 'devpass');
          $connect = new PDO("mysql:host=localhost; dbname=dev;", 'dev', 'devpass');
          $sql1="SELECT SUM(`vote`) AS `somme_votepositif` FROM `vote` WHERE `acteur_id` = :acteur_id AND `vote` = '1'  ";
          $sql2="SELECT SUM(`vote`) AS `somme_votenegatif` FROM `vote` WHERE `acteur_id` = :acteur_id AND `vote` = '-1'  ";
          $statement1=$connect->prepare($sql1);
          $statement2=$connect->prepare($sql2);
          $statement1->bindParam('acteur_id', $acteur_id);
          $statement1->execute();
          $row3 = $statement1->fetch() ;
          $statement2->bindParam('acteur_id', $acteur_id);
          $statement2->execute();
          $row2 = $statement2->fetch() ;


                $somme_votepositif = $row3['somme_votepositif'];
                $somme_votenegatif = -$row2['somme_votenegatif'];
                
                ?>
                
                 
                <div class ="acteur">
                    <div class ="acteur_logo">

                        <div class="compteur_vote"> 
                            <div class="bottom_space"><?php echo $somme_votepositif ?> <img class="image_logo" src="images/pouce_haut" width="25%"></img></div>
                            <div><?php echo $somme_votenegatif ?> <img class="image_logo" src="images/pouce_bas" width="25%"></img> </div>
                        </div>
                       
                    </div>

                    <div class = "acteur_corps">
                        <div class ="acteur_titre">
                            <h3><?php echo htmlspecialchars($row['acteur_name']); ?></h3>
                        </div>
                        <div class ="acteur_description">
                            <?php echo $acteur_description_encode; ?> 
                         </div>
                    </div>
                    <div class ="acteur_button">
                        <button class ="acteur_button_click" onclick="window.location.href=<?php echo $url_commentaire_acteur?>">Je donne mon avis</button>
                    </div>
                </div>
           
                

        </div>

    </div>
<?php require 'footer.php'; ?>
    </body>

        
       
</html>