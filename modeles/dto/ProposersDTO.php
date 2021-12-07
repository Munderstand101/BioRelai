<?php
class ProposersDTO
{
    private $proposers= array();

    public function __construct($array){
        if (is_array($array)) {
            $this->proposers = $array;
        }
    }

    public function getPrositions(){
        return $this->proposers;
    }

    public function chercheProposer($unIdProduit){
        $i = 0;
        while ($unIdProduit != $this->proposers[$i]->getIdVente() && $i < count($this->proposers)-1){
            $i++;
        }
        if ($unIdProduit == $this->proposers[$i]->getIdVente()){
            return $this->proposers[$i];
        }
    }

}