<?php
class ContactModel
{
    private $idContact;
    private $nomContact;
    private $prenomContact;
    private $emailContact;
    private $numTelContact;
    private $licencieId;


    // Vous pouvez ajouter des méthodes supplémentaires ici pour manipuler les données du contact

    /**
     * @param $idContact
     * @param $nomContact
     * @param $prenomContact
     * @param $emailContact
     * @param $numTelContact
     * @param $licencieId
     */
    public function __construct($idContact, $nomContact, $prenomContact, $emailContact, $numTelContact, $licencieId)
    {
        $this->idContact = $idContact;
        $this->nomContact = $nomContact;
        $this->prenomContact = $prenomContact;
        $this->emailContact = $emailContact;
        $this->numTelContact = $numTelContact;
        $this->licencieId = $licencieId;
    }

    /**
     * @return mixed
     */
    public function getIdContact()
    {
        return $this->idContact;
    }

    /**
     * @param mixed $idContact
     */
    public function setIdContact($idContact)
    {
        $this->idContact = $idContact;
    }

    /**
     * @return mixed
     */
    public function getNomContact()
    {
        return $this->nomContact;
    }

    /**
     * @param mixed $nomContact
     */
    public function setNomContact($nomContact)
    {
        $this->nomContact = $nomContact;
    }

    /**
     * @return mixed
     */
    public function getPrenomContact()
    {
        return $this->prenomContact;
    }

    /**
     * @param mixed $prenomContact
     */
    public function setPrenomContact($prenomContact)
    {
        $this->prenomContact = $prenomContact;
    }

    /**
     * @return mixed
     */
    public function getEmailContact()
    {
        return $this->emailContact;
    }

    /**
     * @param mixed $emailContact
     */
    public function setEmailContact($emailContact)
    {
        $this->emailContact = $emailContact;
    }

    /**
     * @return mixed
     */
    public function getNumTelContact()
    {
        return $this->numTelContact;
    }

    /**
     * @param mixed $numTelContact
     */
    public function setNumTelContact($numTelContact)
    {
        $this->numTelContact = $numTelContact;
    }

    /**
     * @return mixed
     */
    public function getLicencieId()
    {
        return $this->licencieId;
    }

    /**
     * @param mixed $licencieId
     */
    public function setLicencieId($licencieId)
    {
        $this->licencieId = $licencieId;
    }


}