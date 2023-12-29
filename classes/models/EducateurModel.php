<?php

class EducateurModel  extends LicencieModel {
    private $idEducateur;
    private $email;
    private $mdp;

    /**
     * @param $idLicencie
     * @param $numLicence
     * @param $nomLicencie
     * @param $prenomLicencie
     * @param $categorieLicencie
     * @param $idEducateur
     * @param $email
     * @param $mdp
     */
    public function __construct($idLicencie,$numLicence, $nomLicencie, $prenomLicencie, $categorieLicencie, $idEducateur, $email, $mdp)
    {
        parent::__construct($idLicencie, $numLicence, $nomLicencie, $prenomLicencie, $categorieLicencie);
        $this->idEducateur = $idEducateur;
        $this->email = $email;
        $this->mdp = $mdp;
    }

    /**
     * @return mixed
     */
    public function getIdEducateur()
    {
        return $this->idEducateur;
    }

    /**
     * @param mixed $idEducateur
     */
    public function setIdEducateur($idEducateur)
    {
        $this->idEducateur = $idEducateur;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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




}