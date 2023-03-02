<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include "$racine/modele/bd.utilisateur.inc.php";

$message = "";


$isLoggedIn = isLoggedIn();

if (!$isLoggedIn) {
    include "$racine/vue/header.html.php";
    include "$racine/vue/connexion.html.php";
    include "$racine/vue/footer.html.php";
}
else {
    include "$racine/vue/header.html.php";
    include "$racine/vue/reservation.html.php";
}




?>