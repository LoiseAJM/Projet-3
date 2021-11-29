<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8">
        <title>GBAF</title>
        <link rel="stylesheet" href="style.css">
        <!--Favicon-->
        <link rel="icon" type="image" href="images/favicon-gbaf.png" />
    </head>
    <body>
    <?php require 'header.php'; ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"> 
            <h1>
                J'ai oublié mon mot de passe
            </h1>
            <br>
            <div>
                <label for="question_secrete"> <?php echo $_SESSION['questionsecrete'] ?></label>
                <input type="text" name="reponse" placeholder="Votre réponse">
                <input type="submit" value="Envoyer"/>
            </div>
        </form>

     <?php   if ($_SERVER["REQUEST_METHOD"] == "POST")
        { $reponse=htmlentities(trim($_POST['reponse']));
        
            if ($_SESSION['reponsesecrete'] == $reponse)
        {echo '<meta http-equiv="refresh" content="0;index.php">';}
            else
        {echo "<div class='centered'> Désolé, ce n'est pas la bonne réponse</div>";}
        }

    ?>
    <?php require 'footer.php'; ?>
    </body>
</html>