<?php
    include_once "bd.inc.php";

    function create_traversee($dateTraversee, $heure, $quantiteA, $quantiteB, $quantiteC, $codeLiaison, $codeBateau) {
        try {
            $connexion = connexionPDO();
            $sql = "INSERT INTO traversee (dateTraversee, heure, quantitePassagerA, quantitePassagerB, quantitePassagerC, codeLiaison, codeBateau)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $connexion->prepare($sql);
            $stmt->execute([$dateTraversee, $heure, $quantiteA, $quantiteB, $quantiteC, $codeLiaison, $codeBateau]);

        } catch (PDOException $e) {
            return "Erreur ! : " . $e->getMessage();
        }

        return "Succès ! : traversee ajouté à la base";
    }



    function get_traversees() {
        $resultat = array();

        try {
            $connexion = connexionPDO();
            $query = "SELECT * FROM traversee";
            $stmt = $connexion->prepare($query);
            $stmt->execute();
    
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

    function get_traverse_from_date_and_liaison_id($date, $liaisonId) {
        $resultat = array();

        try {
            $connexion = connexionPDO();
            $query = "SELECT * FROM traversee where traversee.dateTraversee = ? and traversee.codeLiaison = ?";
            $stmt = $connexion->prepare($query);
            $stmt->execute([$date, $liaisonId]);
    
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


?>