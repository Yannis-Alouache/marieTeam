<?php

include_once "bd.inc.php";

function getUtilisateurs() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from utilisateur");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getUtilisateurByMail($mail) {
    $user = null;

    try {
        $connexion = connexionPDO();
        $query = "SELECT * FROM `utilisateur` where utilisateur.mail = ?";
        $stmt = $connexion->prepare($query);

        $stmt->execute([$mail]);
        $user = $stmt->fetch();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $user;
}



function createUser($mail, $mdp, $nom, $prenom) {
    try {
        $connexion = connexionPDO();
        $user = getUtilisateurByMail($mail);

        if ($user != null) {
            return "Cette adresse mail est déjà affilié à un compte";
        }

        $hashmdp = password_hash($mdp, PASSWORD_DEFAULT);
    
        $sql = "INSERT INTO utilisateur (mail, mdp, nom, prenom)
        VALUES (?, ?, ?, ?)";
        $stmt = $connexion->prepare($sql);

        $stmt->execute([$mail, $hashmdp, $nom, $prenom]);
    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
    return "operation effectué";
}


function connexion($mail, $mdp) {
    $user = getUtilisateurByMail($mail);
    if(password_verify($mdp, $user["mdp"])) {
        // If the password inputs matched the hashed password in the database
        // Do something, you know... log them in.
        echo "psahtick";
    }
    else{
        return "ERROR";
    }
}

?>