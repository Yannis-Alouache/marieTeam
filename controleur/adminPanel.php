<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include "$racine/modele/bd.utilisateur.inc.php";
include "$racine/modele/bd.sector.inc.php";
include "$racine/modele/bd.liaison.inc.php";


$titre = "Admin";
$isLoggedIn = isLoggedIn();
$isAdmin = isAdmin();


if (!$isLoggedIn)
    header("Location: http://localhost/marieTeam/?action=connexion");
if (!$isAdmin)
    header("Location: http://localhost/marieTeam/?action=defaut");
else {
    include "$racine/vue/adminPanel.html.php";
}

?>