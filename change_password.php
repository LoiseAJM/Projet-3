<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Changement de mot de passe</title>
    <link rel="stylesheet" href="css/style.css">
    <!--Favicon-->
    <link rel="icon"   href="images/favicon-gbaf.png" />
</head>

<!-- Si l'utilisateur est connecté -->
<?php
if (isset($_SESSION['prenomnom'])) {
    header('Location: accueil_success.php');
} ?>

<body>

    <!-- L'utilisateur n'est pas connecté -->

    <?php require '_header.php'; ?>

    <!--Formulaire d'oubli de mot de passe -->
    <form class="form_style" id="change_password" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <h1>
            Changer le mot de passe
        </h1>
        <br>
        <div>
            <label for="newpassword"> Nouveau mot de passe : </label>
            <input type="password" name="newpassword" placeholder="Nouveau mot de passe">
            <label for="newpassword_confirm"> Confirmer le mot de passe : </label>
            <input type="password" name="newpassword_confirm" placeholder="Confirmer le mot de passe">
            <input type="submit" value="Envoyer" />
        </div>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newpassword = htmlentities(trim($_POST['newpassword']));
        $newpassword_confirm = htmlentities(trim($_POST['newpassword_confirm']));
        $identifiant = $_SESSION['account_id'];

        //Vérification que les mots de passe sont identiques
        if ($newpassword == $newpassword_confirm)
            //Vérification que le mot de passe est sécurisé
            if (strlen($newpassword) > 7) { //Remplacement du mot de passe dans la DB
                {
                    try {
                        $conn = new PDO("mysql:host=localhost; dbname=dev;", 'dev', 'devpass');
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "UPDATE `account` SET `password`= :newpassword WHERE `account_id`= :identifiant  ";
                        $newpasswordsecure = password_hash($newpassword, PASSWORD_DEFAULT);
                        $statement = $conn->prepare($sql);
                        $statement->bindParam('newpassword', $newpasswordsecure);
                        $statement->bindParam('identifiant', $identifiant);
                        $statement->execute();

                        //Confirmation 
                        echo "<div class='centered'> Mot de passe changé avec succès, vous allez être redirigé vers la page de connexion. <br>
                            <a href='index.php'>Si la redirection ne fonctionne pas, cliquez ici </a></div>";

                        //Sortie de la session et redirection vers la page de connexion
                        session_destroy();
                        echo '<meta http-equiv="refresh" content="5;index.php">';
                    } catch (PDOException $e) {
                        echo $sql . "<br>" . $e->getMessage();
                    }
                }
            } else {
                echo "<div class='centered redbold'>Le mot de passe doit faire au moins 8 caractères</div>";
            }

        else {
            echo "<div class='centered redbold'> Le mot de passe doit être le même dans les deux champs.</div>";
        }
    }

    ?>
    <?php require '_footer.php'; ?>
</body>

</html>