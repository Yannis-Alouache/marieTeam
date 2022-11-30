<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.utilisateur.inc.php";

deconnexion();

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "accueil";
$isLoggedIn = isLoggedIn();
include "$racine/vue/header.html.php";
include "$racine/vue/accueil.html.php";
include "$racine/vue/footer.html.php";


?>