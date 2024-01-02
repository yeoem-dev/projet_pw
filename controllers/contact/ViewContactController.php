<?php
class ViewContactController {
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function viewContact($contactId) {
        // Récupérer le contact à afficher en utilisant son ID
        $contact = $this->contactDAO->getById($contactId);

        // Inclure la vue pour afficher les détails du contact
        include('../../views/contact/view_contact.php');
    }
}

require_once("../../config/config.php");
require_once("../../classes/models/ContactModel.php");
require_once("../../classes/dao/ContactDAO.php");
global $pdo;
$contactDAO = new ContactDAO($pdo);
$controller = new ViewContactController($contactDAO);
$controller->viewContact($_GET['id']);


