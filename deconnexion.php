<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Déconnexion</title>
    <link rel="stylesheet" href="style.css">
    <!--Favicon-->
    <link rel="icon" type="image" href="images/favicon-gbaf.png" />
</head>

<body>
<?php session_start(); ?>
<?php session_destroy();?>
<meta http-equiv="refresh" content="0;index.php">

</head>
</body>