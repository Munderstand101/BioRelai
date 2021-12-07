<?php

class CategorieDAO
{
    public static function lesCategories(){
        $result = [];
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT * FROM `categories`" );
        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($liste)){
            foreach($liste as $categorie){
                $uneCategorie = new CategorieDTO();
                $uneCategorie->hydrate($categorie);
                $result[] = $uneCategorie;
            }
        }
        return $result;
    }


}
