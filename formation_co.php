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
        <div class= "boxed_80">    
            
            <div class="centered bottom_space">           
            <img class="image_logo" src="images/formation_co.png" width="20%"></img>
            </div>
            <h2 class="bottom_space"> Formation&Co</h2>
            <p><strong>Formation&co</strong> est une association française présente sur tout le territoire.<p><br>
            <p>Nous proposons à des personnes issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé.</p><br>
            <p>Notre proposition : 
            <ul> 
                <li>un financement jusqu’à 30 000€ ;</li>
                <li>un suivi personnalisé et gratuit ;</li>
                <li>une lutte acharnée contre les freins sociétaux et les stéréotypes.</li>
            </ul><br></p>
            <p>Le financement est possible, peu importe le métier : coiffeur, banquier, éleveur de chèvres… . Nous collaborons avec des personnes talentueuses et motivées.
            Vous n’avez pas de diplômes ? Ce n’est pas un problème pour nous ! Nos financements s’adressent à tous.</p>
        </div>

        <div class= "boxed_80"> 
          <?php $connect = new PDO("mysql:host=localhost; dbname=dev;", 'dev', 'devpass');
                $sql1="SELECT SUM(`votepositif`) AS `somme_votepositif` FROM `vote`";
                $sql2="SELECT SUM(`votenegatif`) AS `somme_votenegatif` FROM `vote`";
                $statement1=$connect->prepare($sql1);
                $statement1->execute();
                $row = $statement1->fetch() ;
                $statement2=$connect->prepare($sql2);
                $statement2->execute();
                $row2 = $statement2->fetch() ;

                $somme_votepositif = $row['somme_votepositif'];
                $somme_votenegatif = $row2['somme_votenegatif'];
                ?>
                 <button class="button_click" onclick='window.location.href="commentaire_formation_co.php"'>Je donne mon avis</button>
                <div>
                    Le nombre de votes positifs est : <?php echo $somme_votepositif ?></div>
                <div>
                    Le nombre de votes négatifs est : <?php echo $somme_votepositif ?></div>
           
                

        </div>

    </div>
<?php require 'footer.php'; ?>
    </body>

        
       
</html>