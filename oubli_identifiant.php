<?php session_start(); ?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Oubli d'identifiant</title>
    <link rel="stylesheet" href="css/style.css">
    <!--Favicon-->
    <link rel="icon" type="image" href="images/favicon-gbaf.png" />
</head>
 <!-- Si l'utilisateur est connecté  -->
 <?php
        if(isset ($_SESSION['prenomnom'])){
            header('Location: accueil_success.php');
            }
    ?>
    <body>
        <?php require '_header.php'; ?>
        <!--Clos la session ouverte dans le header-->
        <?php session_destroy(); ?>

            <div class="form_style">
                <h1 class="bottom_space">
                    J'ai oublié mon identifiant
                </h1>
                <div id="formulaire_contenu">
                    <label for="prenom"> Prénom :</label>
                    <input id="r_prenom" type="text" name="prenom" placeholder="Prénom">
                    <label for="nom"> Nom de famille :</label>
                    <input id="r_nom"  type="text" name="nom" placeholder="Nom">
                    <button class="acteur_button_click div_centered" type="button" onclick="loadDoc()">Valider</button>
                </div>
            </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">
function loadDoc() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("formulaire_contenu").innerHTML =
    this.responseText;

  }
  xhttp.open("GET", "_ajax_oubli_identifiant.php?r_nom=" + document.getElementById("r_nom").value + "&r_prenom=" + document.getElementById("r_prenom").value);
  xhttp.send();
}
</script>

<?php require '_footer.php'; ?>
    </body>
</html>