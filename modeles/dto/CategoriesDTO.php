<?php
class CategoriesDTO
{
    private $categories= array();

    public function __construct($array){
        if (is_array($array)) {
            $this->categories = $array;
        }
    }

    public function getCategories(){
        return $this->categories;
    }

    public function chercherCategorie($unIdProduit){
        $i = 0;
        while ($unIdProduit != $this->categories[$i]->getIdCategorie() && $i < count($this->categories)-1){
            $i++;
        }
        if ($unIdProduit == $this->categories[$i]->getIdCategorie()){
            return $this->categories[$i];
        }
    }

}