<?php
    include_once "bd.inc.php";


    function get_sector() {
        $sector = array();

        try {
            $connexion = connexionPDO();
            $query = "SELECT * FROM secteur ";
            $stmt = $connexion->prepare($query);
            $stmt->execute();

            $ligne = $stmt->fetch(PDO::FETCH_ASSOC);
            while ($ligne) {
                $boat[] = $ligne;
                $ligne = $stmt->fetch(PDO::FETCH_ASSOC);
            }
           // $ligne = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $boat;
    }
    function get_sector_name_by_id($id) {

        try {
            $connexion = connexionPDO();
            $query = "SELECT nomSecteur FROM secteur WHERE secteur.id = (?)";
            $stmt = $connexion->prepare($query);
            $stmt->execute([$id]);

            $res = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $res;
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