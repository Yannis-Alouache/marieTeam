<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include "$racine/modele/bd.utilisateur.inc.php";

$alertMessage = "";
$isLoggedIn = isLoggedIn();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["mail"]) && isset($_POST["name"]) && isset($_POST["first_name"]) && isset($_POST["message"])) {
        $mail = $_POST["mail"];
        $name = $_POST["name"];
        $first_name = $_POST["first_name"];
        $content = $_POST["message"];

        $to = "bigyanni1@gmail.com";
        $subject = "Nouveau Message De $first_name $name";
        $message = $content."\nEmail :".$mail;
        

        $retour = mail(to: $to, subject: $subject, message: $message);
        if($retour)
            $alertMessage = "Votre message à bien était envoyer";
    }  
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $alertMessage = "";
}


include "$racine/vue/header.html.php";
include "$racine/vue/contact.html.php";

?>

