<?php
class ProduitsDTO
{
    private $produits= array();

    public function __construct($array){
        if (is_array($array)) {
            $this->produits = $array;
        }
    }

    public function getProduits(){
        return $this->produits;
    }

    public function chercheProduit($unIdProduit){
        $i = 0;
        while ($unIdProduit != $this->produits[$i]->getIdProduit() && $i < count($this->produits)-1){
            $i++;
        }
        if ($unIdProduit == $this->produits[$i]->getIdProduit()){
            return $this->produits[$i];
        }
    }

}