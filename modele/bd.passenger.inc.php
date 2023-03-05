<?php
    include_once "bd.inc.php";

    function create_passenger($passengerArray) {
        try {
            $connexion = connexionPDO();
            $sql = "INSERT INTO passager (typePassager, quantite, codeReservation)
            VALUES (?, ?, ?)";
            $stmt = $connexion->prepare($sql);

            for ($i=0; $i < count($passengerArray); $i++) { 
                $stmt->execute([$passengerArray[$i]["id"], $passengerArray[$i]["quantite"], $_SESSION["reservationId"]]);
            }

        } catch (PDOException $e) {
            return "Erreur ! :" . $e->getMessage();
        }

        return "Succès !  Passager Enregistrer";
    }
?>