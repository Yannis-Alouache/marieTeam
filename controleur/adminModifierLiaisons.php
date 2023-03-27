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
$pseudo = $_SESSION["username"];
$liaisons = get_liaisons();
$secteurs = get_sector();




if (!$isLoggedIn)
    header("Location: http://localhost/marieTeam/?action=connexion");
if (!$isAdmin)
    header("Location: http://localhost/marieTeam/?action=defaut");
else {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST["liaisonSelect"]) && $_POST["liaisonSelect"] != "null") { 
            $_SESSION["liaisonToModify"] = $_POST["liaisonSelect"];
            $liaisonToModify = get_liaison_by_id($_SESSION["liaisonToModify"]);
        }
        else {
            $message = "Merci de selectionner une liaison non nul !";
        }

        if (isset($_POST["portDepart"]) && isset($_POST["portArrive"]) && isset($_POST["distance"]) && isset($_POST["secteurId"])) {
            if (!modify_liaison($_SESSION["liaisonToModify"], $_POST["portDepart"], $_POST["portArrive"], $_POST["distance"], $_POST["secteurId"]))
                $message = "Erreur dans la modification de la liaison.";
            else
                $message = "Liaison modifié !";
        }
    }

    include "$racine/vue/adminPanelModifierLiaisons.html.php";
}

?>