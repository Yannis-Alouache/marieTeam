<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include "$racine/modele/bd.utilisateur.inc.php";

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["mail"]) && isset($_POST["name"]) && isset($_POST["first_name"]) && isset($_POST["password"])) {
        $mail = $_POST["mail"];
        $name = $_POST["name"];
        $first_name = $_POST["first_name"];
        $password = $_POST["password"];
    }
    
    $number = preg_match('@[0-9]@', $password);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
        $message = "Le mot de passe doit comporter au moins 8 caractères et doit contenir au moins un chiffre, une lettre majuscule, une lettre minuscule et un caractère spécial.";
    } else {
        $message = createUser($mail, $password, $name, $first_name);
    }
}


$isLoggedIn = isLoggedIn();
include "$racine/vue/header.html.php";
include "$racine/vue/inscription.html.php";

?>