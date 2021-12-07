<?php


class CommandeDAO
{



    public static function lesCommandes(){
        $result = [];
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT * FROM `commandes`" );
        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($liste)){
            foreach($liste as $commande){
                $uneCommande = new CommandeDTO();
                $uneCommande->hydrate($commande);
                $result[] = $uneCommande;
            }
        }
        return $result;
    }
    
    public static function deleteCommande($idCommande){
        $requetePrepa = DBConnex::getInstance()->prepare("DELETE FROM `commandes` WHERE `commandes`.`idCommandes` = :idCommande");
        $requetePrepa->bindParam(':idCommande', $idCommande);
        $requetePrepa->execute();
    }


    public static function verification($username, $mdp){
        $requetePrepa = DBConnex::getInstance()->prepare("select idUtilisateur, mail, statut, nomUtilisateur, prenomUtilisateur from Utilisateur where mail=:mail and mdp =md5(:mdp)");
        $requetePrepa->bindParam(':mail', $username);
        $requetePrepa->bindParam(':mdp', $mdp);
        $requetePrepa->execute();
        $authentification = $requetePrepa->fetch(PDO::FETCH_ASSOC);
        return $authentification;

    }
    

    public static function newCommande($idAdherent){
        $requetePrepa = DBConnex::getInstance()->prepare("INSERT INTO `commandes` (`idCommandes`, `dateCommandes`, `idVente`, `idAdherent`, `statut`) VALUES (NULL, CURRENT_DATE(), '1', :idAdherent, 'encours');");
        $requetePrepa->bindParam(':idAdherent', $idAdherent);
        $requetePrepa->execute();
    }

    public static function passerEncours($idCommande){
        $requetePrepa = DBConnex::getInstance()->prepare("UPDATE `commandes` SET `statut` = 'encours' WHERE `commandes`.`idCommandes` = :idCommande;");
        $requetePrepa->bindParam(':idCommande', $idCommande);
        $requetePrepa->execute();
    }

    public static function passerValide($idCommande){
        $requetePrepa = DBConnex::getInstance()->prepare("UPDATE `commandes` SET `statut` = 'valide' WHERE `commandes`.`idCommandes` = :idCommande;");
        $requetePrepa->bindParam(':idCommande', $idCommande);
        $requetePrepa->execute();
    }

    public static function getStatut($idCommande){
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT statut FROM commandes WHERE idCommandes = :idCommande");
        $requetePrepa->bindParam(':idCommande', $idCommande);
        $requetePrepa->execute();
        $result= $requetePrepa->fetch();
        return $result[0];

    }

    public static function getCommandeEncours($idUser){
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT idCommandes FROM commandes WHERE statut = 'encours' AND idAdherent = :idUser");
        $requetePrepa->bindParam(':idUser', $idUser);
        $requetePrepa->execute();
        $result= $requetePrepa->fetch();
        return $result[0];

    }
  

    public static function toutPasserValide($idUser){
        $requetePrepa = DBConnex::getInstance()->prepare("UPDATE `commandes` SET `statut` = 'valide' WHERE `commandes`.`idAdherent` = :idUser;");
        $requetePrepa->bindParam(':idUser', $idUser);
        $requetePrepa->execute();
    }

    public static function ajouterProduit($idCommande, $idProduit, $quantite){
        $requetePrepa = DBConnex::getInstance()->prepare("INSERT INTO `lignescommandes` (`idCommande`, `idProduit`, `quantite`) VALUES (:idCommande, :idProduit, :quantite);");
        $requetePrepa->bindParam(':idCommande', $idCommande);
        $requetePrepa->bindParam(':idProduit', $idProduit);
        $requetePrepa->bindParam(':quantite', $quantite);
        $requetePrepa->execute();
    }
    

    public static function listeCommandes($idUser){
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT ");
        $requetePrepa->bindParam(':idCommande', $idCommande);
        $requetePrepa->bindParam(':idProduit', $idProduit);
        $requetePrepa->bindParam(':quantite', $quantite);
        $requetePrepa->execute();
    }
}
