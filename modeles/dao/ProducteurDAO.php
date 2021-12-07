<?php

class ProducteurDAO
{
    public static function lesProducteurs(){
        $result = [];
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT * FROM `producteur`" );
        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($liste)){
            foreach($liste as $producteur){
                $unProducteur = new ProducteurDTO();
                $unProducteur->hydrate($producteur);
                $result[] = $unProducteur;
            }
        }
        return $result;
    }

    public static function nouveauProducteur($idProducteur,$adresseProducteur,$communeProducteur,$codePostalProducteur, $descriptifProducteur, $photoProducteur){
        $requetePrepa = DBConnex::getInstance()->prepare("INSERT INTO `producteur` (`idProducteur`, `adresseProducteur`, `communeProducteur`, `codePostalProducteur`, `descriptifProducteur`, `photoProducteur`) VALUES (:idProducteur, :adresseProducteur, :communeProducteur, :codePostalProducteur, :descriptifProducteur, :photoProducteur);");
        $requetePrepa->bindParam(':idProducteur', $idProducteur);
        $requetePrepa->bindParam(':adresseProducteur', $adresseProducteur);
        $requetePrepa->bindParam(':communeProducteur', $communeProducteur);
        $requetePrepa->bindParam(':codePostalProducteur', $codePostalProducteur);
        $requetePrepa->bindParam(':descriptifProducteur', $descriptifProducteur);
        $requetePrepa->bindParam(':photoProducteur', $photoProducteur);
        $requetePrepa->execute();
    }

}
