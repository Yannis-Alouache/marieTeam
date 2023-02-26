<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include "$racine/modele/bd.utilisateur.inc.php";
include "$racine/modele/bd.sector.inc.php";
include "$racine/modele/bd.liaison.inc.php";


$titre = "Select liaison";

$default_secteur_id = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset( $_POST['secteur_id'])) {
        $secteur_id = $_POST['secteur_id'];
    }
}

if (isset($secteur_id)) 
    $liaisons = get_liaisons_by_sector($secteur_id);
else
    $liaisons = get_liaisons_by_sector($default_secteur_id);

$isLoggedIn = isLoggedIn();

include "$racine/vue/header.html.php";
include "$racine/vue/selectLiaison.html.php";
include "$racine/vue/footer.html.php";
?>