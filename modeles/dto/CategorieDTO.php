<?php


class CategorieDTO
{
    use Hydrate;
    private $idCategorie;
    private $nomCategorie;

    /**
     * @param $idCategorie
     * @param $nomCategorie
     */
    public function __construct($idCategorie = null, $nomCategorie = null)
    {
        $this->idCategorie = $idCategorie;
        $this->nomCategorie = $nomCategorie;
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

    /**
     * @return mixed
     */
    public function getNomCategorie()
    {
        return $this->nomCategorie;
    }

    /**
     * @param mixed $nomCategorie
     */
    public function setNomCategorie($nomCategorie)
    {
        $this->nomCategorie = $nomCategorie;
    }

}