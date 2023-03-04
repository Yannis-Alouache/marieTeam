<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include "$racine/modele/bd.utilisateur.inc.php";
include "$racine/modele/bd.sector.inc.php";
include "$racine/modele/bd.liaison.inc.php";
include "$racine/modele/bd.traversee.inc.php";



$titre = "Accueil";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset( $_POST['liaisonSelect'])) {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION["liaisonId"] = $_POST['liaisonSelect'];
        $liaison = $_POST['liaisonSelect'];
    }
    if (isset( $_POST['date'])) {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION["date"] = $_POST['date'];
        $date = $_POST['date'];
    }

    $traversees = get_traverse_from_date_and_liaison_id($date, $liaison);
    
    
}

$isLoggedIn = isLoggedIn();

include "$racine/vue/header.html.php";
include "$racine/vue/traverse.html.php";
include "$racine/vue/footer.html.php";
?>