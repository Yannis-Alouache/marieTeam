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

function getUtilisateurById($id) {
    $user = null;
    $id = intval($id);

    try {
        $connexion = connexionPDO();
        $query = "SELECT * FROM `utilisateur` where utilisateur.id = ?";
        $stmt = $connexion->prepare($query);

        $stmt->execute([$id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $user;
}

function getUtilisateurByMail($mail) {
    $user = null;

    try {
        $connexion = connexionPDO();
        $query = "SELECT * FROM `utilisateur` where utilisateur.mail = ?";
        $stmt = $connexion->prepare($query);

        $stmt->execute([$mail]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
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
}


function connexion($mail, $mdp) {
    $user = getUtilisateurByMail($mail);

    if ($user != false) {
        if(password_verify($mdp, $user["mdp"])) {
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION["mail"] = $user["mail"];
            $_SESSION["mdp"] = $user["mdp"];
            $_SESSION["username"] = $user["nom"]." ".$user["prenom"];
            return true;
        }
        else{
            return "Mauvais mot de passe";
        }
    }
    else {
        return "Compte inexistant !";
    }
}

function deconnexion() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["mail"]);
    unset($_SESSION["mdp"]);
    unset($_SESSION["username"]);
}

function isLoggedIn() {
    $isLogged = false;

    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION["mail"]) && isset($_SESSION["mdp"])) {
        $user = getUtilisateurByMail($_SESSION["mail"]);
        if ($_SESSION["mail"] == $user["mail"] && $_SESSION["mdp"] == $user["mdp"]) {
            $isLogged = true;
        }
    }
    return $isLogged;
}

?>