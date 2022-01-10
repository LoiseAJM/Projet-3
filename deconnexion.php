<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Déconnexion</title>
    <link rel="stylesheet" href="css/style.css">
    <!--Favicon-->
    <link rel="icon"   href="images/favicon-gbaf.png" />
</head>

<body>

    <!-- Destruction de la session et redirection vers l'index -->
    <?php session_start(); ?>
    <?php session_destroy(); ?>
    <?php header('Location: index.php'); ?>

</body>