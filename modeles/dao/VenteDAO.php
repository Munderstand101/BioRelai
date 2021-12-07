<?php

class VenteDAO
{
    public static function lesVentes(){
        $result = [];
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT * FROM `ventes`" );
        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($liste)){
            foreach($liste as $vente){
                $uneVente = new VenteDTO();
                $uneVente->hydrate($vente);
                $result[] = $uneVente;
            }
        }
        return $result;
    }


}
