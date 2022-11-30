<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include "$racine/modele/bd.utilisateur.inc.php";

$titre = "Accueil";
$isLoggedIn = isLoggedIn();
include "$racine/vue/header.html.php";
include "$racine/vue/accueil.html.php";
include "$racine/vue/footer.html.php";
?>