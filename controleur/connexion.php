<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.utilisateur.inc.php";

$message = "";

if  (isset($_POST["mail"]) && isset($_POST["password"])){
    $message = connexion($_POST["mail"], $_POST["password"]);
}

if (isLoggedIn()) {
    $titre = "Accueil";
    $isLoggedIn = isLoggedIn();
    header('Location: http://localhost/marieTeam/?action=defaut');
} else {
    $titre = "Connexion";
    $isLoggedIn = isLoggedIn();
    include "$racine/vue/header.html.php";
    include "$racine/vue/connexion.html.php";
}


?>