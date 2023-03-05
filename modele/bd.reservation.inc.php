<?php
    include_once "bd.inc.php";

    function create_reservation($lastName, $firstName, $address, $cp, $city, $codeTraverse, $codeUtilisateur, $totalPrice) {
        try {
            $connexion = connexionPDO();
            $sql = "INSERT INTO reservation (nom, prenom, adresse, codePostale, ville, codeTraversee, codeUtilisateur, prix)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $connexion->prepare($sql);
            $stmt->execute([$lastName, $firstName, $address, $cp, $city, $codeTraverse, $codeUtilisateur, $totalPrice]);
        
            if (isset($_SESSION))
                $_SESSION["reservationId"] = $connexion->lastInsertId();
                
        } catch (PDOException $e) {
            return "Erreur ! :" . $e->getMessage();
        }

        return 'Succès !  Réservation Enregistrer';
    }
?>