<?php
    include_once "bd.inc.php";

    function create_tarif($type, $periodeDebut, $periodeFin, $prix, $codeTraversee) {
        try {
            $connexion = connexionPDO();
            $sql = "INSERT INTO tarif (typePassager, periodeDebut, periodeFin, prix, codeTraversee)
            VALUES (?, ?, ?, ?, ?)";
            $stmt = $connexion->prepare($sql);
            $stmt->execute([$type, $periodeDebut, $periodeFin, $prix, $codeTraversee]);

        } catch (PDOException $e) {
            return "Erreur ! : " . $e->getMessage();
        }

        return "Succès ! : Tarif ajouté à la base";
    }

    function get_tarifs() {
        $resultat = array();

        try {
            $connexion = connexionPDO();
            $query = "SELECT * FROM tarif";
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

    function get_tarifs_by_date_and_liaison($date, $liaisonId) {
        $resultat = array();

        try {
            $connexion = connexionPDO();
            $query = "SELECT type_passager.id, type_passager.libelle, tarif.prix FROM tarif, type_passager WHERE tarif.codeLiaison = ? and tarif.periodeDebut <= ? and tarif.periodeFin >= ? and type_passager.id = tarif.codeTypePassager ORDER BY type_passager.id";
            $stmt = $connexion->prepare($query);
            $stmt->execute([$liaisonId, $date, $date]);
    
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