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

            // Si l'ajout du contact se fait via le numéro de licence
            if (isset($_POST['numLicence'])) {
                $numLicence = $_POST['numLicence'];

                // Récupérer l'idLicencie correspondant au numéro de licence
                global $pdo;
                $licencie = new LicencieDAO($pdo);
                $licencieId = $licencie->getByNumLicence($numLicence);
                
                if (is_null($licencieId)) {
                    
                    header('Location: ../../views/contact/erreur_ajout.php');
                    
                    exit();
                } else {
                    $licencieId = $licencieId->getIdLicencie();
                }
                
            // Si l'ajout du contact se fait par le biais du licencie via $GET['id']
            } else if (isset($_POST['licencieId'])) {
                $licencieId = $_POST['licencieId'];
            }
            
            
                // Valider les données du formulaire

                $nouveauContact = new ContactModel(0, $nomContact, $prenomContact, $emailContact, $numTelContact, $licencieId);
                // echo ($nouveauContact);
                if ($this->contactDAO->create($nouveauContact)) {
                    if (isset($numLicence)) {
                        header('Location: ../contact/HomeContactController.php');
                    } else {
                        header('Location: ../licencie/HomeLicencieController.php');
                    }
                    
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
require_once("../../classes/dao/LicencieDAO.php");

$contactDAO = new ContactDAO($pdo);
$controller = new AddContactController($contactDAO);
if (!isset($_POST['action'])) {
    $controller->index();
} else {

    $controller->addContact();
}