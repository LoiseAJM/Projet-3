<header>
    <?php
    /*Si aucune session n'est ouverte, on ouvre une session*/
    if (session_id() == '') {
        session_start();
    }
    ?>
    <html>

    <head>
        <meta charset="utf-8">
        <title>GBAF</title>
        <link rel="stylesheet" href="css/style.css">
        <!--Favicon-->
        <link rel="icon" type="image" href="images/favicon-gbaf.png" />

    </head>

    <body>
        <div class="menusuperieur">
            <a href="index.php"> <img id="logoGBAF" src="images/logo_gbaf.png" alt="logo GBAF" /></a>
            <div class="right_align bottom_right_align">
                <p><?php
                //Vérifie l'existence de la variable de session prenomnom définie
                //lors de la connexion dans verification.php
                    if (isset($_SESSION['prenomnom'])) {
                        echo 'Bonjour ' . $_SESSION['prenomnom'];
                    } else {
                        echo "Bonjour, vous n'êtes pas connecté";
                    } ?></p>
                <p><?php
                    if (isset($_SESSION['prenomnom'])) {
                        echo '<a href="deconnexion.php"> <span class= "underline" > Déconnexion</span></a>';
                    } ?> </p>
            </div>
        </div>
        </li>
        </ul>
    </body>

    </html>

</header>