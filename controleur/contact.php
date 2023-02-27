<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include "$racine/modele/bd.utilisateur.inc.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["mail"]) && isset($_POST["name"]) && isset($_POST["first_name"]) && isset($_POST["message"])) {
        $mail = $_POST["mail"];
        $name = $_POST["name"];
        $first_name = $_POST["first_name"];
        $message = $_POST['message'];
    }

    if (isset($_POST['message'])) {
        $retour = mail('redchk03@yahoo.com', 'Envoi depuis page Contact', $message);
        if($retour)
            echo '<p>Votre message a bien été envoyé.</p>';
    }
    
}

include "$racine/vue/header.html.php";
include "$racine/vue/contact.html.php";

?>

