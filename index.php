<?php session_start(); ?>
<html>

    <head>
        <meta charset="utf-8">
        <title>Connexion</title>
        <link rel="stylesheet" href="style.css">
        <!--Favicon-->
        <link rel="icon" type="image" href="images/favicon-gbaf.png" />
    </head>

    <body> <?php if ((isset ($_SESSION['prenomnom'] )))
            { 
            require 'header.php'; 
            require 'presentationgbaf.php';
            require 'footer.php' ;  }
            else
            { 
            require 'header.php'; 
            require 'connexion.php';
            require 'footer.php' ;  }
            ?>

        </body>

        
       
</html>