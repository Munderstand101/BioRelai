<?php

class LignescommandeDTO
{
    use Hydrate;
    private $idCommande;
    private $idProduit;
    private $quantite;


    /**
     * @param $idCommande
     * @param $idProduit
     * @param $quantite
     */
    public function __construct($idCommande = null, $idProduit = null, $quantite = null)
    {
        $this->idCommande = $idCommande;
        $this->idProduit = $idProduit;
        $this->quantite = $quantite;
    }


    /**
     * @return mixed
     */
    public function getIdCommande()
    {
        return $this->idCommande;
    }

    /**
     * @param mixed $idCommande
     */
    public function setIdCommande($idCommande)
    {
        $this->idCommande = $idCommande;
    }

    /**
     * @return mixed
     */
    public function getIdProduit()
    {
        return $this->idProduit;
    }

    /**
     * @param mixed $idProduit
     */
    public function setIdProduit($idProduit)
    {
        $this->idProduit = $idProduit;
    }

    /**
     * @return mixed
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param mixed $quantite
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }
}