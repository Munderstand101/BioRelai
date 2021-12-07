<?php

class CommandeDTO
{

    use Hydrate;
    private $idCommandes;
    private $dateCommandes;
    private $idVente;
    private $idAdherent;
    private $statut;

    /**
     * @param $idCommandes
     * @param $dateCommandes
     * @param $idVente
     * @param $idAdherent
     * @param $statut
     */
    public function __construct($idCommandes = null, $dateCommandes = null, $idVente = null, $idAdherent = null, $statut = null)
    {
        $this->idCommandes = $idCommandes;
        $this->dateCommandes = $dateCommandes;
        $this->idVente = $idVente;
        $this->idAdherent = $idAdherent;
        $this->statut = $statut;
    }


    /**
     * @return mixed
     */
    public function getIdCommandes()
    {
        return $this->idCommandes;
    }

    /**
     * @param mixed $idCommandes
     */
    public function setIdCommandes($idCommandes)
    {
        $this->idCommandes = $idCommandes;
    }

    /**
     * @return mixed
     */
    public function getDateCommandes()
    {
        return $this->dateCommandes;
    }

    /**
     * @param mixed $dateCommandes
     */
    public function setDateCommandes($dateCommandes)
    {
        $this->dateCommandes = $dateCommandes;
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
    public function getIdAdherent()
    {
        return $this->idAdherent;
    }

    /**
     * @param mixed $idAdherent
     */
    public function setIdAdherent($idAdherent)
    {
        $this->idAdherent = $idAdherent;
    }

    /**
     * @return mixed|null
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @param mixed|null $statut
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }
}