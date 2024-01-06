<?php
class EditEducateurController {
    private EducateurDAO $educateurDAO;

    public function __construct(EducateurDAO $educateurDAO) {
        $this->educateurDAO = $educateurDAO;
    }

    public function editEducateur($id) {
        // Récupérer le educateur à modifier en utilisant son ID
        $educateur = $this->educateurDAO->getById($id);

        if (!$educateur) {
            // Le educateur n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le educateur n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $emailEducateur = $_POST['emailEducateur'];
            $mdpEducateur = $_POST['mdpEducateur'];
            $choix = $_POST['choix'];

            // Hashé le mot de passe 
            $mdpHashe = password_hash($mdpEducateur, PASSWORD_DEFAULT);

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails du educateur
            
            $educateur->setEmailEducateur($emailEducateur);
            $educateur->setmdpEducateur($mdpHashe);
            $educateur->setEstAdmin($choix);
            

            // Appeler la méthode du modèle (EducateurDAO) pour mettre à jour le educateur
            if ($this->educateurDAO->update($educateur)) {
                // Rediriger vers la page de détails du educateur après la modification
                header('Location:HomeEducateurController.php');
                exit();
            } else {
                // Gérer les erreurs de mise à jour du educateur
                echo "Erreur lors de la modification du educateur.";
            }
        }

        // Inclure la vue pour afficher le formulaire de modification du educateur
        include('../../views/educateur/edit_educateur.php');
    }
}

require_once("../../config/config.php");
require_once("../../classes/models/EducateurModel.php");
require_once("../../classes/dao/EducateurDAO.php");
global $pdo;
$educateurDAO = new EducateurDAO($pdo);
$controller = new EditEducateurController($educateurDAO);
$controller->editEducateur($_GET['id']);
