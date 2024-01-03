<?php

class EducateurModel {
    private $idEducateur;
    private $emailEducateur;
    private $mdpEducateur;
    private $licencieId;

    /**
     * @param $licencieId
     * @param $idEducateur
     * @param $emailEducateur
     * @param $mdpEducateur
     */
    public function __construct($idEducateur, $emailEducteur, $mdpEducateur, $licencieId) {
        $this->idEducateur = $idEducateur;
        $this->emailEducateur = $emailEducteur;
        $this->mdpEducateur = $mdpEducateur;
        $this->licencieId = $licencieId;
    }

    /**
     * @return mixed
     */
    public function getIdEducateur()
    {
        return $this->idEducateur;
    }

    /**
     * @return mixed
     */
    public function getEmailEducateur()
    {
        return $this->emailEducateur;
    }

    /**
     * @param mixed $email
     */
    public function setEmailEducateur($email)
    {
        $this->emailEducateur = $email;
    }

    /**
     * @return mixed
     */
    public function getMdpEducateur() {
        return $this->mdpEducateur;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdpEducateur($mdp) {
        $this->mdpEducateur = $mdp;
    }

    /**
     * @return mixed
     */
    public function getLicencieId() {
        return $this->licencieId;
    }



}