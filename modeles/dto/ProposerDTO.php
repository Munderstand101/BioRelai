<?php


class ProposerDTO
{
    use Hydrate;

    private $idVente;
    private $idProduit;
    private $unite;
    private $quantite;
    private $prix;

    /**
     * @param $idVente
     * @param $idProduit
     * @param $unite
     * @param $quantite
     * @param $prix
     */
    public function __construct($idVente = null, $idProduit = null, $unite = null, $quantite = null, $prix = null)
    {
        $this->idVente = $idVente;
        $this->idProduit = $idProduit;
        $this->unite = $unite;
        $this->quantite = $quantite;
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getIdVente()
    {
        return $this->idVente;
    }

    /**
     * @param mixed $idVente
     */
    public function setIdVente($idVente)
    {
        $this->idVente = $idVente;
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
    public function getUnite()
    {
        return $this->unite;
    }

    /**
     * @param mixed $unite
     */
    public function setUnite($unite)
    {
        $this->unite = $unite;
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

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }
}