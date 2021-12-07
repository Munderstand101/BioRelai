<?php

class CommandesDTO
{
    private $commandes= array();

    public function __construct($array){
        if (is_array($array)) {
            $this->commandes = $array;
        }
    }

    public function getCommandes(){
        return $this->commandes;
    }

    public function chercheCommandes($unIdCommandes){
        $i = 0;
        while ($unIdCommandes != $this->commandes[$i]->getIdCommandes() && $i < count($this->commandes)-1){
            $i++;
        }
        if ($unIdCommandes == $this->commandes[$i]->getIdCommandes()){
            return $this->commandes[$i];
        }
    }
}