<?php

class DeleteContactController {
    private ContactDAO $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function deleteContact($id) {
        $contact = $this->contactDAO->getById($id);

        if (!$contact) {
            echo "Le contact n'a pas été trouvée.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if($this->contactDAO->deleteById($id)) {
                header('Location:HomeContactController.php');
                exit();
            } else {
                echo "Erreur lors de la suppression du categorie.";
            }
        }
        include('../../views/contact/delete_contact.php');
    }

}
global $pdo;
require_once("../../config/config.php");
require_once("../../classes/models/contactModel.php");
require_once("../../classes/dao/contactDAO.php");
$contactDAO = new ContactDAO($pdo);
$controller = new DeleteContactController($contactDAO);

$controller->deleteContact($_GET['id']);