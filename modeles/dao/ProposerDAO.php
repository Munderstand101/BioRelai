<?php

class ProposerDAO
{
    public static function lesPropositions(){
        $result = [];
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT * FROM `proposer`" );
        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($liste)){
            foreach($liste as $proposer){
                $unProposer = new ProposerDTO();
                $unProposer->hydrate($proposer);
                $result[] = $unProposer;
            }
        }
        return $result;
    }


}
