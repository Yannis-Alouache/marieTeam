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
            return "Erreur ! : " . e->getMessage();
        }

        return "Succès ! : traversee ajouté à la base";
    }



    function get_traversee() {
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


?>