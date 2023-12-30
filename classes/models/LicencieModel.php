<?php

class LicencieModel {
    private $idLicencie;
    private $numLicence;
    private $nomLicencie;
    private $prenomLicencie;
    private $categorieId;
    private $isActive = true;


    /**
     * @param $idLicencie
     * @param $numLicence
     * @param $nomLicencie
     * @param $prenomLicencie
     * @param $categorieId

     */
    public function __construct($idLicencie, $numLicence, $nomLicencie, $prenomLicencie, $categorieId) {
        $this->idLicencie = $idLicencie;
        $this->numLicence = $numLicence;
        $this->nomLicencie = $nomLicencie;
        $this->prenomLicencie = $prenomLicencie;
        $this->categorieId = $categorieId;

    }

    /**
     * @return mixed
     */
    public function getIdLicencie() {
        return $this->idLicencie;
    }

    /**
     * @param mixed $idLicencie
     */
    public function setIdLicencie($idLicencie) {
        $this->idLicencie = $idLicencie;
    }

    /**
     * @return mixed
     */
    public function getNumLicencie() {
        return $this->numLicence;
    }

    /**
     * @return mixed
     */
    public function getNomLicencie() {
        return $this->nomLicencie;
    }

    /**
     * @param mixed $nomLicencie
     */
    public function setNomLicencie($nomLicencie) {
        $this->nomLicencie = $nomLicencie;
    }

    /**
     * @return mixed
     */
    public function getPrenomLicencie() {
        return $this->prenomLicencie;
    }

    /**
     * @param mixed $prenomLicencie
     */
    public function setPrenomLicencie($prenomLicencie) {
        $this->prenomLicencie = $prenomLicencie;
    }

    /**
     * @return mixed
     */
    public function getCategorieId() {
        return $this->categorieId;
    }

    /**
     * @param mixed $categorieId
     */
    public function setCategorieId($categorieId) {
        $this->categorieId = $categorieId;
    }

    /**
     * @return bool
     */
    public function isActive() {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     */
    public function setIsActive($isActive) {
        $this->isActive = $isActive;
    }

    public static function generateNumLicence() {
        
    }
}