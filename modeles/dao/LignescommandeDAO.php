<?php

class LignescommandeDAO
{
    public static function lesLignescommande(){
        $result = [];
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT * FROM `lignescommandes`" );
        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($liste)){
            foreach($liste as $lignescommande){
                $uneLignescommande = new LignescommandeDTO();
                $uneLignescommande->hydrate($lignescommande);
                $result[] = $uneLignescommande;
            }
        }
        return $result;
    }

    public static function deleteLignesCommande($idCommande){
        $requetePrepa = DBConnex::getInstance()->prepare("DELETE FROM `lignescommandes` WHERE `lignescommandes`.`idCommande` = :idCommande");
        $requetePrepa->bindParam(':idCommande', $idCommande);
        $requetePrepa->execute();
    }


}