<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Présentation acteur</title>
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

            <!-- Partie description de l'acteur -->
            <div class= "boxed_80">    
                <!-- Logo de l'acteur -->
                <div class="centered bottom_space">           
                    <img class="image_logo" src=<?php echo $acteur_logo ?>></img>
                </div>
                <!-- Nom de l'acteur  -->
                <h2 class="bottom_space"> 
                    <?php echo $acteur_name ?> 
                </h2>
                <!-- Description de l'acteur -->
                <?php echo $acteur_description_encode ?>
            </div>

            <!-- Partie commentaires -->
            <div class= "boxed_80"> 
                <?php 
                $sql1="SELECT COUNT(*) AS `somme_votepositif` FROM `vote` WHERE `acteur_id` = :acteur_id AND `vote` = '1'  ";
                $sql2="SELECT COUNT(*) AS `somme_votenegatif` FROM `vote` WHERE `acteur_id` = :acteur_id AND `vote` = '-1'  ";
                $statement1=$conn->prepare($sql1);
                $statement2=$conn->prepare($sql2);
                $statement1->bindParam('acteur_id', $acteur_id);
                $statement1->execute();
                $row3 = $statement1->fetch() ;
                $statement2->bindParam('acteur_id', $acteur_id);
                $statement2->execute();
                $row2 = $statement2->fetch() ;
                $somme_votepositif = $row3['somme_votepositif'];
                $somme_votenegatif = $row2['somme_votenegatif'];
                $sqlrequest="SELECT post.post, post.acteur_id, post.user_id, post.date_add, account.account_id, account.username FROM `post` INNER JOIN account ON post.user_id=account.account_id 
                WHERE `acteur_id` = :acteur_id
                ";
                $stat = $conn->prepare($sqlrequest);
                $stat->bindParam('acteur_id',$acteur_id);
                $stat->execute(); 
                
                ?>

                <div class="bottom_space">
                        <h3>Commentaires</h3>
                        <div class = "aligne_a_droite">
                            <button>
                                <?php echo $somme_votepositif ?> 👍
                                <?php echo " "?><?php echo $somme_votenegatif ?> 👎 
                            </button>
                            <button>
                                Nouveau commentaire
                            </button>
                        </div>
                </div>

                <div>
                    <div class ="acteur_description">
                        <?php while ( $row4 = $stat->fetch(PDO::FETCH_ASSOC))  :
                        $post = $row4['post'] ;
                        $date = $row4['date_add'];
                        $username = $row4['username']; ?>
                        
                            <div class="bold">
                                <?php echo $date;  ?>   
                            </div>
                            <div > 
                                <?php echo $username; ?>
                            </div>
                            <div class="bottom_space italique">
                                <?php echo $post; ?>
                            </div>
                            <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php require 'footer.php'; ?>
    </body>
</html>