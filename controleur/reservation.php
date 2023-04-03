<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include "$racine/modele/bd.utilisateur.inc.php";
include "$racine/modele/bd.tarif.inc.php";
include "$racine/modele/bd.reservation.inc.php";
include "$racine/modele/bd.passenger.inc.php";
include "$racine/modele/bd.traversee.inc.php";


$message = "";
$isLoggedIn = isLoggedIn();

if (!$isLoggedIn) {
    include "$racine/vue/header.html.php";
    include "$racine/vue/connexion.html.php";
    include "$racine/vue/footer.html.php";
}
else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Si l'on vient de la page de selection de la traversée on enregistre l'id de la traversée dans la session
        if (isset($_POST["traverseeSubmitBtn"])) {
            $_SESSION["traverseId"] = $_POST["traverseId"];
        }

        $traverseId = $_SESSION["traverseId"];
        $codeUtilisateur = $_SESSION["id"];
        $liaisonId = $_SESSION["liaisonId"];
        $date = $_SESSION["date"];
        $tarifs = get_tarifs_by_date_and_liaison($date, $liaisonId);


        if (isset($_POST["lastName"])) {
            $lastName = $_POST["lastName"];
        }
        if (isset($_POST["firstName"])) {
            $firstName = $_POST["firstName"];
        }
        if (isset($_POST["address"])) {
            $address = $_POST["address"];
        }
        if (isset($_POST["codePostal"])) {
            $codePostal = $_POST["codePostal"];
        }
        if (isset($_POST["city"])) {
            $city = $_POST["city"];
        }
        if (isset($_POST["A1"])) {
            $a1 = $_POST["A1"];
        }
        if (isset($_POST["A2"])) {
            $a2 = $_POST["A2"];
        }
        if (isset($_POST["A3"])) {
            $a3 = $_POST["A3"];
        }
        if (isset($_POST["B1"])) {
            $b1 = $_POST["B1"];
        }
        if (isset($_POST["B2"])) {
            $b2 = $_POST["B2"];
        }
        if (isset($_POST["C1"])) {
            $c1 = $_POST["C1"];
        }
        if (isset($_POST["C2"])) {
            $c2 = $_POST["C2"];
        }
        if (isset($_POST["C3"])) {
            $c3 = $_POST["C3"];
        }

        if (isset($a1, $a2, $a3, $b1, $b2, $c1, $c2, $c3)) {
            $passenger = array();
            $quantityForEachPassenger = array($a1, $a2, $a3, $b1, $b2, $c1, $c2, $c3);
            $totalPrice = 0;
    
            for ($i=0; $i < count($quantityForEachPassenger); $i++) { 
                $totalPrice += $quantityForEachPassenger[$i] * $tarifs[$i]["prix"];
                if ($quantityForEachPassenger[$i] > 0) {
                    array_push($passenger, array("id" => $tarifs[$i]["id"], "quantite" => $quantityForEachPassenger[$i]));
                }
            }

            $message = create_reservation(
                $lastName,
                $firstName,
                $address,
                $codePostal,
                $city,
                $traverseId,
                $codeUtilisateur,
                $totalPrice
            );
            create_passenger($passenger);
            updateQuantité($_SESSION["reservationId"]);
            header("Location: http://localhost/marieTeam/?action=recapReservation");
        }
    }

    include "$racine/vue/header.html.php";
    include "$racine/vue/reservation.html.php";
    include "$racine/vue/footer.html.php";
}




?>