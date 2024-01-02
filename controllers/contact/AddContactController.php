<?php 
class AddContactController {
    private ContactDAO $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function index() {
        include("../../views/contact/add_contact.php");
    }

    public function addContact() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du controlleur
            $nomContact = $_POST['nomContact'];
            $prenomContact = $_POST['prenomContact'];
            $emailContact = $_POST['emailContact'];
            $numTelContact = $_POST['numTelContact'];
            $licencieId = intval($_POST['licencieId']);
            var_dump($licencieId);

            // Valider les données du formulaire
            
            $nouveauContact = new ContactModel(0, $nomContact, $prenomContact, $emailContact, $numTelContact, $licencieId);
            // echo ($nouveauContact);
            if ($this->contactDAO->create($nouveauContact)) {
                header('Location: ../licencie/HomeLicencieController.php');
                exit();
            } else {
                echo "Erreur lors de l'ajout du contact";
            }
        }
        include('../../views/contact/add_contact.php');
    }
    
}

require_once("../../config/config.php");
require_once("../../classes/models/ContactModel.php");
require_once("../../classes/dao/ContactDAO.php");
$contactDAO = new ContactDAO($pdo);
$controller = new AddContactController($contactDAO);
if (!isset($_POST['action'])) {
    $controller->index();
} else {

    $controller->addContact();
}