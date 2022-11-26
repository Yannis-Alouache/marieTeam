<?php
    include_once "bd.inc.php";


    function get_boat_by_name($name) {
        $boat = null;

        try {
            $connexion = connexionPDO();
            $query = "SELECT * FROM `bateau` where bateau.nom = ?";
            $stmt = $connexion->prepare($query);
    
            $stmt->execute([$name]);
            $boat = $stmt->fetch();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $boat;
    }

    function get_boats_special($type) {
        $resultat = array();
        $query = "";

        try {
            $connexion = connexionPDO();
            if ($type == "V")
                $query = "SELECT bateau.codeBateau, nom, longueur, largeur, vitesse FROM voyageur, bateau WHERE bateau.codeBateau = voyageur.codeBateau";
            else if ($type == "F")
                $query = "SELECT bateau.codeBateau, nom, longueur, largeur, vitesse FROM frêt, bateau WHERE bateau.codeBateau = frêt.codeBateau";
            $stmt = $connexion->prepare($query);
            $stmt->execute();
    
            $ligne = $stmt->fetch(PDO::FETCH_ASSOC);
            while ($ligne) {
                $resultat[] = $ligne;
                $ligne = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        } catch (ValueError $e) {
            print "Erreur ! : Mauvais type passé à la fonction get_boats_special() (V ou F)";
            die();
        }

        return $resultat;
    }

    function get_boats() {
        $resultat = array();

        try {
            $connexion = connexionPDO();
            $query = "SELECT * FROM bateau";
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


    function create_boat($nom, $longueur, $largeur, $vitesse, $type) {
        try {
            $connexion = connexionPDO();
            $type = strtoupper($type);
            $sql = "INSERT INTO bateau (nom, longueur, largeur, vitesse)
            VALUES (?, ?, ?, ?)";
            $stmt = $connexion->prepare($sql);
            $stmt->execute([$nom, $longueur, $largeur, $vitesse]);

        } catch (PDOException $e) {
            return "Erreur ! : Un bateau avec ce nom existe déjà";
        }

        create_special_boat($type, $nom);
        return "Succès ! : Bateau ajouté à la base";
    }



    function create_special_boat($type, $name) {
        $connexion = connexionPDO();
        $boat = get_boat_by_name($name);
        $sql = "";

        if ($type == "V")
            $sql = "INSERT INTO voyageur (codeBateau)
            VALUES (?)";
        else
            $sql = "INSERT INTO frêt (codeBateau)
            VALUES (?)";

        $stmt = $connexion->prepare($sql);
        $stmt->execute([$boat["codeBateau"]]);
    }


?>