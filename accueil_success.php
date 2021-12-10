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
        <div id=conteneur>
            <!--Section présentation -->
            
                <h1>Le GBAF</h1>
                <p>Le <strong> Groupement Banque Assurance Français (GBAF) </strong> est une fédération représentant 
                    les 6 grands groupes français : BNP Paribas, BPCE, Crédit Agricole, Crédit Mutuel-CIC, Société Générale
                     et La Banque Postale.</p>
                <p>Le GBAF est le représentant de la profession bancaire et des assureurs sur tous
                    les axes de la réglementation financière française. Sa mission est de promouvoir
                    l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des
                    pouvoirs publics.
                    </p>

           
            
            <!--Section acteurs-->
            <h2>Nos partenaires</h2>
            <div id="acteurs_liste">
                <div class ="acteur">
                    <div class ="acteur_logo">
                        <img class="image_logo" src="images/formation_co.png"></img>
                    </div>
                    <div class = "acteur_corps">
                        <div class ="acteur_titre">
                            <h3>Formation & Co</h3>
                        </div>
                        <div class ="acteur_description">
                        <p> Formation&co est une association française présente sur tout le territoire.
                            Nous proposons à des personnes issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé.
                        </div>
                    </div>
                    <div class ="acteur_button">
                        <button class ="acteur_button_click" onclick="window.location.href='formation_co.php'">Lire la suite</button>
                    </div>
                </div>
                <div class ="acteur">
                    <div class ="acteur_logo">
                    <img class="image_logo" src="images/Dsa_france.png"></img>
                    </div>
                    <div class = "acteur_corps">
                        <div class ="acteur_titre">
                            <h3>DSA France</h3>
                        </div>
                        <div class ="acteur_description">
                        <p> Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales.
                            Nous accompagnons les entreprises dans les étapes clés de leur évolution.
                       </p>
                        </div>
                    </div>
                    <div class ="acteur_button">
                         <button class ="acteur_button_click" onclick='window.location.href="dsa_france.php"'>Lire la suite</button>
                    </div>
                </div>
                <div class ="acteur">
                    <div class ="acteur_logo">
                         <img class="image_logo" src="images/protectpeople.png"></img>
                    </div>
                    <div class = "acteur_corps">
                        <div class ="acteur_titre">
                            <h3>Protectpeople</h3>
                        </div>
                        <div class ="acteur_description">
                        <p> Protectpeople finance la solidarité nationale.
                            Nous appliquons le principe édifié par la Sécurité sociale française en 1945 : permettre à chacun de bénéficier d’une protection sociale.
                        </p>
                        </div>
                    </div>
                    <div class ="acteur_button">
                         <button class ="acteur_button_click" onclick='window.location.href="protectpeople.php"'>Lire la suite</button>
                    </div>
                </div>
                <div class ="acteur">
                    <div class ="acteur_logo">
                        <img class="image_logo" src="images/cde.png"></img>
                    </div>
                    <div class = "acteur_corps">
                        <div class ="acteur_titre">
                            <h3>La CDE</h3>
                        </div>
                        <div class ="acteur_description">
                        <p> La CDE (Chambre Des Entrepreneurs) accompagne les entreprises dans leurs démarches de formation. 
                            Son président est élu pour 3 ans par ses pairs, chefs d’entreprises et présidents des CDE.
                        </p>
                        </div>
                    </div>
                    <div class ="acteur_button">
                    <button class ="acteur_button_click" onclick='window.location.href="cde.php"'>Lire la suite</button>
                    </div>
                </div>
            </div>
        </div>
            <?php require 'footer.php'; ?>
         
 </html>