<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include "$racine/modele/bd.utilisateur.inc.php";
include "$racine/modele/bd.sector.inc.php";
include "$racine/modele/bd.liaison.inc.php";


$titre = "Accueil";

$secteurs = get_sector();
$liaisons = get_liaisons();


$isLoggedIn = isLoggedIn();

include "$racine/vue/header.html.php";
include "$racine/vue/accueil.html.php";
include "$racine/vue/footer.html.php";
?>