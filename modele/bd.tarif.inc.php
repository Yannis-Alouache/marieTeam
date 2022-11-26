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



?>