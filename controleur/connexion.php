<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.utilisateur.inc.php";

if(isset($_POST["mail"])&& isset($_POST["password"])){
    connexion($_POST["mail"], $_POST["password"]);
}

if (isLoggedIn()) {
    $titre = "Accueil";
    include "$racine/vue/header.html.php";
    echo "<h1>ACCUEUIL</h1>";
    include "$racine/vue/footer.html.php";
} else {
    $titre = "Connexion";
    include "$racine/vue/header.html.php";
    include "$racine/vue/connexion.html.php";
}


?>