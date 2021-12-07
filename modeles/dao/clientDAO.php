<?php


class ClientDAO
{

    public static function verification($username, $mdp){
        $requetePrepa = DBConnex::getInstance()->prepare("select idUtilisateur, mail, statut, nomUtilisateur, prenomUtilisateur from Utilisateur where mail=:mail and mdp =md5(:mdp)");
        $requetePrepa->bindParam(':mail', $username);
        $requetePrepa->bindParam(':mdp', $mdp);
        $requetePrepa->execute();
        $authentification = $requetePrepa->fetch(PDO::FETCH_ASSOC);
        return $authentification;

    }
    //Version avec tt les parametres d'un coup
    public static function setAll($id, $mail, $mdp, $nom, $prenom){
        $requetePrepa = DBConnex::getInstance()->prepare("UPDATE `Utilisateur` SET `prenomUtilisateur` = :prenom AND `nomUtilisateuril` = :nom AND  `mail`=:mail AND `mdp` = md5(:mdp)  WHERE `Utilisateur`.`idUtilisateur` = :id");
        $requetePrepa->bindParam(':id', $id);
        $requetePrepa->bindParam(':prenom', $prenom);
        $requetePrepa->bindParam(':nom', $nom);
        $requetePrepa->bindParam(':mdp', $mdp);
        $requetePrepa->bindParam(':mail', $mail);
    }

    public static function setMail($id, $mail){
        $requetePrepa = DBConnex::getInstance()->prepare("UPDATE `Utilisateur` SET `mail` = :mail WHERE `Utilisateur`.`idUtilisateur` = :id");
        $requetePrepa->bindParam(':id', $id);
        $requetePrepa->bindParam(':mail', $mail);
        $requetePrepa->execute();
    }

    public static function setMdp($id, $mdp){
        $requetePrepa = DBConnex::getInstance()->prepare("UPDATE `Utilisateur` SET `mdp` = md5(:mdp) WHERE `Utilisateur`.`idUtilisateur` = :id");
        $requetePrepa->bindParam(':id', $id);
        $requetePrepa->bindParam(':mdp', $mdp);
        $requetePrepa->execute();
    }

    public static function setNomUtilisateur($id, $nom){
        $requetePrepa = DBConnex::getInstance()->prepare("UPDATE `Utilisateur` SET `setNomUtilisateur` = :nom WHERE `Utilisateur`.`idUtilisateur` = :id");
        $requetePrepa->bindParam(':id', $id);
        $requetePrepa->bindParam(':nom', $nom);
        $requetePrepa->execute();
    }

    public static function setPrenomUtilisateur($id, $prenom){
        $requetePrepa = DBConnex::getInstance()->prepare("UPDATE `Utilisateur` SET `prenomUtilisateur` = :prenom WHERE `Utilisateur`.`idUtilisateur` = :id");
        $requetePrepa->bindParam(':id', $id);
        $requetePrepa->bindParam(':prenom', $prenom);
        $requetePrepa->execute();
    }

    

    
}
