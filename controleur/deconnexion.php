<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.utilisateur.inc.php";

deconnexion();

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "accueil";
$isLoggedIn = isLoggedIn();
header('Location: http://localhost/marieTeam/?action=defaut');;


?>