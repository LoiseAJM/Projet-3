<?php session_start(); ?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Présentation de la GBAF</title>
    <link rel="stylesheet" href="css/style.css">
    <!--Favicon-->
    <link rel="icon" type="image" href="images/favicon-gbaf.png" />
</head>

<body>
    <!-- L'utilisateur n'est pas connecté  -->
    <?php
    if (empty($_SESSION['prenomnom'])) {
        header('Location: index.php');
    } ?>

    <!-- L'utilisateur est connecté  -->
    <?php require '_header.php'; ?>

    <div class="page">
        <!--Section présentation -->
        <div class="boxed_wide">
            <h1 class="centered bottom-space">Le GBAF</h1>

            <p class="bottom_space">Le <strong> Groupement Banque Assurance Français (GBAF) </strong> est une fédération représentant
                les 6 grands groupes français : BNP Paribas, BPCE, Crédit Agricole, Crédit Mutuel-CIC, Société Générale
                et La Banque Postale.</p>
            <p class="bottom_space">Le GBAF est le représentant de la profession bancaire et des assureurs sur tous
                les axes de la réglementation financière française. Sa mission est de promouvoir
                l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des
                pouvoirs publics.
            </p>
            <div class="centered">
                <img class="centered" src="images/illustration.jpg" style="height:30%; max-width:80%"></img>
            </div>

        </div>



        <!--Section acteurs-->

        <?php
        $connect = new PDO("mysql:host=localhost; dbname=dev;", 'dev', 'devpass');
        $sql1 = "SELECT * FROM `acteur`";
        $statement1 = $connect->prepare($sql1);
        $statement1->execute();
        ?>



        <div class="boxed_wide">
            <?php while ($row = $statement1->fetch(PDO::FETCH_ASSOC)) :;
            ?>
                <?php $acteur_description = substr($row['acteur_description'], 0, 150) . "...";
                $acteur_description_encode = utf8_encode($acteur_description);
                $acteur_id = $row['acteur_id'];
                $url_acteur = 'presentation_acteur.php?id=' . $acteur_id;

                ?>
                <div class="acteur">
                    <div class="acteur_logo">
                        <img class="image_logo" src=<?php echo $row['acteur_logo']; ?>></img>
                    </div>

                    <div class="acteur_corps">
                        <div class="acteur_titre">
                            <h3><?php echo htmlspecialchars($row['acteur_name']); ?></h3>
                        </div>
                        <div class="acteur_description">
                            <?php echo $acteur_description_encode; ?>
                        </div>
                    </div>
                    <div class="acteur_button">
                        <a class="acteur_button_click" href="<?php echo $url_acteur; ?>">Lire la suite</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
        <?php require '_footer.php'; ?>

</html>