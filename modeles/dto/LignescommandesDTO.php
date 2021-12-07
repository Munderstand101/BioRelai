<?php

class LignescommandesDTO
{
    private $lignescommandes= array();

    public function __construct($array){
        if (is_array($array)) {
            $this->lignescommandes = $array;
        }
    }

    public function getLignescommandes(){
        return $this->lignescommandes;
    }

    public function chercheLignescommande($unIdCommande){
        $i = 0;
        while ($unIdCommande != $this->lignescommandes[$i]->getIdCommande() && $i < count($this->lignescommandes)-1){
            $i++;
        }
        if ($unIdCommande == $this->lignescommandes[$i]->getIdCommande()){
            return $this->lignescommandes[$i];
        }
    }
}