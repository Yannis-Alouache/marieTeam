<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

$titre = "Accueil";
include "$racine/vue/header.html.php";
include "$racine/vue/acceuil.html.php";
include "$racine/vue/footer.html.php";

?>