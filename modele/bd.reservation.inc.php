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

    function get_stats($date) {
        $resultat = array();

        try {
            $connexion = connexionPDO();
            $query = 'SELECT prix, reservation.codeReservation, SUM(passager.quantite) as quantitePassager FROM reservation, passager, traversee WHERE reservation.codeTraversee = traversee.codeTraversee && traversee.dateTraversee = (?) && passager.codeReservation = reservation.codeReservation GROUP BY reservation.codeReservation';
            $stmt = $connexion->prepare($query);
            $stmt->execute([$date]);
    
            $ligne = $stmt->fetch(PDO::FETCH_ASSOC);
            while ($ligne) {
                $resultat[] = $ligne;
                $ligne = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function get_reservation_by_date($date) {
        $connexion = connexionPDO();

        $sql = 'SELECT prix, reservation.codeReservation, passager.quantite, passager.typePassager FROM reservation, passager, traversee
        WHERE reservation.codeTraversee = traversee.codeTraversee && traversee.dateTraversee = (?)';
        $stmt = $connexion->prepare($sql);
        $stmt->execute([$date]);

    }

    function get_reservation_by_id($reservationId) {
        $reservation = null;

        try {
            $connexion = connexionPDO();
            $query = "SELECT * FROM reservation where codeReservation = ?";
            $stmt = $connexion->prepare($query);
    
            $stmt->execute([$reservationId]);
            $reservation = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $reservation;
    }

    function get_recap_by_id($reservationId) {
        $reservation = null;

        try {
            $connexion = connexionPDO();
            $query = "SELECT r.*, t.*, l.*, s.*
            FROM reservation r
            JOIN traversee t ON r.codeTraversee = t.codeTraversee
            JOIN liaison l ON t.codeLiaison = l.codeLiaison
            JOIN secteur s ON l.secteurId = s.id
            WHERE r.codeReservation = ?";
            $stmt = $connexion->prepare($query);
    
            $stmt->execute([$reservationId]);
            $reservation = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $reservation;
    }
?>