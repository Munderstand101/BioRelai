<?php


class ProducteurDTO
{
    use Hydrate;
    private $idProducteur;
    private $adresseProducteur;
    private $communeProducteur;
    private $codePostalProducteur;
    private $descriptifProducteur;
    private $photoProducteur;

    /**
     * @param $idProducteur
     * @param $adresseProducteur
     * @param $communeProducteur
     * @param $codePostalProducteur
     * @param $descriptifProducteur
     * @param $photoProducteur
     */
    public function __construct($idProducteur = null, $adresseProducteur = null, $communeProducteur = null, $codePostalProducteur = null, $descriptifProducteur = null, $photoProducteur = null)
    {
        $this->idProducteur = $idProducteur;
        $this->adresseProducteur = $adresseProducteur;
        $this->communeProducteur = $communeProducteur;
        $this->codePostalProducteur = $codePostalProducteur;
        $this->descriptifProducteur = $descriptifProducteur;
        $this->photoProducteur = $photoProducteur;
    }

    /**
     * @return mixed|null
     */
    public function getIdProducteur()
    {
        return $this->idProducteur;
    }

    /**
     * @param mixed|null $idProducteur
     */
    public function setIdProducteur($idProducteur)
    {
        $this->idProducteur = $idProducteur;
    }

    /**
     * @return mixed|null
     */
    public function getAdresseProducteur()
    {
        return $this->adresseProducteur;
    }

    /**
     * @param mixed|null $adresseProducteur
     */
    public function setAdresseProducteur($adresseProducteur)
    {
        $this->adresseProducteur = $adresseProducteur;
    }

    /**
     * @return mixed|null
     */
    public function getCommuneProducteur()
    {
        return $this->communeProducteur;
    }

    /**
     * @param mixed|null $communeProducteur
     */
    public function setCommuneProducteur($communeProducteur)
    {
        $this->communeProducteur = $communeProducteur;
    }

    /**
     * @return mixed|null
     */
    public function getCodePostalProducteur()
    {
        return $this->codePostalProducteur;
    }

    /**
     * @param mixed|null $codePostalProducteur
     */
    public function setCodePostalProducteur($codePostalProducteur)
    {
        $this->codePostalProducteur = $codePostalProducteur;
    }

    /**
     * @return mixed|null
     */
    public function getDescriptifProducteur()
    {
        return $this->descriptifProducteur;
    }

    /**
     * @param mixed|null $descriptifProducteur
     */
    public function setDescriptifProducteur($descriptifProducteur)
    {
        $this->descriptifProducteur = $descriptifProducteur;
    }

    /**
     * @return mixed|null
     */
    public function getPhotoProducteur()
    {
        return $this->photoProducteur;
    }

    /**
     * @param mixed|null $photoProducteur
     */
    public function setPhotoProducteur($photoProducteur)
    {
        $this->photoProducteur = $photoProducteur;
    }

}