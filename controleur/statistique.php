<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include "$racine/modele/bd.utilisateur.inc.php";
include "$racine/modele/bd.sector.inc.php";
include "$racine/modele/bd.liaison.inc.php";
include "$racine/modele/bd.reservation.inc.php";


$titre = "Admin";
$isLoggedIn = isLoggedIn();
$isAdmin = isAdmin();
$pseudo = $_SESSION["username"];


if (!$isLoggedIn)
    header("Location: http://localhost/marieTeam/?action=connexion");
if (!$isAdmin)
    header("Location: http://localhost/marieTeam/?action=defaut");
else {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['date'])) {
            $date = $_POST['date'];
            $stats_array = get_stats($date);
            $totalPrice = get_total_price($date);
        }
        else
            $message = "Merci de rentrer une date !";
    }

    include "$racine/vue/adminPanelStat.html.php";
}

?>