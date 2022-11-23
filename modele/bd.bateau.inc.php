<?php
    include_once "bd.inc.php";


    function create_boat($nom, $longueur, $largeur, $vitesse) {
        try {
            $connexion = connexionPDO();
            $sql = "INSERT INTO bateau (nom, longueur, largeur, vitesse)
            VALUES (?, ?, ?, ?)";
            $stmt = $connexion->prepare($sql);
            $stmt->execute([$nom, $longueur, $largeur, $vitesse]);
            return "Succès ! : Bateau ajouté à la base";
        } catch (PDOException $e) {
            return "Erreur ! : Le nom est propre à chaque bateau.";
        }
    }


?>