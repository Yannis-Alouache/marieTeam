<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}


if (isset($_POST["mailU"]) && isset($_POST["mdpU"]) && isset($_POST["nom"]) && isset($_POST["prenom"])){
    $mailU = $_POST["mailU"];
    $mdpU = $_POST["mdpU"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
}

?>