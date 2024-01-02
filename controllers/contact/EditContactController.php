<?php
class EditContactController {
    private ContactDAO $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function editContact($id) {
        // Récupérer le contact à modifier en utilisant son ID
        $contact = $this->contactDAO->getById($id);

        if (!$contact) {
            // Le contact n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le contact n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nomContact = $_POST['nomContact'];
            $prenomContact = $_POST['prenomContact'];
            $emailContact = $_POST['emailContact'];
            $numTelContact = $_POST['numTelContact'];
            

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails du contact
            $contact->setNomContact($nomContact);
            $contact->setPrenomContact($prenomContact);
            $contact->setEmailContact($emailContact);
            $contact->setNumTelContact($numTelContact);
            

            // Appeler la méthode du modèle (ContactDAO) pour mettre à jour le contact
            if ($this->contactDAO->update($contact)) {
                // Rediriger vers la page de détails du contact après la modification
                header('Location:HomeContactController.php');
                exit();
            } else {
                // Gérer les erreurs de mise à jour du contact
                echo "Erreur lors de la modification du contact.";
            }
        }

        // Inclure la vue pour afficher le formulaire de modification du contact
        include('../../views/contact/edit_contact.php');
    }
}

require_once("../../config/config.php");
require_once("../../classes/models/ContactModel.php");
require_once("../../classes/dao/ContactDAO.php");
global $pdo;
$contactDAO = new ContactDAO($pdo);
$controller = new EditContactController($contactDAO);
$controller->editContact($_GET['id']);


