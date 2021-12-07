<?php


class ProduitDTO
{
    use Hydrate;

    private $idProduit;
    private $nomProduit;
    private $descriptifProduit;
    private $photoProduit;
    private $idProducteur;
    private $idCategorie;

    /**
     * @param $idProduit
     * @param $nomProduit
     * @param $descriptifProduit
     * @param $photoProduit
     * @param $idProducteur
     * @param $idCategorie
     */
    public function __construct($idProduit = null, $nomProduit = null, $descriptifProduit = null, $photoProduit = null, $idProducteur = null, $idCategorie = null)
    {
        $this->idProduit = $idProduit;
        $this->nomProduit = $nomProduit;
        $this->descriptifProduit = $descriptifProduit;
        $this->photoProduit = $photoProduit;
        $this->idProducteur = $idProducteur;
        $this->idCategorie = $idCategorie;
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
    public function getNomProduit()
    {
        return $this->nomProduit;
    }

    /**
     * @param mixed $nomProduit
     */
    public function setNomProduit($nomProduit)
    {
        $this->nomProduit = $nomProduit;
    }

    /**
     * @return mixed
     */
    public function getDescriptifProduit()
    {
        return $this->descriptifProduit;
    }

    /**
     * @param mixed $descriptifProduit
     */
    public function setDescriptifProduit($descriptifProduit)
    {
        $this->descriptifProduit = $descriptifProduit;
    }

    /**
     * @return mixed
     */
    public function getPhotoProduit()
    {
        return $this->photoProduit;
    }

    /**
     * @param mixed $photoProduit
     */
    public function setPhotoProduit($photoProduit)
    {
        $this->photoProduit = $photoProduit;
    }

    /**
     * @return mixed
     */
    public function getIdProducteur()
    {
        return $this->idProducteur;
    }

    /**
     * @param mixed $idProducteur
     */
    public function setIdProducteur($idProducteur)
    {
        $this->idProducteur = $idProducteur;
    }

    /**
     * @return mixed
     */
    public function getIdCategorie()
    {
        return $this->idCategorie;
    }

    /**
     * @param mixed $idCategorie
     */
    public function setIdCategorie($idCategorie)
    {
        $this->idCategorie = $idCategorie;
    }
}