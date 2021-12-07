<?php


class VenteDTO
{
    use Hydrate;

    private $idVente;
    private $dateVente;
    private $dateDebutProd;
    private $dateFinProd;
    private $dateFinCli;

    /**
     * @param $idVente
     * @param $dateVente
     * @param $dateDebutProd
     * @param $dateFinProd
     * @param $dateFinCli
     */
    public function __construct($idVente = null, $dateVente = null, $dateDebutProd = null, $dateFinProd = null, $dateFinCli = null)
    {
        $this->idVente = $idVente;
        $this->dateVente = $dateVente;
        $this->dateDebutProd = $dateDebutProd;
        $this->dateFinProd = $dateFinProd;
        $this->dateFinCli = $dateFinCli;
    }

    /**
     * @return mixed|null
     */
    public function getIdVente()
    {
        return $this->idVente;
    }

    /**
     * @param mixed|null $idVente
     */
    public function setIdVente($idVente)
    {
        $this->idVente = $idVente;
    }

    /**
     * @return mixed|null
     */
    public function getDateVente()
    {
        return $this->dateVente;
    }

    /**
     * @param mixed|null $dateVente
     */
    public function setDateVente($dateVente)
    {
        $this->dateVente = $dateVente;
    }

    /**
     * @return mixed|null
     */
    public function getDateDebutProd()
    {
        return $this->dateDebutProd;
    }

    /**
     * @param mixed|null $dateDebutProd
     */
    public function setDateDebutProd($dateDebutProd)
    {
        $this->dateDebutProd = $dateDebutProd;
    }

    /**
     * @return mixed|null
     */
    public function getDateFinProd()
    {
        return $this->dateFinProd;
    }

    /**
     * @param mixed|null $dateFinProd
     */
    public function setDateFinProd($dateFinProd)
    {
        $this->dateFinProd = $dateFinProd;
    }

    /**
     * @return mixed|null
     */
    public function getDateFinCli()
    {
        return $this->dateFinCli;
    }

    /**
     * @param mixed|null $dateFinCli
     */
    public function setDateFinCli($dateFinCli)
    {
        $this->dateFinCli = $dateFinCli;
    }

}