<?php


class UtilisateurDTO
{
    use Hydrate;

    private $idUtilisateur;
    private $mail;
    private $mdp;
    private $statut;
    private $nomUtilisateur;
    private $prenomUtilisateur;

    /**
     * UtilisateurDTO constructor.
     * @param $idUtilisateur
     * @param $mail
     * @param $mdp
     * @param $statut
     * @param $nomUtilisateur
     * @param $prenomUtilisateur
     */
    public function __construct($idUtilisateur = null, $mail = null, $mdp = null, $statut = null, $nomUtilisateur = null, $prenomUtilisateur = null)
    {
        $this->idUtilisateur = $idUtilisateur;
        $this->mail = $mail;
        $this->mdp = $mdp;
        $this->statut = $statut;
        $this->nomUtilisateur = $nomUtilisateur;
        $this->prenomUtilisateur = $prenomUtilisateur;
    }

    /*public function __construct($mail, $mdp)
    {
        $this->mail = $mail;
        $this->mdp = $mdp;
    }*/


    /**
     * @return mixed
     */
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    /**
     * @param mixed $idUtilisateur
     */
    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    /**
     * @return mixed
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @param mixed $statut
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    /**
     * @return mixed
     */
    public function getNomUtilisateur()
    {
        return $this->nomUtilisateur;
    }

    /**
     * @param mixed $nomUtilisateur
     */
    public function setNomUtilisateur($nomUtilisateur)
    {
        $this->nomUtilisateur = $nomUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getPrenomUtilisateur()
    {
        return $this->prenomUtilisateur;
    }

    /**
     * @param mixed $prenomUtilisateur
     */
    public function setPrenomUtilisateur($prenomUtilisateur)
    {
        $this->prenomUtilisateur = $prenomUtilisateur;
    }
}