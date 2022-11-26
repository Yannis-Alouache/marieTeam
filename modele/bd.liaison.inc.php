<?php
    include_once "bd.inc.php";

    function create_liaison($distance, $portDepart, $portArriver, $secteurId) {
        try {
            $connexion = connexionPDO();
            $sql = "INSERT INTO liaison (distance, portDepart, portArriver, secteurId)
            VALUES (?, ?, ?, ?)";
            $stmt = $connexion->prepare($sql);
            $stmt->execute([$distance, $portDepart, $portArriver, $secteurId]);

        } catch (PDOException $e) {
            return "Erreur ! :" . $e->getMessage();
        }

        return "Succès ! : Liaison ajouté à la base";
    }



    function get_liaisons() {
        $resultat = array();

        try {
            $connexion = connexionPDO();
            $query = "SELECT * FROM liaison";
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