<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Présentation de la GBAF</title>
        <link rel="stylesheet" href="style.css">
        <!--Favicon-->
        <link  rel="icon" type="image" href="images/favicon-gbaf.png" />
        

    </head>

<body>
<?php session_start() ?>
<!-- Si l'utilisateur est déjà connecté
 -->
 <?php if ((isset ($_SESSION['prenomnom'] )))
{
    header('Location: accueil_success.php');
    exit();
} 
    require 'header.php';

    if (isset($_POST['login'])) {
        $conn = new PDO("mysql:host=localhost; dbname=dev;", 'dev', 'devpass');
        $usern=htmlentities(trim($_POST['usernPHP']));
        $password=htmlentities(trim($_POST['passwordPHP']));
        

        $sql="SELECT * FROM `account` WHERE `username` = :username AND `password`= :password" ;
        $statement = $conn->prepare($sql);
        $statement->bindParam('username', $usern);
        $statement->bindParam('password', $password);
        $statement->execute(); 
        $row = $statement->fetch();
        $account_id = $row['account_id'];
        $nom = $row['last_name'];
        $prenom = $row['first_name'];
        $username =$row['username'];

        //Si le couple utilisateur/mot de passe n'existe pas
        if (empty ($account_id)){
            exit("<font color='red'>Nom d'utilisateur ou mot de passe incorrect</font>");
        } 
        else{
            $_SESSION['prenomnom'] = $prenom . ' ' . $nom;
            $_SESSION['account_id'] =  $account_id;
            $_SESSION['username'] = $username;

           exit('<font color = "green">Success</font>') ;

        }
    }
?>
        <form method="post" action="login.php">
            <label for="f_usern">Nom d'utilisateur</label>
            <input type="text" id="usern" placeholder="usern.."><br>
            <input type="password" id="password" placeholder="Password"><br>
            <input type="button" value="Log In" id="login"> 
        </form>
        <p id="response"></p>

        <?php require 'footer.php'; ?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script type="text/javascript">
        $(document).ready(function () {
            $("#login").on('click', function(){
                var usern= $("#usern").val();
                var password= $("#password").val();
                let response= document.getElementById('response');
                
                if (usern=="" || password =="")
                    {
                        response.textContent = 'Les champs ne doivent pas être vides';}
                    else {
                        $.ajax(
                    {
                        url : 'login.php',
                        method:'POST',
                        data: {
                            login:1,
                            usernPHP: usern,
                            passwordPHP: password 
                        },
                        success: function(response) {
                            $("#response").html(response);
                            if (response.indexOf('success') >= 0)
                            window.location ='accueil_success.php'; 
                        },
                        dataType:"text"
                    }
                );
                    }
                
            });
        }); 
        </script>
    </body>
</html>