<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include "$racine/modele/bd.utilisateur.inc.php";

$message = "";



$isLoggedIn = isLoggedIn();
include "$racine/vue/header.html.php";
include "$racine/vue/inscription.html.php";
?>