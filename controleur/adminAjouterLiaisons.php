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
    $secteurs = get_sector();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST["portDepart"]) && isset($_POST["portArrive"]) && isset($_POST["distance"]) && isset($_POST["secteurId"])) {
            $portDepart = $_POST["portDepart"];
            $portArrive = $_POST["portArrive"];
            $distance = $_POST["distance"];
            $secteurId = $_POST["secteurId"];

            $message = create_liaison($distance, $portDepart, $portArrive, $secteurId);
        }
        else {
            $message = "Merci de remplir tout les champs";
        }
        
    }

    include "$racine/vue/adminPanelAjouterLiaisons.html.php";
}

?>