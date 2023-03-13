<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include "$racine/modele/bd.utilisateur.inc.php";
include "$racine/modele/bd.reservation.inc.php";
include "$racine/modele/bd.passenger.inc.php";

$isLoggedIn = isLoggedIn();
$recaps = get_recap_by_id($_SESSION["reservationId"]);

include "$racine/vue/header.html.php";
include "$racine/vue/recapReservation.html.php";
include "$racine/vue/footer.html.php";


?>