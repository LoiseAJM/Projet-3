<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Présentation de la GBAF</title>
    <link rel="stylesheet" href="css/style.css">
    <!--Favicon-->
    <link rel="icon" type="image/png" href="images/favicon-gbaf.png" />
</head>

<body>
    <!-- L'utilisateur n'est pas connecté  -->
    <?php
    if (empty($_SESSION['prenomnom'])) {
        header('Location: index.php');
    } ?>

    <!-- L'utilisateur est connecté  -->
    <?php require '_header.php'; ?>
    <main>
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
                    <img alt="illustration image accueil" class="centered image_accueil" src="images/illustration.jpg">
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
                    <?php
                    /* Taille de la description limitée à 150 caractères */
                    $acteur_description = substr($row['acteur_description'], 0, 150) . "...";
                    $acteur_description_encode = utf8_encode($acteur_description);
                    $acteur_id = $row['acteur_id'];
                    $url_acteur = 'presentation_acteur.php?id=' . $acteur_id;

                    ?>
                    <div class="acteur">
                        <div class="acteur_logo">
                            <img alt="logo_acteur" class="image_logo" src=<?php echo $row['acteur_logo']; ?>>
                        </div>

                        <div class="acteur_corps">
                            <div class="acteur_titre">
                                <h3><?php echo htmlspecialchars($row['acteur_name']); ?></h3>
                            </div>
                            <div class="acteur_description">
                                <?php echo $acteur_description_encode; ?>
                            </div>
                        </div>
                        <div class="acteur_button div_centered">
                            <a class="acteur_button_click" href="<?php echo $url_acteur; ?>">Lire la suite</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </main>
    <?php require '_footer.php'; ?>

</html>