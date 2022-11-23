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


    function create_boat($nom, $longueur, $largeur, $vitesse, $type) {
        try {
            $connexion = connexionPDO();
            $type = strtoupper($type);
            $sql = "INSERT INTO bateau (nom, longueur, largeur, vitesse)
            VALUES (?, ?, ?, ?)";
            $stmt = $connexion->prepare($sql);
            $stmt->execute([$nom, $longueur, $largeur, $vitesse]);

        } catch (PDOException $e) {
            return "Erreur ! : Le nom est propre à chaque bateau.";
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