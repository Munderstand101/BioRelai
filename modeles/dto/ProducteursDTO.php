<?php
class ProducteursDTO
{
    private $producteurs= array();

    public function __construct($array){
        if (is_array($array)) {
            $this->producteurs = $array;
        }
    }

    public function getProducteurs(){
        return $this->producteurs;
    }

    public function chercheProducteur($unIdProducteur){
        $i = 0;
        while ($unIdProducteur != $this->producteurs[$i]->getIdProducteur() && $i < count($this->producteurs)-1){
            $i++;
        }
        if ($unIdProducteur == $this->producteurs[$i]->getIdProducteur()){
            return $this->producteurs[$i];
        }
    }

}