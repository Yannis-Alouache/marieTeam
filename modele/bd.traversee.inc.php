<?php
    include_once "bd.inc.php";
    include_once "bd.passenger.inc.php";

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

    function updateQuantité($idReservation) {    
        
        try {
            $connexion = connexionPDO();


            //Recuperation des quantité
            $sql = "SELECT quantite FROM passager WHERE passager.typePassager LIKE 'A%' AND passager.codeReservation = (?);";
            $stmt = $connexion->prepare($sql);
            $stmt->execute([$idReservation]);
            $quantiteAres = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($quantiteAres) {
                $sql = "UPDATE traversee SET traversee.quantitePassagerA = traversee.quantitePassagerA - (?) WHERE traversee.codeTraversee = (?)"; 
                $stmt = $connexion->prepare($sql); 
                $stmt->execute([$quantiteAres['quantite'], $_SESSION["traverseId"]]);
            }




            $sql = "SELECT quantite FROM passager WHERE passager.typePassager LIKE 'B%' AND passager.codeReservation = (?);";
            $stmt = $connexion->prepare($sql);
            $stmt->execute([$idReservation]);
            $quantiteBres = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($quantiteBres) {
                $sql = "UPDATE traversee SET traversee.quantitePassagerB = traversee.quantitePassagerB - (?) WHERE traversee.codeTraversee = (?)"; 
                $stmt = $connexion->prepare($sql); 
                $stmt->execute([$quantiteBres['quantite'], $_SESSION["traverseId"]]);
            }



            $sql = "SELECT quantite FROM passager WHERE passager.typePassager LIKE 'C%' AND passager.codeReservation = (?);";
            $stmt = $connexion->prepare($sql);
            $stmt->execute([$idReservation]);
            $quantiteCres = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($quantiteCres) {
                $sql = "UPDATE traversee SET traversee.quantitePassagerC = traversee.quantitePassagerC - (?) WHERE traversee.codeTraversee = (?)"; 
                $stmt = $connexion->prepare($sql); 
                $stmt->execute([$quantiteCres['quantite'], $_SESSION["traverseId"]]);
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }  
    }

    function getQuantiteA($codeTraversee){
        $connexion = connexionPDO();

        //Recuperation des quantité
        $sql = "SELECT quantitePassagerA FROM traversee  WHERE traversee.codeTraversee = (?)";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([$codeTraversee]);
        $quantiteAres = $stmt->fetch(PDO::FETCH_ASSOC);

        return $quantiteAres["quantitePassagerA"];
    }

    function getQuantiteB($codeTraversee){
        $connexion = connexionPDO();

        //Recuperation des quantité
        $sql = "SELECT quantitePassagerB FROM traversee  WHERE traversee.codeTraversee = (?)";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([$codeTraversee]);
        $quantiteAres = $stmt->fetch(PDO::FETCH_ASSOC);

        return $quantiteAres["quantitePassagerA"];

    }

    function getQuantiteC($codeTraversee){
        $connexion = connexionPDO();

        //Recuperation des quantité
        $sql = "SELECT quantitePassagerC FROM traversee  WHERE traversee.codeTraversee = (?)";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([$codeTraversee]);
        $quantiteAres = $stmt->fetch(PDO::FETCH_ASSOC);

        return $quantiteAres["quantitePassagerA"];

    }


?>