<?php
    //On démarre une nouvelle session
    session_start();
    /*On utilise session_id() pour récupérer l'id de session s'il existe.
     *Si l'id de session n'existe  pas, session_id() renvoie une chaine
     *de caractères vide*/
    $id_session = session_id();
?>