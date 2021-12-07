<?php

class ProduitDAO
{
    public static function lesProduits(){
        $result = [];
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT * FROM `produits`" );
        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($liste)){
            foreach($liste as $produit){
                $unProduit = new ProduitDTO();
                $unProduit->hydrate($produit);
                $result[] = $unProduit;
            }
        }
        return $result;
    }

    public static function nouveauProduit($nomProduit,$descriptifProduit,$photoProduit,$idProducteur, $idCategorie){
        $requetePrepa = DBConnex::getInstance()->prepare("INSERT INTO `produits` (`idProduit`, `nomProduit`, `descriptifProduit`, `photoProduit`, `idProducteur`, `idCategorie`) VALUES (NULL, :nomProduit, :descriptifProduit, :photoProduit, :idProducteur, :idCategorie);");
        $requetePrepa->bindParam(':nomProduit', $nomProduit);
        $requetePrepa->bindParam(':descriptifProduit', $descriptifProduit);
        $requetePrepa->bindParam(':photoProduit', $photoProduit);
        $requetePrepa->bindParam(':idProducteur', $idProducteur);
        $requetePrepa->bindParam(':idCategorie', $idCategorie);
        $requetePrepa->execute();
    }

}
