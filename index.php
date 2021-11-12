<html>
    <head>
        <meta charset="utf-8">
        <title>Connexion</title>
        <link rel="stylesheet" href="style.css">
        <!--Favicon-->
        <link rel="icon" type="image" href="images/favicon-gbaf.png" />
    </head>
    <body>
        <div class="container">
            <h1 id="titrecontact">
                Créer un compte
            </h1>
            <form>
                <div>
                    <label for="nom">Nom : </label>
                    <input type="text" name="nom" id="nom" placeholder="Votre nom" class="form_input">
                </div>
                
                <div>
                    <label for="prenom">Prénom :</label>
                    <input type="text" name="prenom" id="prenom" placeholder="Votre prénom" class="form_input">
                </div>
                <div >
                    <label for="username">Identifiant :</label>
                    <input type="text" name="username" id="username" placeholder="Username" class="form_input">
                </div>
                <div>
                    <label for="motdepasse">Mot de passe :</label>
                    <input type="password" name="nom" id="motdepasse" placeholder="Mot de passe" class="form_input">
                </div>
                <div >
                    <label for="questionsecrete">Question secrète :</label>
                    <input type="text" name="questionsecrete" id="questionsecrete" placeholder="Question secrète" class="form_input">
                </div>
                <div >
                    <label for="username">Réponse :</label>
                    <input type="text" name="reponse" id="reponse" placeholder="Réponse" class="form_input">
                </div>
                <div>
                    <button class="submit">Envoyer
                    </button>
                </div>

            </form>
        </div>
    </body>
</html>