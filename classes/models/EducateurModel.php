<?php

class EducateurModel {
    private $idEducateur;
    private $emailEducateur;
    private $mdpEducateur;
    private $licencieId;
    private $estAdmin;

    /**
     * @param $licencieId
     * @param $idEducateur
     * @param $emailEducateur
     * @param $mdpEducateur
     */
    public function __construct($idEducateur, $emailEducteur, $mdpEducateur, $licencieId, $estAdmin) {
        $this->idEducateur = $idEducateur;
        $this->emailEducateur = $emailEducteur;
        $this->mdpEducateur = $mdpEducateur;
        $this->licencieId = $licencieId;
        $this->estAdmin = $estAdmin;
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

    /**
     * @return mixed
     */
    public function getEstAdmin() {
        return $this->estAdmin;
    }

    /**
     * @param mixed
     */
    public function setEstAdmin($choix) {
        $this->estAdmin = $choix;
    }

}