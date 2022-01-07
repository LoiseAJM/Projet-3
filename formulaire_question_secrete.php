<?php session_start(); ?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulaire question secrète</title>
    <link rel="stylesheet" href="css/style.css">
    <!--Favicon-->
    <link rel="icon" type="image" href="images/favicon-gbaf.png" />
</head>
<!-- Si l'utilisateur est connecté  -->
<?php
if (isset($_SESSION['prenomnom'])) {
    header('Location: accueil_success.php');
}
?>

<body>
    <?php require '_header.php'; ?>
    <form class="form_style" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <h1>
            J'ai oublié mon mot de passe
        </h1>
        <br>
        <div>
            <label for="question_secrete"> <?php echo $_SESSION['questionsecrete'] ?></label>
            <input type="text" name="reponse" placeholder="Votre réponse">
            <input type="submit" value="Envoyer" />
        </div>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $reponse = htmlentities(trim($_POST['reponse']));
        //verification de la correspondance des reponses
        if ($_SESSION['reponsesecrete'] == $reponse) {
            echo '<meta http-equiv="refresh" content="0;change_password.php">';
        } else {
            echo "<div class='centered redbold'> Désolé, ce n'est pas la bonne réponse</div>";
        }
    }

    ?>
    <?php require '_footer.php'; ?>
</body>

</html>