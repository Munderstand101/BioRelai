<?php

class UtilisateurDAO
{
    public static function lesUtilisateurs(){
        $result = [];
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT * FROM `Utilisateur`" );
        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($liste)){
            foreach($liste as $utilisateur){
                $unUtilisateur = new UtilisateurDTO();
                $unUtilisateur->hydrate($utilisateur);
                $result[] = $unUtilisateur;
            }
        }
        return $result;
    }

    public static function lesUtilisateursS(){
        $result = [];
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT idUtilisateur, mail, statut, nomUtilisateur, prenomUtilisateur FROM `Utilisateur`" );
        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($liste)){
            foreach($liste as $utilisateur){
                $unUtilisateur = new UtilisateurDTO();
                $unUtilisateur->hydrate($utilisateur);
                $result[] = $unUtilisateur;
            }
        }
        return $result;
    }

    public static function verification($username, $mdp){
        $requetePrepa = DBConnex::getInstance()->prepare("select idUtilisateur, mail, statut, nomUtilisateur, prenomUtilisateur from Utilisateur where mail=:mail and mdp =md5(:mdp)");
        $requetePrepa->bindParam(':mail', $username);
        $requetePrepa->bindParam(':mdp', $mdp);
        $requetePrepa->execute();
        $authentification = $requetePrepa->fetch(PDO::FETCH_ASSOC);
        return $authentification;
    }
    public static function inscription($username,$mdp,$nom,$prenom){
        $requetePrepa = DBConnex::getInstance()->prepare("INSERT INTO `Utilisateur` (`idUtilisateur`, `mail`, `mdp`, `statut`, `nomUtilisateur`, `prenomUtilisateur`) VALUES (NULL, ':mail', 'md5(:mdp)', 'adherents', ':nom', ':prenom');");
        $requetePrepa->bindParam(':prenom', $prenom);
        $requetePrepa->bindParam(':nom', $nom);
        $requetePrepa->bindParam(':mdp', $mdp);
        $requetePrepa->bindParam(':mail', $mail);
        $requetePrepa->execute();
    }

    public static function creerUnCompte($prenom,$nom,$mail,$mdp){
        $requetePrepa = DBConnex::getInstance()->prepare("INSERT INTO `Utilisateur` (`idUtilisateur`, `mail`, `mdp`, `statut`, `nomUtilisateur`, `prenomUtilisateur`) VALUES (NULL, :mail, md5(:mdp), 'visiteurs', :nom, :prenom);");
        $requetePrepa->bindParam(':mail', $mail);
        $requetePrepa->bindParam(':mdp', $mdp);
        $requetePrepa->bindParam(':nom', $nom);
        $requetePrepa->bindParam(':prenom', $prenom);
        $requetePrepa->execute();
    }

    public static function modifierUnCompte($idUser,$prenom,$nom,$mail,$mdp){
        $requetePrepa = DBConnex::getInstance()->prepare("UPDATE `utilisateur` SET `mail` = :mail, `mdp` = MD5(:mdp), `nomUtilisateur` = :nom, `prenomUtilisateur` = :prenom WHERE `utilisateur`.`idUtilisateur` = :idUser;");
        $requetePrepa->bindParam(':idUser', $idUser);
        $requetePrepa->bindParam(':mail', $mail);
        $requetePrepa->bindParam(':mdp', $mdp);
        $requetePrepa->bindParam(':nom', $nom);
        $requetePrepa->bindParam(':prenom', $prenom);
        $requetePrepa->execute();
    }
}
