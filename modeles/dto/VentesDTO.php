<?php
class VentesDTO
{
    private $produits= array();

    public function __construct($array){
        if (is_array($array)) {
            $this->ventes = $array;
        }
    }

    public function getVentes(){
        return $this->ventes;
    }

    public function chercheVente($unIdVente){
        $i = 0;
        while ($unIdVente != $this->ventes[$i]->getIdVente() && $i < count($this->ventes)-1){
            $i++;
        }
        if ($unIdVente == $this->ventes[$i]->getIdVente()){
            return $this->ventes[$i];
        }
    }

}