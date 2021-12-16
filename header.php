<header>
<?php
/*Si aucune session n'est ouverte, on ouvre une session*/
if(session_id() == '') {
        session_start();
    }

    /*On utilise session_id() pour récupérer l'id de session s'il existe.
     *Si l'id de session n'existe  pas, session_id() renvoie une chaine
     *de caractères vide*/
    $id_session = session_id();
?>
<html>
<head>
        <meta charset="utf-8">
        <title>GBAF</title>
        <link rel="stylesheet" href="style.css">
        <!--Favicon-->
        <link rel="icon" type="image" href="images/favicon-gbaf.png" />

    </head>
        <body>
<div class="menusuperieur">
  <a   href="index.php"> <img id="logoGBAF" src="images/logo_gbaf.png" alt="logo GBAF"/></a>
  <div class="right_align bottom_align"><p><?php
   if (isset ($_SESSION['prenomnom'] ))
   { echo 'Bonjour ' .$_SESSION['prenomnom'];}
   else {echo "Bonjour, vous n'êtes pas connecté";} ?></p>
<p><?php
   if (isset ($_SESSION['prenomnom'] ))
   { echo '<a href="deconnexion.php"> Déconnexion</a>' ;
} ?> </p></div>
</div>
</li>
</ul>
</body>
</html>

</header>