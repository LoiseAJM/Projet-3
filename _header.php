<header>
    <?php
    /*Si aucune session n'est ouverte, on ouvre une session*/
    if (session_id() == '') {
        session_start();
    }
    ?> <div class="menusuperieur">
        <div class="connexion_header_smartphone">
            <a href="index.php"> <img id="logoGBAF" src="images/logo_gbaf.png" alt="logo GBAF" /></a>
        </div>
        <div class="connexion_header_computer connexion_header_smartphone">
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
</header>