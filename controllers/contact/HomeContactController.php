<?php
global $pdo;
class HomeContactController {
    private ContactDAO $contactDAO;


    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function index() {
        $contacts = $this->contactDAO->getAll();

        include("../../views/contact/home.php");
    }
}

require_once("../../config/config.php");
require_once("../../classes/models/ContactModel.php");
require_once("../../classes/dao/ContactDAO.php");

$contactDAO = new ContactDAO($pdo);
$controller = new HomeContactController($contactDAO);
$controller->index();