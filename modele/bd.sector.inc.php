<?php
    include_once "bd.inc.php";


    function get_sector_by_name($name) {
        $sector = null;

        try {
            $connexion = connexionPDO();
            $query = "SELECT * FROM `secteur` where secteur.nomSecteur = ?";
            $stmt = $connexion->prepare($query);
    
            $stmt->execute([$name]);
            $boat = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $boat;
    } 


    function create_sector($name) {
        try {
            $connexion = connexionPDO();
            $sql = "INSERT INTO secteur (nomSecteur)
            VALUES (?)";
            $stmt = $connexion->prepare($sql);
            $stmt->execute([$name]);

        } catch (PDOException $e) {
            return "Erreur ! : Le nom est propre à chaque secteur.";
        }
        return "Succès ! : Secteur ajouté à la base";
    }

?>