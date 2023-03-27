<?php

function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "accueil.php";
    $lesActions["liste"] = "listeRestos.php";
    $lesActions["detail"] = "detailResto.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["inscription"] = "inscription.php";
    $lesActions["profil"] = "monProfil.php";
    $lesActions["selectLiaison"] = "selectLiaison.php";
    $lesActions["contact"] = "contact.php";
    $lesActions["reservation"] = "reservation.php";
    $lesActions["traverse"] = "traverse.php";
    $lesActions["recapReservation"] = "recapReservation.php";
    $lesActions["admin"] = "adminPanel.php";
    $lesActions["adminAjouterLiaisons"] = "adminAjouterLiaisons.php";
    $lesActions["adminModifierLiaisons"] = "adminModifierLiaisons.php";
    $lesActions["statistique"] = "statistique.php";


    
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}

?>