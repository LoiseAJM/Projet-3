<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/style.css">
    <!--Favicon-->
    <link rel="icon" href="images/favicon-gbaf.png" />
</head>

<!-- Si l'utilisateur est connecté  -->
<?php
if (isset($_SESSION['prenomnom'])) {
    header('Location: accueil_success.php');
}
?>

<body>
    <!--Appel du header-->
    <?php require '_header.php'; ?>
    <!--Formulaire-->
    <form id="formulaire_inscription" class="form_style" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h1 id="titre_formulaire">
            Créer un compte
        </h1>
        <div>
            <label>Nom : </label>
            <input id="f_nom" type="text" name="f_nom" required placeholder="Votre nom">
            <span id="nom_erreur"></span>
        </div>

        <div>
            <label>Prénom :</label>
            <input id="f_prenom" type="text" name="f_prenom" required placeholder="Votre prénom">
            <span id="prenom_erreur"></span>
        </div>
        <div>
            <label>Identifiant :</label>
            <input id="f_username" type="text" name="f_username" required placeholder="Votre identifiant">
            <span id="username_erreur"></span>
        </div>
        <div>
            <label>Mot de passe ( doit contenir au moins 8 caractères, dont un chiffre, une majuscule et une minuscule ):</label>
            <input id="f_password" type="password" name="f_password" minlength='8' required placeholder="Mot de passe">
            <span id="password_erreur"></span>
        </div>
        <div>
            <label>Confirmer le mot de passe</label>
            <input id="f_passwordconfirm" type="password" name="f_passwordconfirm" required placeholder="Mot de passe">
            <span id="passwordconfirm_erreur"></span>
        </div>
        <div>
            <label>Question secrète :</label>
            <input id="f_questionsecrete" type="text" name="f_questionsecrete" required placeholder="Question secrète">
            <span id="questionsecrete_erreur"></span>
        </div>
        <div>
            <label>Réponse :</label>
            <input id="f_reponse" type="text" name="f_reponse" required placeholder="Réponse">
            <span id="reponse_erreur"></span>
        </div>
        <div>
            <input id="submit" type="submit" value="Envoyer" />
        </div>

    </form>

    <?php
    //Stockage des données du formulaire dans des variables
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = htmlentities(trim($_POST['f_username']));
        $nom = htmlentities(($_POST['f_nom']));
        $prenom = htmlentities($_POST['f_prenom']);
        $password = htmlentities($_POST['f_password']);
        $passwordconfirm = htmlentities($_POST['f_passwordconfirm']);
        $passwordsecure = password_hash($password, PASSWORD_DEFAULT);
        $questionsecrete = htmlentities($_POST['f_questionsecrete']);
        $reponse = htmlentities($_POST['f_reponse']);

        $connect = new PDO("mysql:host=localhost; dbname=dev;", 'dev', 'devpass');
        $sql1 = "SELECT * FROM `account` WHERE `username` = :username";
        $statement1 = $connect->prepare($sql1);
        $statement1->bindParam('username', $username);
        $statement1->execute();
        $row = $statement1->fetch();

        if (empty($row['username'])) // on vérifie qu'il n'existe pas un username identique dans la BDD
        {
            try {
                $conn = new PDO("mysql:host=localhost; dbname=dev;", 'dev', 'devpass');
                //Exception : Mode Erreur de PDO 
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO `account`( `last_name`, `first_name`, `username`, `password`, `question`, `answer`) 
                        VALUES ( :att_nom, :att_prenom, :att_username, :att_password, :att_questionsecrete, :att_reponse )";


                $statement = $conn->prepare($sql);
                $statement->bindParam('att_nom', $nom);
                $statement->bindParam('att_prenom', $prenom);
                $statement->bindParam('att_password', $passwordsecure);
                $statement->bindParam('att_questionsecrete', $questionsecrete);
                $statement->bindParam('att_reponse', $reponse);
                $statement->bindParam('att_username', $username);
                $statement->execute();
                echo "<meta http-equiv='refresh' content='0;redirection_inscription_reussie.php'>";
            } catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
        } else {
            echo "<meta http-equiv='refresh' content='0;redirection_identifiant_existe.php'>";
        }
    }

    ?>
    <script src="js/monscript.js"></script>
</body>

</html>