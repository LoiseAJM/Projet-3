<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Commentaire acteurs</title>
    <link rel="stylesheet" href="css/style.css">
    <!--Favicon-->
    <link rel="icon"   href="images/favicon-gbaf.png" />


</head>
<!-- L'utilisateur n'est pas connecté  -->
<?php
if (empty($_SESSION['prenomnom'])) {
    session_destroy();
} ?>

<body>

    <!--Appel du header-->
    <?php require '_header.php'; ?>

    <!--On récupère l'ID de l'acteur dans l'URL-->
    <?php $acteur_id = $_GET['id']; ?>

    <!-- Connexion à la BDD pour récupérer les infos acteur-->
    <?php
    $conn = new PDO("mysql:host=localhost; dbname=dev;", 'dev', 'devpass');
    $sql = "SELECT * FROM `acteur` WHERE `acteur_id` = :acteur_id";
    $statement = $conn->prepare($sql);
    $statement->bindParam('acteur_id', $acteur_id);
    $statement->execute();
    $row = $statement->fetch();
    $acteur_name = $row['acteur_name'];
    $acteur_logo = $row['acteur_logo'];
    ?>

    <!--Formulaire-->
    <form class="form_style" method="post">
        <h1 id="titre_formulaire">
            <?php echo $acteur_name ?>
        </h1>

        <div>
            <label>Commentaire sur ce partenaire : </label>
            <input id="commentaire" type="text" name="commentaire" required placeholder="Commentaire">
            <span id="commentaire_erreur"></span>
        </div>

        <div>
            <input id="submit" type="submit" value="Envoyer" />
        </div>

    </form>

    <?php
    //Stockage des données du formulaire dans des variables
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $commentaire = htmlentities(trim($_POST['commentaire']));
        $account_id = $_SESSION['account_id'];
        $date = date('Y-m-d H:i:s');

        $connexion = new PDO("mysql:host=localhost; dbname=dev;", 'dev', 'devpass');
        $sql1 = "SELECT * FROM `post` WHERE `user_id` = :account_id AND `acteur_id` = :acteur_id";
        $statement1 = $connexion->prepare($sql1);
        $statement1->bindParam('account_id', $account_id);
        $statement1->bindParam('acteur_id', $acteur_id);
        $statement1->execute();
        $row = $statement1->fetch();



        if (empty($row['user_id'])) // on vérifie que l'utilisateur n'a pas déjà donné son avis
        {
            try {
                //Exception : Mode Erreur de PDO 
                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql3 = "INSERT INTO `post`( `user_id`, `acteur_id`, `date_add`, `post`) 
                        VALUES ( :account_id, :acteur_id, :date, :commentaire  )";

                
                $statement = $connexion->prepare($sql3);
                $statement->bindParam('account_id', $account_id);
                $statement->bindParam('acteur_id', $acteur_id);
                $statement->bindParam('date', $date);
                $statement->bindParam('commentaire', $commentaire);
                $statement->execute();

                echo "<meta http-equiv='refresh' content='0;redirection_merci.php'>";
            } catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
            $connexion = null;
        } else {
            echo "<meta http-equiv='refresh' content='0;redirection_avis_deja_donne.php'>";
        }
    }


    ?>

    <?php require "_footer.php" ?>
    <script  src="js/monscript.js"></script>
</body>

</html>